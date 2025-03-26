<?php
require_once('../db/db_connect.php');
require_once('../model/types_db.php');

$action = $_POST['action'] ?? null;
if ($action === 'add') {
    $type_name = trim($_POST['type_name']);
    if (!empty($type_name)) {
        add_type($type_name);
    }
} elseif ($action === 'delete') {
    $type_id = $_POST['type_id'];
    delete_type($type_id);
}
$types = get_all_types();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Types</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Manage Types</h1>
<form method="post">
    <input type="hidden" name="action" value="add">
    <input type="text" name="type_name" required>
    <button type="submit">Add Type</button>
</form>
<table>
<tr><th>Type</th><th>Action</th></tr>
<?php foreach ($types as $type): ?>
    <tr>
        <td><?= htmlspecialchars($type['type_name']) ?></td>
        <td>
            <form method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="type_id" value="<?= $type['type_id'] ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<?php include('footer.php'); ?>
</body>
</html>