<?php
require_once('../db/db_connect.php');
require_once('../model/makes_db.php');

$action = $_POST['action'] ?? null;

if ($action === 'add') {
    $make_name = trim($_POST['make_name']);
    if (!empty($make_name)) {
        add_make($make_name);
    }
} elseif ($action === 'delete') {
    $make_id = $_POST['make_id'];
    delete_make($make_id);
}

$makes = get_all_makes();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Makes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Manage Makes</h1>
<form method="post">
    <input type="hidden" name="action" value="add">
    <input type="text" name="make_name" required>
    <button type="submit">Add Make</button>
</form>
<table>
<tr><th>Make</th><th>Action</th></tr>
<?php foreach ($makes as $make): ?>
    <tr>
        <td><?= htmlspecialchars($make['make_name']) ?></td>
        <td>
            <form method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="make_id" value="<?= $make['make_id'] ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<?php include('footer.php'); ?>
</body>
</html>