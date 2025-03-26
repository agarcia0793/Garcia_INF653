<?php
require_once('../db/db_connect.php');
require_once('../model/classes_db.php');

$action = $_POST['action'] ?? null;
if ($action === 'add') {
    $class_name = trim($_POST['class_name']);
    if (!empty($class_name)) {
        add_class($class_name);
    }
} elseif ($action === 'delete') {
    $class_id = $_POST['class_id'];
    delete_class($class_id);
}
$classes = get_all_classes();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Classes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Manage Classes</h1>
<form method="post">
    <input type="hidden" name="action" value="add">
    <input type="text" name="class_name" required>
    <button type="submit">Add Class</button>
</form>
<table>
<tr><th>Class</th><th>Action</th></tr>
<?php foreach ($classes as $class): ?>
    <tr>
        <td><?= htmlspecialchars($class['class_name']) ?></td>
        <td>
            <form method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="class_id" value="<?= $class['class_id'] ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<?php include('footer.php'); ?>
</body>
</html>