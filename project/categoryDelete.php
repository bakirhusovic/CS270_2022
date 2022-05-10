<?php

require_once('includes/mysql.php');

$query = mysqli_query($conn, "DELETE FROM categories where id = " . $_GET['id']);

header('Location: categoryList.php');
//var_dump($query);

