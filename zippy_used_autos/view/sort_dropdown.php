<form method="GET" id="sort-form">
    <!-- Preserve existing filters -->
    <input type="hidden" name="make_id" value="<?= htmlspecialchars($make_id ?? '') ?>">
    <input type="hidden" name="type_id" value="<?= htmlspecialchars($type_id ?? '') ?>">
    <input type="hidden" name="class_id" value="<?= htmlspecialchars($class_id ?? '') ?>">

    <label>Sort By:
        <select name="sort" onchange="this.form.submit()">
            <option value="price" <?= ($sort ?? '') === 'price' ? 'selected' : '' ?>>Price</option>
            <option value="year" <?= ($sort ?? '') === 'year' ? 'selected' : '' ?>>Year</option>
            <option value="vehicle_id" <?= ($sort ?? '') === 'vehicle_id' ? 'selected' : '' ?>>Vehicle ID</option>
        </select>
    </label>

    <label>
        <select name="order" onchange="this.form.submit()">
            <option value="desc" <?= ($order ?? '') === 'desc' ? 'selected' : '' ?>>Descending</option>
            <option value="asc" <?= ($order ?? '') === 'asc' ? 'selected' : '' ?>>Ascending</option>
        </select>
    </label>
</form>

