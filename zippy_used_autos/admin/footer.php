<?php
$current = basename($_SERVER['PHP_SELF']);
$pages = [
    'index.php' => 'Vehicles',
    'add_vehicle.php' => 'Add Vehicle',
    'manage_makes.php' => 'Makes',
    'manage_types.php' => 'Types',
    'manage_classes.php' => 'Classes'
];
echo "<footer><ul>";
foreach ($pages as $file => $name) {
    if ($file !== $current) {
        echo "<li><a href='$file'>$name</a></li>";
    }
}
echo "</ul></footer>";
?>