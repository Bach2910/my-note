## Quan hệ giữa các bảng (hasMany, Belongsto)
- là các mối quan hệ giữa các bảng với nhau, được ánh xạ trong mô hình của ứng dụng.
+ hasMany: Một bản ghi ở bảng A có nhiều bản ghi ở bảng B.
+ Belongsto: Một bản ghi ở bảng B thuộc về một bản ghi ở bảng A.

## Pagination và Search 
+ Pagination: Phân trang giúp sử lý với dữ liệu nhiều, paginate()
+ Search: thực hiện chức năng tìm kiếm

Ví dụ:
    
    $search = $request->input('search');
    $query = Student::with('classes');
    if ($search) {
        $query->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
    //                    ->orWhere('email', 'LIKE', "%{$search}%");
        });
    }
    $students = $query->orderBy('id', 'desc')->paginate(4);

## RESTFul API 
- là kiểu thiết kế API theo tiêu chuẩn Rest, sử dụng các HTTP Method để thao tác dữ liệu, cơ bản bao gồm GET, POST, PUT, PATCH, DELETE.
- Đặc biệt là sẽ trong đường dẫn sẽ là:
| Method | URL              | Hành động |
| ------ | ---------------- | --------- |
| GET    | /api/sinhviens   | Danh sách |
| POST   | /api/sinhviens   | Tạo mới   |
| GET    | /api/sinhviens/1 | Chi tiết  |
| PUT    | /api/sinhviens/1 | Cập nhật  |
| DELETE | /api/sinhviens/1 | Xóa       |

## Middleware và Auth
- Middleware là lớp trung gian xử lý request trước khi đến controller
ví dụ:

      Route::middleware('auth')->group(function () {
          Route::get('/dashboard', [DashboardController::class, 'index']);
      });
- Auth là cơ chế xác thực người dùng 

## Dependency Injection (DI)
- Là kỹ thuật truyền phụ thuộc (ví dụ: service, class...) vào một class khác thay vì tự khởi tạo.
ví dụ: 

        class SinhVienController extends Controller {
        protected $sinhVienService;
        
            public function __construct(SinhVienService $sinhVienService) {
                $this->sinhVienService = $sinhVienService;
            }
        }
Laravel sẽ tự động inject SinhVienService khi khởi tạo SinhVienController.

## Queue và Job
- Queue: Là hàng đợi xử lý các tác vụ nền (background jobs).
- Job: Là tác vụ cụ thể được đưa vào hàng đợi để xử lý sau (ví dụ: gửi email, resize ảnh…).

tác dụng: Giảm thời gian phản hồi người dùng và tối ưu hiệu suất.

ví dụ:
+ tạo ra job:

        php artisan make:job GuiEmailJob
+ Trong job:

        public function handle() {
            Mail::to($this->user)->send(new WelcomeMail());
        }
+ Đưa vào queue:

        GuiEmailJob::dispatch($user);

## API Resoucre
- API Resource là lớp để định dạng dữ liệu trả về từ Eloquent model thành JSON rõ ràng.

Ví dụ: 

tạo resoucre:

+ php artisan make:resource StudentResource

+ Trong StudentResource:

        public function toArray($request) {
            return [
                'id' => $this->id,
                'ten' => $this->ten,
                'email' => $this->email,
            ];
        }
+ Controller:

        return new StudentResource($sinhvien);

## Unit Test và Feature Test

- Unit Test: Kiểm tra một đơn vị nhỏ như một hàm hoặc một class hoạt động đúng.

      php artisan make:test TinhToanTest --unit
- Feature Test: Kiểm tra toàn bộ một chức năng, ví dụ: kiểm tra form đăng nhập, tạo mới dữ liệu qua HTTP request.

        php artisan make:test SinhVienFeatureTest

## Ví dụ 
* tạo ra chức năng nhận mail báo đăng ký tài khoản thành công:
Ta dùng đến Queue và Job. 

        php artisan make:job SendWelcomeNotification
Step 1:trong file SendWelcomeNotification:

    class SendWelcomeNotification implements ShouldQueue
    {
        use InteractsWithQueue, Queueable, SerializesModels;
        
            protected $user;
        
            public function __construct(User $user)
            {
                $this->user = $user;
            }
        
            public function handle(): void
            {
                Notification::send($this->user, new WelcomeNotification());
            }
    }

Step 2: tạo ra file trong thư mục mail:

        php artisan make:mail WelcomeNotification

trong file WelcomeNotification:

    class RegistrationSuccessMail extends Mailable
    {
    use Queueable, SerializesModels;
    
        public $user;
    
        public function __construct($user)
        {
            $this->user = $user;
        }
    
        public function build()
        {
            return $this->subject('Đăng ký thành công')
                        ->view('emails.registration_success');
        }
    }
Step 3:tạo ra view để hiện thị nội dung cần

Step 4:tạo ra job:
        
    php artisan make:job SendRegistrationEmail

trong file SendRegistrationEmail:

    class SendRegistrationEmail implements ShouldQueue
    {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
        protected $user;
    
        public function __construct($user)
        {
            $this->user = $user;
        }
    
        public function handle()
        {
            Mail::to($this->user->email)->send(new RegistrationSuccessMail($this->user));
        }
    }
Step 5:sửa lại lại trong phần Register
thêm dòng này vào: 

    dispatch(new SendRegistrationEmail($user));

* Chỉnh sửa lại nội dung cho form reset password:
ta dùng đến Notifiable

Cách 1: Tùy chỉnh email reset mật khẩu bằng Markdown

Step 1: Tạo notification tùy chỉnh

        php artisan make:notification ResetPasswordNotification

Step 2: Tùy chỉnh nội dung trong file

    class CustomResetPassword extends Notification
    {
    public $token;
    
        public function __construct($token)
        {
            $this->token = $token;
        }
    
        public function via($notifiable)
        {
            return ['mail'];
        }
    
        public function toMail($notifiable)
        {
            $url = url(route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset()
            ], false));
    
            return (new MailMessage)
                ->subject('🔐 Đặt lại mật khẩu của bạn')
                ->greeting('👋 Xin chào ' . $notifiable->name . '!')
                ->line('Bạn nhận được email này vì đã yêu cầu đặt lại mật khẩu.')
                ->action('👉 Nhấn vào đây để đặt lại mật khẩu', $url)
                ->line('⚠️ Liên kết sẽ hết hạn sau 3 phút.')
                ->salutation('Trân trọng, đội ngũ hỗ trợ');
        }
    }

Step 3: Vào file app/Model/user edit lại thêm

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

Cách 2: Gửi Email với HTML thủ công

Step 1:

        php artisan make:notification ResetPasswordNotification

Step 2:

    class CustomResetPassword extends Notification
    {
    public $token;
    
            public function __construct($token)
            {
                $this->token = $token;
            }
        
            public function via($notifiable)
            {
                return ['mail'];
            }
        
            public function toMail($notifiable)
            {
                $url = url(route('password.reset', [
                    'token' => $this->token,
                    'email' => $notifiable->getEmailForPasswordReset()
                ], false));
        
                return (new MailMessage)
                    ->subject('🔐 Đặt lại mật khẩu của bạn')
                    ->view('emails.reset-password',
                [
                    'url' => $url,
                    'name' => $notifiable->name,
                ]
            );
            }
    }    
