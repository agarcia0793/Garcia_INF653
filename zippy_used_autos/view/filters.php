<form method="GET" id="filters-form">
    <label>Make:
        <select name="make_id" onchange="this.form.submit()">
            <option value="">All Makes</option>
            <?php foreach ($makes as $make): ?>
                <option value="<?= $make['make_id'] ?>" <?= ($make_id ?? '') == $make['make_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($make['make_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>Type:
        <select name="type_id" onchange="this.form.submit()">
            <option value="">All Types</option>
            <?php foreach ($types as $type): ?>
                <option value="<?= $type['type_id'] ?>" <?= ($type_id ?? '') == $type['type_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($type['type_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>Class:
        <select name="class_id" onchange="this.form.submit()">
            <option value="">All Classes</option>
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['class_id'] ?>" <?= ($class_id ?? '') == $class['class_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($class['class_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
</form>
