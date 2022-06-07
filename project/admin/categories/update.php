<?php

require('../../includes/checkLogged.php');

require_once('../../includes/mysql.php');

$query = mysqli_query($conn, "UPDATE categories set name = '" . $_POST['category_name'] . "' where id = " . $_GET['id']);

//var_dump(mysqli_affected_rows($conn)); // number of affected rows

header('Location: categoryList.php');
//var_dump($query);

