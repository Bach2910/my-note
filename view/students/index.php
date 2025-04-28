<h1>Danh sách Sinh viên</h1>
<a href="index.php?action=create">Thêm mới</a>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
        <th>Tên</th>
        <th>Email</th>
        <th>Lớp</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($students)) { ?>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['email']) ?></td>
                <td><?= htmlspecialchars($student['class_name']) ?></td>
                <td>
                    <?php
                    $images = json_decode($student['images'], true);

                    if (is_array($images)) {
                        foreach ($images as $img) {
                            echo "<img src='" . htmlspecialchars($img) . "' width='100' style='margin:5px'>";
                        }
                    } elseif (!empty($student['images'])) {
                        // Nếu chỉ có 1 ảnh dạng string
                        $img = htmlspecialchars($student['images']);
                        echo "<img src='{$img}' width='100' style='margin:5px'>";
                    }
                    ?>
                </td>
                <td>
                    <a href="index.php?action=edit&id=<?= $student['id'] ?>">Sửa</a> |
                    <a href="index.php?action=delete&id=<?= $student['id'] ?>"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php } else { ?>
        <tr>
            <td colspan="5">Chưa có sinh viên nào.</td>
        </tr>
    <?php } ?>
    </tbody>
</table>
