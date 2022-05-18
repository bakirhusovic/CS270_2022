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

        header('Location: /admin/categories');
    } else {
        die('Name cannot be empty');
    }
} else {
    echo 'Forbidden';
}
