
# SESSION & COOKIES

- Cookies là tập tin được server nhúng vào trên máy tính cá nhân của mình, có thể tồn tại ngay cả khi người dùng đóng trình duyệt
- Session cũng như cookies những dữ liệu sẽ được lưu trên server, dùng trong những trường hợp cần để bảo mật tài khoản người dùng

# UPLOAD FILE NÂNG CAO
- nhiều file:
+ ta sử dụng thuộc tính multiple trong thẻ input type = "file" multiple>
+ server sẽ duyệt qua mảng file để xử lý từng file 1 

- Validate kích thước 
+ client-side: kiểm tra file.size
+ server-side: kiểm tra trước khi lưu file

# SQL injection
- là hình thức tấn công mà kẻ thể truy cập được các lệnh sql của hệ thống đã dùng với server
- Cách phòng tránh: dùng prepare stament hoặc ORM, không bao giờ nối chuỗi trực tiếp vào câu SQL

# Dependency Injection (DI)
- Là một kỹ thuật thiết kế để tách sự phụ thuộc giữa các lớp.
- Thay vì một class tự tạo ra đối tượng cần dùng
- Thì nó được “tiêm vào” từ bên ngoài (qua constructor, setter, hoặc hàm).
ví dụ

      class Service {
          private final Repository repo;
              Service(Repository repo) {
              this.repo = repo;
          }
      }
# SOLID
là 5 chữ cái viết cho 5 nguyên tắc thiết kế:
+ Single responsibility principle (SRP): một class chỉ thay đổi vì 1 lí do duy nhất
+ Open/closed principle (OCP): có thể thoải mái mở rộng 1 class nhưng lên sửa lại những class cũ
+ Liskov substitution principle (LSP): trong 1 chương trình class của con có thể thay thế cho lớp cha mà không làm thay đổi tính đúng đắn của chương trình
+ Interface segregation principle (ISP): thay vì dùng 1 giao diện lớn, ta nên tách thành nhiều interface nhỏ, với nhiều mục đích cụ thể
+ Dependency inversion principle (DIP): các module cao không phụ thuộc vào các module cấp thấp, inter không phụ thuộc vào chi tiết mà ngược lại 

# MVC
- là viết tắt cuả controller, view , model là mô hình phổ biến trong thiết kế phần mềm
- MVC sử dụng 3 phần: controller, view, model
- trong đó mỗi phần đều có các chức năng đóng vai trò và nhiệm vụ riêng biệt mà ảnh hưởng đến nhau.

+ Model: là nơi chứa các hàm thực hiện xử lý login và dữ liệu với database
+ View là interface giao diện người dùng, chứa các input, button, ...
+ Controller là nơi trung gian giữa model và view, nơi đảm nhận vai trò nhận request từ client đến server dựa và request thông qua model để lấy kết quả client cần và truyền lại giá trị cho view về cho người dùng
