<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['category_name'] ?? '';
    /*$name = isset($_POST['category_name']) ? $_POST['category_name'] : '';
    if (isset($_POST['category_name'])) {
        $name = $_POST['category_name'];
    } else {
        $name = '';
    }*/

    if (!empty($name)) {
        require_once('../../includes/mysql.php');

        mysqli_query($conn, "insert into categories (name) values ('{$name}')");

        header('Location: /admin/categories');
    } else {
        die('Name cannot be empty');
    }
} else {
    echo 'Forbidden';
}
