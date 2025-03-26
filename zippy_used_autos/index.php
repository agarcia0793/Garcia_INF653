<?php
require('model/vehicles_db.php');
require('model/makes_db.php');
require('model/types_db.php');
require('model/classes_db.php');

// Get filter and sort parameters
$make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
$sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING) ?? 'price';
$order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_STRING) ?? 'desc';

// Get dropdown options
$makes = get_makes();
$types = get_types();
$classes = get_classes();

// Get vehicles based on filters (support partial filters)
$vehicles = get_vehicles_filtered($make_id, $type_id, $class_id, $sort, $order);

// Include view files
include('view/header.php');
include('view/filters.php');
include('view/sort_dropdown.php');
include('view/vehicle_list.php');
include('view/footer.php');

?>
