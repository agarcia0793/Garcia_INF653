<?php include 'header.php'; ?>

<h2>Manage Classes</h2>

<table>
    <thead>
        <tr>
            <th>Class Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($classes as $class): ?>
            <tr>
                <td><?= htmlspecialchars($class['class_name']) ?></td>
                <td>
                    <a href="?delete_class_id=<?= $class['class_id'] ?>" onclick="return confirm('Delete this class?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h3>Add New Class</h3>
<form method="post" action="classes.php">
    <label for="class_name">Class Name:</label>
    <input type="text" name="class_name" required>
    <button type="submit">Add</button>
</form>

<?php include 'footer.php'; ?>
