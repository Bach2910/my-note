<h2>Danh sách sinh viên lớp <?= htmlspecialchars($students[0]['class_name'] ?? 'Chưa xác định') ?></h2>
<table class="table table-primary">
    <tr>
        <th scope="col">Student in Class</th>
    </tr>

    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= htmlspecialchars($student['name']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>