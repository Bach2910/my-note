@extends('layout.admin')
@section('title','My CV Profile')
@section('aside')
    <div class="profile">
        <h2><i class="fa fa-address-book"></i> My CV</h2>
        <div class="contact" style="display:inline-block;">
            <p>Họ và Tên: Phạm Ngọc Bách</p>
            <p>Email: ngoc22003@gmail.com</p>
            <p>Điện thoại: 0904186901</p>
            <p>Địa chỉ: Ngõ 850 Đường Láng, Láng Thượng, Đống Đa, Hà Nội</p>
        </div>
        <div class="profile">
            <section class="education">
                <h2><i class="fa fa-book"></i> Học Vấn</h2>
                <p>Trường Đại Học Thủy Lợi - Công nghệ thông tin (9/2022 - Hiện tại)</p>
            </section>
            <section class="skills">
                <h2><i class="fa fa-pencil-square"></i> Kỹ Năng</h2>
                <ul style="display: flex">
                    <li>Back-end: PHP, MySQL, Laravel</li>
                    <li style="margin-left: 4%">Application: Java</li>
                </ul>
            </section>
            <section class="projects">
                <h2><i class="fa fa-plane"></i> Dự Án Tại Trường</h2>
                <ul>
                    <li>
                        <strong>Hệ thống quản lý bán hàng (17/4/2023 - 11/6/2023)</strong><br>
                        Thành viên 5 người, vị trí: Thành viên
                    </li>
                    <li>
                        <strong>Hệ thống quản lý danh sách nhân viên (8/4/2024 - 10/4/2024)</strong><br>
                        Thành viên: 1 người, vị trí: Lập trình viên
                    </li>
                    <li>
                        <strong>Trang Web đặt hàng đồ ăn</strong><br>
                        Thành viên: 1 người , vị trí: Lập trình viên
                    </li>
                </ul>
            </section>
            <section class="interests">
                <h2><i class="fa fa-bicycle"></i> Sở Thích</h2>
                <p>Các hoạt động thể thao và Teambuilding</p>
            </section>
        </div>
    </div>
@endsection
