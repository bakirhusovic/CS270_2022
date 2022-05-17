<?php

require('../../includes/checkLogged.php');

?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $title = 'Create a new category';
    include('../../includes/head.php');
    ?>
</head>
<body>
<div class="wrapper">
    <a href="index.php">Back to categories</a>
    <form action="save.php" method="POST">
        <div>
            <label for="name">Name</label>
            <input type="text" name="category_name" id="name" required>
        </div>
        <button type="submit">Save</button>
    </form>
</div>
</body>
</html>
