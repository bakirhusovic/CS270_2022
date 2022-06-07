<?php

require('../../includes/checkLogged.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['category_name'] ?? '';
    /*$name = isset($_POST['category_name']) ? $_POST['category_name'] : '';
    if (isset($_POST['category_name'])) {
        $name = $_POST['category_name'];
    } else {
        $name = '';
    }*/
    $userId = $_SESSION['user_id'];

    if (!empty($name)) {
        require_once('../../includes/mysql.php');

        mysqli_query($conn, "insert into categories (name, user_id) values ('{$name}', {$userId})");

        $categoryId = mysqli_insert_id($conn);
        mysqli_query($conn, "insert into items (name, description, price, category_id, user_id) values ('Default item', 'N/A', 0, {$categoryId}, {$userId})");
        header('Location: /admin/categories');
    } else {
        die('Name cannot be empty');
    }
} else {
    echo 'Forbidden';
}
