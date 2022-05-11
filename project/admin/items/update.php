<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $categoryId = $_POST['category_id'] ?? '';

    if (!empty($name) && !empty($price) && !empty($categoryId)) {
        require_once('../../includes/mysql.php');

        mysqli_query($conn, "update items set name = '{$name}', 
                 description =  '{$description}', 
                 price = {$price}, 
                 category_id = {$categoryId}
                 where id = " . $_GET['id']);

        header('Location: /admin/items');
    } else {
        die('Please check your input and try again');
    }
} else {
    echo 'Forbidden';
}
