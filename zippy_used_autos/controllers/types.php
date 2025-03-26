<?php
require_once('../db/db_connect.php');
require_once('../model/types_db.php');

$types = get_types();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type_name = trim($_POST['type_name']);
    if (!empty($type_name)) {
        add_type($type_name);
        header("Location: types.php");
        exit();
    }
}

if (isset($_GET['delete_type_id'])) {
    $type_id = $_GET['delete_type_id'];
    delete_type($type_id);
    header("Location: types.php");
    exit();
}

include('../view/types_list.php');
?>
