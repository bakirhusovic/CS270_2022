<?php

require_once('includes/mysql.php');

$query = mysqli_query($conn, "UPDATE categories set name = '" . $_POST['category_name'] . "' where id = " . $_GET['id']);

header('Location: categoryList.php');
//var_dump($query);

