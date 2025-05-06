<h2>List Class</h2>
<button class="btn btn-primary mb-2"><a class="nav-link active text-white"
                                        href="index.php?controller=classes&action=create">Thêm mới</a></button>
<table class="table table-primary">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Class</th>
        <th scope="col">Description</th>
    </tr>
    </thead>
    <?php foreach ($classes as $stu): ?>
        <tr>
            <td><?= $stu['class_name'] ?></td>
            <td><?= $stu['description'] ?></td>
            <td>
                <button type="button" class="btn btn-success"><a class="nav-link text-white"<a
                            href="index.php?controller=classes&action=edit&id=<?= $stu['id'] ?>">Sửa</a></button>
                <button type="button" class="btn btn-danger"><a class="nav-link text-white" <a
                            href="index.php?controller=classes&action=delete&id=<?= $stu['id'] ?>"
                            onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
