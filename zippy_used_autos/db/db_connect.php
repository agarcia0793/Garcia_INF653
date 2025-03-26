<?php
$dsn = 'mysql:host=localhost;dbname=zippyusedautos';
$username = 'root';
$password = 'Garcia007'; 

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "Database Error: $error_message";
    exit();
}
?>