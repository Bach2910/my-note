- Class (Lớp): Là bản thiết kế cho một đối tượng. Nó định nghĩa các thuộc tính (property) và phương thức (method).

      class Car {
          public $brand;
          public function drive() {
              echo "Driving...";
          }
      }

- Object(đối tượng) là thực thể được tạo ra từ class
    
      $my_car = new Car()

- Constructor: là phương thức khởi tạo, tự chạy khi tạo 1 đối tượng, dùng để gán lại giá trị ban đầu

        class Car {
            public $brand;
            public function __construct($brand) {
                $this->brand = $brand;
            }
        }
        
        $car = new Car("Toyota");

- Destructor: là phương thức hủy, tự động gọi khi object bị huỷ (cuối chương trình hoặc unset). Dùng để giải phóng tài nguyên.

        public function __destruct() {
            echo "Car object is being destroyed.";
        }

* Trong OOP sẽ gồm có 4 thành phần là: Đa hình, kế thừa, đóng gói, trừu tượng:

- Trừu tượng (Abstraction): Lớp trừu tượng định nghĩa các phương thức nhưng không triển khai. Class con phải triển khai lại.

        abstract class Shape {
            abstract public function area();
        }
        
        class Square extends Shape {
            public function area() {
                return 4 * 4;
            }
        }

- Kế thừa (Inheritance): Class con có thể kế thừa class cha và sử dụng lại thuộc tính/phương thức.

        class Animal {
            public function speak() {
                echo "Some sound";
            }
        }
        
        class Dog extends Animal {
            public function speak() {
                echo "Bark";
            }
        }

- Đóng gói (Encapsulation): Che giấu thông tin bên trong class, chỉ cho phép truy cập qua phương thức.Gồm có 3 phương thức protected chỉ cho phép các lớp con thuộc lớp cha ấy truy cập vào. Public là mọi thuộc tính đều có quyền truy cập vào. Private chỉ có các method thuộc lớp đấy mới có quyền truy cập vào

      class User {
          private $name; // chỉ truy cập được bên trong class
        
          protected $email; // class con có thể truy cập
        
          public $role; // ai cũng có thể truy cập
        
          public function setName($name) {
              $this->name = $name; // dùng method để gán giá trị
          }
        
          public function getName() {
              return $this->name; // dùng method để lấy giá trị
          }
      }

- Đa hình có nghĩa là "nhiều hình thái" — cùng một phương thức (method) nhưng có thể có nhiều cách thực hiện khác nhau tùy vào class cụ thể.

        class Animal {
            public function speak() {
                echo "Some sound";
            }
        }
        
        class Dog extends Animal {
            public function speak() {
                echo "Woof!";
            }
        }
        
        class Cat extends Animal {
            public function speak() {
                echo "Meow!";
            }
        }
        
        // Sử dụng:
        function makeAnimalSpeak(Animal $animal) {
            $animal->speak(); // Gọi đúng phiên bản theo đối tượng truyền vào
        }
        
        makeAnimalSpeak(new Dog()); // 👉 Woof!
        makeAnimalSpeak(new Cat()); // 👉 Meow!

* Namespace, Autoload
- Namespace: Dùng để nhóm các class, tránh xung đột tên.

        namespace App\Controllers;
        
        class HomeController {}

cách use: 

        use App\Controllers\HomeController;

- Autoload: PHP tự động load file class khi bạn tạo object mà không cần require. Dùng spl_autoload_register() hoặc Composer autoload.

        spl_autoload_register(function ($class) {
          include $class . '.php';
        });
        
        $car = new Car(); // PHP tự tìm và include Car.php

* Interface, Trait
- Interface: Định nghĩa khuôn mẫu (chỉ có tên phương thức). Class implements phải định nghĩa hết.

        interface Logger {
            public function log($message);
        }
        
        class FileLogger implements Logger {
            public function log($message) {
                echo "Logging: $message";
            }
        }

- Trait: tạo ra những phương thức chung mà không cần phải dùng đến kế thừa.

        trait HelloTrait {
            public function sayHello() {
                echo "Hello!";
            }
        }
        
        class Person {
            use HelloTrait;
        }
        
        $p = new Person();
        $p->sayHello(); // Hello!
