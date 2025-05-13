document.getElementById('sub-btn').addEventListener('click', function (event) {
    // Ngăn chặn hành động mặc định của liên kết
    event.preventDefault();

    // Lấy dữ liệu từ form
    const fullName = document.getElementById('full-name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;

    // Tạo nội dung tệp tin
    const fileContent = `New Opinion Submission\n\nFull Name: ${fullName}\nEmail: ${email}\nPhone No: ${phone}\nMessage: ${message}`;

    // Tạo đối tượng Blob với nội dung tệp tin
    const blob = new Blob([fileContent], {type: 'text/plain'});

    // Tạo URL cho Blob
    const url = URL.createObjectURL(blob);

    // Tạo phần tử a và kích hoạt tải về
    const a = document.createElement('a');
    a.href = url;
    a.download = 'opinion_submission.txt';
    document.body.appendChild(a);
    a.click();

    // Giải phóng URL Blob
    URL.revokeObjectURL(url);
});
