<?php
$dsn = "mysql:host=localhost; dbname=assignment_tracker";
$username = 'root';
$password = 'Garcia007';

try{
$db = new PDO($dsn, $username, $password);    
} catch (PDOException $e){
error_log($e->getMessage());
die("Database connection is failed");
}
