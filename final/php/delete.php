<?php

// insert your code here
$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', '', 'final_2022');

$query = mysqli_query($conn, 'delete from movies where id = ' . $id);

if(mysqli_affected_rows($conn) == 1) {
    echo 'Success';
} else {
    echo '0 rows affected';
}

