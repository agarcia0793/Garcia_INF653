<?php
require_once('../db/db_connect.php');
require_once('../model/vehicles_db.php');

$year = $_POST['year'];
$make_id = $_POST['make_id'];
$model = $_POST['model'];
$type_id = $_POST['type_id'];
$class_id = $_POST['class_id'];
$price = $_POST['price'];

add_vehicle($year, $make_id, $model, $type_id, $class_id, $price);

// redirect back to admin page
header("Location: index.php");
exit();
