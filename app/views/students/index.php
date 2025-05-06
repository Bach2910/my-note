<div class="container mt-5">
    <h2>Danh sách sinh viên</h2>
    <button class="btn btn-primary mb-2"><a class="nav-link active text-white"
                                            href="index.php?controller=student&action=create">Thêm mới</a></button>
    <table class="table table-primary">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Email</th>
            <th scope="col">SDT</th>
            <th scope="col">Address</th>
            <th scope="col">Lớp</th>
            <th scope="col" style="text-align: center">Ảnh</th>
            <th scope="col">Function</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $stu): ?>
            <tr>
                <td><?= $stu['id'] ?></td>
                <td><?= $stu['name'] ?></td>
                <td><?= $stu['email'] ?></td>
                <td><?= $stu['phone'] ?></td>
                <td><?= $stu['address'] ?></td>
                <td><?= $stu['class_name'] ?></td>
                <td>
                    <?php
                    $images = explode(',', $stu['images']);
                    foreach ($images as $img) {
                        echo "<img  src='/public/$img' width='90' style='margin-right: 10px'>";
                    }
                    ?>
                </td>
                <td>
                    <button type="button" class="btn btn-success"><a class="nav-link text-white"
                                href="index.php?controller=student&action=edit&id=<?= $stu['id'] ?>">Sửa</a></button>
                    <button type="button" class="btn btn-danger"><a class="nav-link text-white"
                                href="index.php?controller=student&action=delete&id=<?= $stu['id'] ?>"
                                onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></button>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>