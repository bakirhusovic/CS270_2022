<?php

require_once('../includes/mysql.php');

$query = mysqli_query($conn, 'select a.id, a.name, a.image, a.price, a.description, b.name as category_name from items a, categories b where a.category_id = b.id');

$data = [];

while($row = mysqli_fetch_assoc($query)) {
    $data[] = [
        'item_id' => (int) $row['id'],
        'item_name' => $row['name'],
        'item_image' => $row['image'],
        'item_description' => $row['description'],
        'category_name' => $row['category_name'],
    ];
}

echo json_encode($data);

header('Content-Type: application/json');
