<?php

require('../../includes/checkLogged.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $categoryId = $_POST['category_id'] ?? '';
    $image = $_FILES['image'] ?? null;
    $imageName = '';
    if ($image) {
        $imageName = time() . '_' . $image['name'];
        move_uploaded_file($image['tmp_name'], '../../assets/uploads/' . $imageName);
    }

    $userId = $_SESSION['user_id'];

    if (!empty($name) && !empty($price) && !empty($categoryId)) {
        require_once('../../includes/mysql.php');

        mysqli_query($conn, "insert into items (name, description, price, category_id, image, user_id) values ('{$name}', '{$description}', {$price}, {$categoryId}, '{$imageName}', {$userId})");

        header('Location: /admin/items');
    } else {
        die('Please check your input and try again');
    }
} else {
    echo 'Forbidden';
}
