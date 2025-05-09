<h2>List Class</h2>
<button class="btn btn-primary mb-2"><a class="nav-link active text-white"
                                        href="index.php?controller=classes&action=create">Thêm mới</a></button>
<table class="table table-primary">
    <thead>
    <tr>
        <th scope="col">Class</th>
        <th scope="col">Description</th>
        <th scope="col">Function</th>
    </tr>
    </thead>
    <?php foreach ($classes as $stu): ?>
        <tr>
            <td><?= $stu['class_name'] ?></td>
            <td><?= $stu['description'] ?></td>
            <td>
                <button type="button" class="btn btn-success"><a class="nav-link text-white"<a
                            href="index.php?controller=classes&action=edit&id=<?= $stu['id'] ?>">Edit</a></button>
                <button type="button" class="btn btn-primary"><a class="nav-link text-white"<a
                            href="index.php?controller=classes&action=show&id=<?= $stu['id'] ?>">Detail</a></button>
                <button type="button" class="btn btn-danger"><a class="nav-link text-white" <a
                            href="index.php?controller=classes&action=delete&id=<?= $stu['id'] ?>"
                            onclick="return confirm('Bạn có chắc muốn xóa <?= $stu['class_name'] ?> ?')">Delete</a></button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
