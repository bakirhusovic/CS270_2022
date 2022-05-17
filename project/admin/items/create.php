<?php

require('../../includes/checkLogged.php');

require_once('../../includes/mysql.php');

$query = mysqli_query($conn, 'select * from categories');
?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $title = 'Create a new item';
    include('../../includes/head.php');
    ?>
</head>
<body>
<div class="wrapper">
    <a href="index.php">Back to items</a>
    <form action="save.php" method="POST">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="10" cols="30"></textarea>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" step=".01" name="price" id="price" required>
        </div>
        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                <option value="">Select a category</option>
                <?php while ($category = mysqli_fetch_assoc($query)): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit">Save</button>
    </form>
</div>
</body>
</html>
