<?php include 'header.php'; ?>

<h2>All Vehicles</h2>

<table>
    <thead>
        <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicles as $v) : ?>
        <tr>
            <td><?= htmlspecialchars($v['year']) ?></td>
            <td><?= htmlspecialchars($v['make_name']) ?></td>
            <td><?= htmlspecialchars($v['model']) ?></td>
            <td><?= htmlspecialchars($v['type_name']) ?></td>
            <td><?= htmlspecialchars($v['class_name']) ?></td>
            <td>$<?= number_format($v['price'], 2) ?></td>
            <td><a href="?delete_vehicle_id=<?= $v['vehicle_id'] ?>" onclick="return confirm('Delete this vehicle?')">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>


