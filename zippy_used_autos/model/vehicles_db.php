<?php
require_once(__DIR__ . '/../db/db_connect.php');

// Get all vehicles with sorting
function get_vehicles($sort = 'price', $order = 'desc') {
    global $db;
    $allowedSorts = ['vehicle_id', 'year', 'price'];
    $allowedOrder = ['asc', 'desc'];

    // Sanitize inputs
    if (!in_array($sort, $allowedSorts)) $sort = 'price';
    if (!in_array($order, $allowedOrder)) $order = 'desc';

    $query = "
        SELECT v.*, m.make_name, t.type_name, c.class_name
        FROM vehicles v
        JOIN makes m ON v.make_id = m.make_id
        JOIN types t ON v.type_id = t.type_id
        JOIN classes c ON v.class_id = c.class_id
        ORDER BY $sort $order";
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Filter by make
function get_vehicles_by_make($make_id, $sort = 'price', $order = 'desc') {
    global $db;
    $query = "
        SELECT v.*, m.make_name, t.type_name, c.class_name
        FROM vehicles v
        JOIN makes m ON v.make_id = m.make_id
        JOIN types t ON v.type_id = t.type_id
        JOIN classes c ON v.class_id = c.class_id
        WHERE v.make_id = :make_id
        ORDER BY $sort $order";
    
    $stmt = $db->prepare($query);
    $stmt->bindValue(':make_id', $make_id);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Filter by type
function get_vehicles_by_type($type_id, $sort = 'price', $order = 'desc') {
    global $db;
    $query = "
        SELECT v.*, m.make_name, t.type_name, c.class_name
        FROM vehicles v
        JOIN makes m ON v.make_id = m.make_id
        JOIN types t ON v.type_id = t.type_id
        JOIN classes c ON v.class_id = c.class_id
        WHERE v.type_id = :type_id
        ORDER BY $sort $order";
    
    $stmt = $db->prepare($query);
    $stmt->bindValue(':type_id', $type_id);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Filter by class
function get_vehicles_filtered($make_id, $type_id, $class_id, $sort, $order) {
    global $db;

    $query = "
        SELECT v.*, m.make_name, t.type_name, c.class_name
        FROM vehicles v
        JOIN makes m ON v.make_id = m.make_id
        JOIN types t ON v.type_id = t.type_id
        JOIN classes c ON v.class_id = c.class_id
        WHERE 1=1";

    if ($make_id) {
        $query .= " AND v.make_id = :make_id";
    }
    if ($type_id) {
        $query .= " AND v.type_id = :type_id";
    }
    if ($class_id) {
        $query .= " AND v.class_id = :class_id";
    }

    $allowed_sorts = ['price', 'year', 'vehicle_id'];
    $allowed_orders = ['asc', 'desc'];
    $sort = in_array($sort, $allowed_sorts) ? $sort : 'price';
    $order = in_array($order, $allowed_orders) ? $order : 'desc';

    $query .= " ORDER BY v.$sort $order";

    $stmt = $db->prepare($query);

    if ($make_id) $stmt->bindValue(':make_id', $make_id);
    if ($type_id) $stmt->bindValue(':type_id', $type_id);
    if ($class_id) $stmt->bindValue(':class_id', $class_id);

    $stmt->execute();
    return $stmt->fetchAll();
}

?>
