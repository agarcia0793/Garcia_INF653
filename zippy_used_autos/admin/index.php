<?php
require_once('../db/db_connect.php');
require_once('../model/vehicles_db.php');
require_once('../model/makes_db.php');
require_once('../model/types_db.php');
require_once('../model/classes_db.php');

$sort = $_GET['sort'] ?? 'price';
$order = $_GET['order'] ?? 'desc';

$vehicles = get_vehicles($sort, $order);
$makes = get_makes();
$types = get_types();
$classes = get_classes();

function build_sort_link($column, $label, $currentSort, $currentOrder) {
    $newOrder = ($currentSort === $column && $currentOrder === 'asc') ? 'desc' : 'asc';
    return "<a href='?sort=$column&order=$newOrder'>$label</a>";
}
?>

<?php include '../view/header.php'; ?>

<h2>Admin - Vehicle List</h2>

<table>
    <thead>
        <tr>
            <th><?= build_sort_link('vehicle_id', 'ID', $sort, $order) ?></th>
            <th><?= build_sort_link('year', 'Year', $sort, $order) ?></th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th><?= build_sort_link('price', 'Price', $sort, $order) ?></th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicles as $v) : ?>
        <tr>
            <td><?= $v['vehicle_id'] ?></td>
            <td><?= htmlspecialchars($v['year']) ?></td>
            <td><?= htmlspecialchars($v['make_name']) ?></td>
            <td><?= htmlspecialchars($v['model']) ?></td>
            <td><?= htmlspecialchars($v['type_name']) ?></td>
            <td><?= htmlspecialchars($v['class_name']) ?></td>
            <td>$<?= number_format($v['price'], 2) ?></td>
            <td>
                <form action="delete_vehicle.php" method="post">
                    <input type="hidden" name="vehicle_id" value="<?= $v['vehicle_id'] ?>">
                    <button class="delete-btn">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h3>Add a New Vehicle</h3>
<form action="add_vehicle.php" method="post">
    <label>Year:</label>
    <input type="number" name="year" required>

    <label>Make:</label>
    <select name="make_id">
        <?php foreach ($makes as $make) : ?>
            <option value="<?= $make['make_id'] ?>"><?= htmlspecialchars($make['make_name']) ?></option>
        <?php endforeach; ?>
    </select>

    <label>Model:</label>
    <input type="text" name="model" required>

    <label>Type:</label>
    <select name="type_id">
        <?php foreach ($types as $type) : ?>
            <option value="<?= $type['type_id'] ?>"><?= htmlspecialchars($type['type_name']) ?></option>
        <?php endforeach; ?>
    </select>

    <label>Class:</label>
    <select name="class_id">
        <?php foreach ($classes as $class) : ?>
            <option value="<?= $class['class_id'] ?>"><?= htmlspecialchars($class['class_name']) ?></option>
        <?php endforeach; ?>
    </select>

    <label>Price:</label>
    <input type="number" name="price" step="0.01" required>

    <br><br>
    <button type="submit">Add Vehicle</button>
</form>

<?php include '../view/footer.php'; ?>
