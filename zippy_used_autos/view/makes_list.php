<?php include 'header.php'; ?>

<h2>Manage Makes</h2>

<table>
    <thead>
        <tr>
            <th>Make Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($makes as $make): ?>
            <tr>
                <td><?= htmlspecialchars($make['make_name']) ?></td>
                <td>
                    <a href="?delete_make_id=<?= $make['make_id'] ?>" onclick="return confirm('Delete this make?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h3>Add New Make</h3>
<form method="post" action="makes.php">
    <label for="make_name">Make Name:</label>
    <input type="text" name="make_name" required>
    <button type="submit">Add</button>
</form>

<?php include 'footer.php'; ?>
