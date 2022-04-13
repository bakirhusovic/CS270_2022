<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //var_dump((bool) 2 === "2");

    //if ($_POST) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstName = $_POST['first_name'] ?? '';
        /*$lastName = isset($_POST['last_name']) ? $_POST['last_name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';*/
        $lastName = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password)) {
            echo 'Form input is valid';
            var_dump($firstName);
            header('Location: register.html');
        } else {
            echo 'Form is invalid';
        }
    } else {
        echo 'GET requests are not allowed';
    }
?>
