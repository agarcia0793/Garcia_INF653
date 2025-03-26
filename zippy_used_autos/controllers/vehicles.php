<?php
require_once('../model/database.php');
require_once('../model/vehicles_db.php');
require_once('../model/makes_db.php');
require_once('../model/types_db.php');
require_once('../model/classes_db.php');

// Get filters and sort inputs
$make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
$sort = $_GET['sort'] ?? 'price';
$order = $_GET['order'] ?? 'desc';

// Determine which filter is set
if ($make_id) {
    $vehicles = get_vehicles_by_make($make_id, $sort, $order);
} elseif ($type_id) {
    $vehicles = get_vehicles_by_type($type_id, $sort, $order);
} elseif ($class_id) {
    $vehicles = get_vehicles_by_class($class_id, $sort, $order);
} else {
    $vehicles = get_vehicles($sort, $order);
}

// Get all options for dropdowns
$makes = get_makes();
$types = get_types();
$classes = get_classes();

include('../view/vehicle_list.php');
