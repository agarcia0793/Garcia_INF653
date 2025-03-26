<?php
require_once('../db/db_connect.php');
require_once('../model/classes_db.php');

$classes = get_classes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class_name = trim($_POST['class_name']);
    if (!empty($class_name)) {
        add_class($class_name);
        header("Location: classes.php");
        exit();
    }
}

if (isset($_GET['delete_class_id'])) {
    $class_id = $_GET['delete_class_id'];
    delete_class($class_id);
    header("Location: classes.php");
    exit();
}

include('../view/classes_list.php');
?>
