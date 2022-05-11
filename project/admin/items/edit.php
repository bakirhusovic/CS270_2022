<?php

require_once('../../includes/mysql.php');

$query = mysqli_query($conn, 'select * from items where id = ' . $_GET['id']);
$categoriesQuery = mysqli_query($conn, 'select * from categories');

$item = mysqli_fetch_assoc($query);

if (!$item) {
    die('The item doesn\'t exists');
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

<form action="update.php?id=<?= $item['id'] ?>" method="POST">
    <input type="hidden" name="id" value="<?= $item['id'] ?>">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $item['name'] ?>">
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="10" cols="30"><?= $item['description'] ?></textarea>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="number" step=".01" name="price" id="price" required value="<?= $item['price'] ?>">
    </div>
    <div>
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" required>
            <option value="">Select a category</option>
            <?php while ($category = mysqli_fetch_assoc($categoriesQuery)): ?>
                <option <?= $category['id'] == $item['category_id'] ? 'selected' : null ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <button type="submit">Save</button>
</form>
</body>
</html>
