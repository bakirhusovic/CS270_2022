<?php

if ($_POST) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $conn = mysqli_connect('localhost', 'root', '', 'final_2022');

    $query = mysqli_query($conn, "insert into movies (title, description) values ('$title', '$description')");


}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New movie</title>
</head>
<body>
<form action="" method="POST">
    <div>
        <label for="movie_title">Title</label>
        <input type="text" name="title" id="movie_title" required>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <?php
    if (isset($query) && $query) {
        echo 'Success';
    }
    ?>
    <button type="submit">Submit</button>
</form>
</body>
</html>
