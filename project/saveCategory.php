<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['category_name'];

    $conn = mysqli_connect('localhost', 'wls', 'local', 'cs270_2022');

    mysqli_query($conn, "insert into categories (name) values ('{$name}')");

    header('Location: categoryList.php');
} else {
    echo 'Forbidden';
}
