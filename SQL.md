1. Cấu trúc CSDL: Database, Table, Row, Column
+ Database: Tập hợp các bảng (table).
+ Table (Bảng): Chứa dữ liệu dưới dạng hàng và cột.
+ Row (Dòng): Một bản ghi dữ liệu (record).
+ Column (Cột): Một trường dữ liệu (field).

2. Tạo CSDL và bảng

           -- Tạo cơ sở dữ liệu
              CREATE DATABASE my_database;
        
           -- Dùng cơ sở dữ liệu
           USE my_database;
        
           -- Tạo bảng users
           CREATE TABLE users (
               id INT AUTO_INCREMENT PRIMARY KEY,
               name VARCHAR(100),
               email VARCHAR(100),
               created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
           );
3. Các thao tác cơ bản: INSERT / UPDATE / DELETE / SELECT

        -- Thêm dữ liệu
        INSERT INTO users (name, email) VALUES ('An', 'an@gmail.com');
        
        -- Cập nhật dữ liệu
        UPDATE users SET email = 'an123@gmail.com' WHERE name = 'An';
        
        -- Xóa dữ liệu
        DELETE FROM users WHERE id = 1;
        
        -- Lấy dữ liệu
        SELECT * FROM users;
4. Mệnh đề WHERE, ORDER BY, GROUP BY

       -- WHERE: lọc dữ liệu
       SELECT * FROM users WHERE name = 'An';
    
        -- ORDER BY: sắp xếp
        SELECT * FROM users ORDER BY name ASC;   -- ASC: tăng dần, DESC: giảm dần
        
        -- GROUP BY: nhóm dữ liệu
        SELECT name, COUNT(*) as total
        FROM users
        GROUP BY name;

- where: Dùng để chọn ra các bản ghi (rows) thỏa điều kiện, lọc dòng dữ liệu trước khi nhóm. Áp dụng trước khi GROUP BY, nghĩa là lọc dữ liệu nguyên bản chưa nhóm.
- Group by: Dùng để gộp dữ liệu theo một (hoặc nhiều) cột, dùng để nhóm các dòng lại với nhau. Phải kết hợp với hàm tổng hợp như: COUNT(), SUM(), AVG(), MAX(), MIN(),
- Having: dùng để lọc sau khi đã GROUP BY. Khác với WHERE, HAVING có thể dùng với các hàm tổng hợp.

        SELECT name, COUNT(*) as total
        FROM users
        GROUP BY name
        HAVING total > 1;
5. các kiểu JOIN
   gồm các kiểu join sau : INNER JOIN, lEFT JOIN, RIGHT JOIN, CROSS JOIN

- INNER JOIN — Chỉ lấy dữ liệu trùng khớp ở cả hai bảng,Chỉ trả về những bản ghi có kết nối (matching) giữa hai bảng.
  vd:Chỉ lấy những đơn hàng có khách hàng tồn tại.

        SELECT *
        FROM orders
        INNER JOIN customers ON orders.customer_id = customers.id;
- LEFT JOIN — Lấy tất cả dữ liệu từ bảng bên trái, và dữ liệu khớp từ bên phải
  vd:Lấy tất cả khách hàng, kể cả khách chưa đặt đơn hàng.

        SELECT *
        FROM customers
        LEFT JOIN orders ON customers.id = orders.customer_id;
- RIGHT JOIN — Lấy tất cả dữ liệu từ bảng bên phải, và dữ liệu khớp từ bên trái

      SELECT *
      FROM customers
      LEFT JOIN orders ON customers.id = orders.customer_id;

- CROSS JOIN — Kết hợp tất cả dòng của bảng A với tất cả dòng của bảng B
  vd:Nếu có 5 khách và 3 đơn hàng → kết quả: 5 x 3 = 15 dòng!
  SELECT *
  FROM customers
  CROSS JOIN orders;