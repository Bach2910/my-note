* Cấu trúc file trong javaScript
- file javaScript có phần mở rộng là .js
- được cấu trúc bằng 2 cách:

        <script src="reset.php"></script>
Hoặc 
        
        <script>
                let a = 10;
                let b = "hello";
        </script>

* BIẾN, KIỂU DỮ LIỆU, TOÁN TỬ

Biến gồm có var, let, const:

    var a = 10; không thể thay đổi khi được khai báo, có phạm vi toàn cục(ít dùng)
    let a = 10; có thể thay đổi có phạm vị cục bộ
    const a = 10; hằng số, ko thể thay đổi

Kiểu dữ liệu:
Primitive: string, boolean, number, null, undefine, bigint, symbol;
object: array, object, function

    let str = "HEllo";
    let num = 10;
    let boolean = true;
    let obj = {name => "an"};
    let arr = [1,2,3];

Toán tử:
+ số học: +, -, *, /, %
+ so sánh: ==, ===, !=, !==, >, <, >=, <=
+ logic: &&, ||, !

* Câu điều kiện, vòng lặp

- Câu điều kiện: ìf else else if

      if (a > 5) {
         console.log("Lớn hơn 5");
      } else if (a === 5) {
         console.log("Bằng 5");
      } else {
         console.log("Nhỏ hơn 5");
      }
- Vòng lặp: for, while, do while

        for (let i = 0; i < 5; i++) {
           console.log(i);
        }
        
        let i = 0;
        while (i < 5) {   
           console.log(i);
           i++;
        }
        
        do {
          console.log(i);
          i--;
        } while (i > 0);

* Hàm, Chuỗi, Mảng
- hàm:

        function greet(name) {
            return "Hello " + name;
        }
        const sum = (a, b) => a + b;
- chuỗi

        let s = "JavaScript";
        console.log(s.length);           // 10
        console.log(s.toUpperCase());    // JAVASCRIPT
        console.log(s.includes("Script")) // true
- mảng

        let fruits = ["apple", "banana", "cherry"];
        console.log(fruits[1]); // banana


* DOM Manipulation
DOM là viết tắt của (Document Object Model) câú trúc cây đại diện cho toàn bộ nội dung HTML của trang web
DOM Manipulation là việc dùng javascript để truy cập, thay đổi, thêm, xóa các phẩn tử HTML trong trang web
- document.getElementById("id"): lấy phẩn tử theo ID
- document.querySelector("#id"): Lấy phần tử đầu tiên theo class / tag
- element.innerText = "...": Thay toàn bộ HTML bên trong
- element.style.color = "red": Đổi CSS bằng JS
- element.classList.add("new-class"): Thêm class mới
- element.setAttribute("href", "link")	Thay đổi thuộc tính
- element.remove():	Xóa phần tử
- createElement("div"):	Tạo thẻ HTML mới
- appendChild(): Thêm phần tử con
- element.addEventListener("click", func): Gán sự kiện click

Các sự kiên mà ta dung trong addEventListener
+ Mouse Event: dùng với chuột
  click:	    Khi click chuột trái
  dblclick:	    Double click
  mousedown:	Nhấn chuột (chưa nhả)
  mouseup:	    Thả chuột
  mousemove:	Di chuyển chuột
  mouseenter:	Di chuột vào phần tử (không lặp)
  mouseleave:	Rời chuột khỏi phần tử
  mouseover:	Di chuột vào (có lặp qua con)
  mouseout:	    Rời khỏi (có lặp qua con)
  contextmenu:	Click chuột phải (hiện menu chuột phải)

+ Keyboard Events: bàn phím
  keydown:	Nhấn 1 phím
  keypress:	(Cũ, không khuyến khích dùng)
  keyup:	Nhả phím

+ Form Events: form
  submit	Gửi form
  change	Giá trị thay đổi (radio, select...)
  input:	Khi nhập dữ liệu (text, textarea)
  focus:	Khi phần tử được focus
  blur:	    Khi phần tử mất focus
  reset:	Reset form
  invalid	Khi form bị lỗi validate

+ UI Events (Giao diện)
  load:	    Trang hoặc hình ảnh đã tải xong
  resize	Khi thay đổi kích thước cửa sổ
  scroll	Khi cuộn trang
  error:	Có lỗi xảy ra (hình ảnh, script...)

+ Clipboard Events (Sao chép)
  copy:	    Khi sao chép
  cut:	    Khi cắt
  paste:	Khi dán

+ Touch Events (Thiết bị cảm ứng)
  touchstart:	Khi chạm vào màn hình
  touchmove:	Khi di ngón tay trên màn hình
  touchend:	    Khi nhấc ngón tay lên
  touchcancel:	Khi hệ thống huỷ touch

+ Drag and Drop Events (Kéo và thả)
  drag:	        Khi phần tử đang được kéo
  dragstart:	Bắt đầu kéo
  dragend:      Kết thúc kéo
  dragenter:	Kéo vào vùng
  dragover: 	Đang rê trên vùng
  dragleave:	Rời khỏi vùng
  drop:	        Thả vào vùng

+ Media Events (Âm thanh, video)
  play, pause, ended:	Phát, dừng, kết thúc video/audio
  volumechange:	Thay đổi âm lượng
  timeupdate:	Khi thời gian phát thay đổi
  loadedmetadata:	Metadata đã tải
  seeking, seeked:	Khi tua video/audio

+ Window Events
  beforeunload:	Trước khi thoát trang
  unload:	    Trang bị đóng
  hashchange:	Khi URL hash thay đổi
  popstate:	    Khi chuyển trạng thái lịch sử (back/forward)

+ Animation & Transition Events
  animationstart:	    Bắt đầu animation
  animationend:	        Kết thúc animation
  animationiteration:	Lặp lại animation
  transitionstart:	    Bắt đầu transition
  transitionend:	    Kết thúc transition

- QuerySelection: được dùng để chọn và thao tác với phần tử HTML trên trang web bằng cách sử dụng cú pháp CSS.

      <input type="text" id="name">
      <button id="btn">Hiển thị</button>
      <p id="result"></p>
        <script>
            const btn = document.querySelector('#btn');
            btn.addEventListener('click', () => {
                const name = document.querySelector('#name').value;
                document.querySelector('#result').innerText = `Xin chào, ${name}!`;
            });
        </script>

* Working with javaScript

      let numbers = [1, 2, 3, 4, 5];
      
      // map: tạo mảng mới
      let squared = numbers.map(n => n * n);
      
      // filter: lọc phần tử
      let even = numbers.filter(n => n % 2 === 0);
      
      // reduce: tính tổng
      let sum = numbers.reduce((total, num) => total + num, 0);
      
      // forEach: lặp qua mảng
      numbers.forEach(n => console.log(n));
      
      // find: tìm phần tử đầu tiên thoả điều kiện
      let firstEven = numbers.find(n => n % 2 === 0);
      
      // some: có ít nhất một phần tử đúng, trả về giá trị true hoặc false
      let hasOdd = numbers.some(n => n % 2 !== 0);
      
      // every: tất cả đều đúng, trả về giá trị true hoặc false
      let allPositive = numbers.every(n => n > 0);