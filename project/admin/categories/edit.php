<?php

require('../../includes/checkLogged.php');

$conn = mysqli_connect('localhost', 'wls', 'local', 'cs270_2022');

$query = mysqli_query($conn, 'select * from categories where id = ' . $_GET['id']);

$category = mysqli_fetch_assoc($query);

if (!$category) {
    die('The category doesn\'t exists');
}

?>
<!doctype html>
<html lang="en">
<head>
    <?php
    include('../../includes/head.php');
    ?>
</head>
<body>
<a href="/admin/categories">Back to categories</a>

<form action="update.php?id=<?= $category['id'] ?>" method="POST">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">
    <div>
        <label for="name">Name</label>
        <input type="text" name="category_name" id="name" value="<?= $category['name'] ?>">
    </div>
    <button type="submit">Save</button>
</form>
</body>
</html>
