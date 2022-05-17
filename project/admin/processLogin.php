<?php

session_start();

require_once('../includes/mysql.php');

$email = mysqli_escape_string($conn, $_POST['username']);
$password = mysqli_escape_string($conn, $_POST['password']);

$query = mysqli_query($conn, "select * from users where email = '{$email}' and password = '{$password}'");

$user = mysqli_fetch_assoc($query);

if ($user) {
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['is_logged'] = true;
    $_SESSION['user_type'] = $user['type'];

    if ($user['type'] == 'admin') {
        header('Location: /admin');
    } else {

    }
    exit();
} else {
    $_SESSION['msg'] = 'Email and/or password is incorrect.';
    $_SESSION['form_input'] = $_POST;
    unset($_SESSION['form_input']['password']);
    header('Location: /admin/login.php');
    exit();
}
