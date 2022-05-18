<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    $conn = mysqli_connect('localhost', 'wls', 'local', 'cs270_2022');
} catch (Exception $e) {
    /*echo 'Cannot connect to the database';
    exit;*/
    die('Cannot connect to the database');
}

mysqli_select_db($conn, 'cs270_2022');

$query = mysqli_query($conn, 'select id, name as category_name from categories');

while ($test = mysqli_fetch_assoc($query)) {
    echo $test['id'] . ' ' . $test['category_name'] . '<br>';
}

while ($row = mysqli_fetch_array($query)) {
    echo $row[1];
}

/*if (mysqli_query($conn, "insert into categories (name) values ('test category')")) {
    echo 'Success';
} else {
    echo 'An error has occured';
}*/

