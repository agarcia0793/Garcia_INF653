<?php
require_once('../db/db_connect.php');
require_once('../model/makes_db.php');

$makes = get_makes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $make_name = trim($_POST['make_name']);
    if (!empty($make_name)) {
        add_make($make_name);
        header("Location: makes.php");
        exit();
    }
}

if (isset($_GET['delete_make_id'])) {
    $make_id = $_GET['delete_make_id'];
    delete_make($make_id);
    header("Location: makes.php");
    exit();
}

include('../view/makes_list.php');
?>
