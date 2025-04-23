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



