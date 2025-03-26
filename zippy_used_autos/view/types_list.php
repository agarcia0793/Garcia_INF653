<?php include 'header.php'; ?>

<h2>Manage Types</h2>

<table>
    <thead>
        <tr>
            <th><a href="?sort=vehicle_id&order=<?= $sort === 'vehicle_id' && $order === 'asc' ? 'desc' : 'asc' ?>">ID</a></th>
            <th><a href="?sort=year&order=<?= $sort === 'year' && $order === 'asc' ? 'desc' : 'asc' ?>">Year</a></th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th><a href="?sort=price&order=<?= $sort === 'price' && $order === 'asc' ? 'desc' : 'asc' ?>">Price</a></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicles as $v) : ?>
        <tr>
            <td><?= htmlspecialchars($v['vehicle_id']) ?></td>
            <td><?= htmlspecialchars($v['year']) ?></td>
            <td><?= htmlspecialchars($v['make_name']) ?></td>
            <td><?= htmlspecialchars($v['model']) ?></td>
            <td><?= htmlspecialchars($v['type_name']) ?></td>
            <td><?= htmlspecialchars($v['class_name']) ?></td>
            <td>$<?= number_format($v['price'], 2) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<h3>Add New Type</h3>
<form method="post" action="types.php">
    <label for="type_name">Type Name:</label>
    <input type="text" name="type_name" required>
    <button type="submit">Add</button>
</form>

<?php include 'footer.php'; ?>
