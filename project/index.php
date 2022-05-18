<?php
 session_start();

 require_once('includes/mysql.php');

 $categoriesQuery = mysqli_query($conn, 'select a.id, a.name, count(b.id) as num_of_items from categories a, items b where a.id = b.category_id group by a.id, a.name order by count(b.id) desc limit 5');
 $itemsQuery = mysqli_query($conn, 'select * from items order by id desc limit 5');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php while($category = mysqli_fetch_assoc($categoriesQuery)): ?>
        <div><?= $category['name'] ?> (<?= $category['num_of_items'] ?> items)</div>
    <?php endwhile; ?>
    <h2>Items</h2>
    <?php while($item = mysqli_fetch_assoc($itemsQuery)): ?>
        <div><?= $item['name'] ?></div>
    <?php endwhile; ?>
</body>
</html>
