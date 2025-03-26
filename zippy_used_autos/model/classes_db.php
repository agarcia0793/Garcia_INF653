<?php

function get_classes() {
    global $db;
    $query = 'SELECT * FROM classes ORDER BY class_name';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll();
}

function add_class($class_name) {
    global $db;
    $query = 'INSERT INTO classes (class_name) VALUES (:class_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_name', $class_name);
    $statement->execute();
}

function delete_class($class_id) {
    global $db;
    $query = 'DELETE FROM classes WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
}

?>

