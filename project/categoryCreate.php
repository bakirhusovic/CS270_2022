<!doctype html>
<html lang="en">
<head>
    <?php
    $title = 'Create a new category';
    include('includes/head.php');
    ?>
</head>
<body>
<div class="wrapper">
    <a href="categoryList.php">Back to categories</a>
    <form action="saveCategory.php" method="POST">
        <div>
            <label for="name">Name</label>
            <input type="text" name="category_name" id="name">
        </div>
        <button type="submit">Save</button>
    </form>
</div>
</body>
</html>
