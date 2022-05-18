<?php

require('../../includes/checkLogged.php');

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

$query = mysqli_query($conn, 'select a.id, a.name as category_name, b.first_name, b.last_name from categories a left join users b on a.user_id = b.id');

?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $title = 'Categories';
    include('../../includes/head.php');
    ?>
</head>
<body>
    <div class="wrapper">
        <a href="/admin/categories/create.php">Create a new category</a>

        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Author</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($category = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['category_name'] ?></td>
                    <td><?= $category['first_name'] ?> <?= $category['last_name'] ?></td>
                    <td><a href="/admin/categories/edit.php?id=<?= $category['id'] ?>">Edit</a></td>
                    <td><a href="/admin/categories/delete.php?id=<?= $category['id'] ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>

    </div>
</body>
</html>
