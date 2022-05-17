<?php
require('../includes/checkLogged.php');
?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $title = 'Dashboard';
    include('../includes/head.php');
    ?>
</head>
<body>
    <h1>Hi <?= $_SESSION['first_name'] ?></h1>
    <nav>
        <a href="/admin/categories">Categories</a>
        <a href="/admin/items">Items</a>
        <a href="/admin/logout.php">Logout</a>
    </nav>
</body>
</html>
