<?php

$conn = mysqli_connect('localhost', 'root', '', 'final_2022');

$id = $_GET['id'];

if ($_POST) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $updateQuery = mysqli_query($conn, "update movies set title = '$title', description = '$description' where id = $id");

    $numOfAffectedRows = mysqli_affected_rows($conn);

}

$query = mysqli_query($conn, 'select * from movies where id = ' . $id);

$movie = mysqli_fetch_assoc($query);

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
    <?php
    // show messages here
    if (isset($updateQuery)) {
        if (!$updateQuery) {
            echo 'An error has occurred';
        } else if ($numOfAffectedRows == 0) {
            echo 'No changes';
        } else if ($numOfAffectedRows == 1) {
            echo 'Success';
        }
    }
    ?>
    <div>
        <label for="movie_title">Title</label>
        <input type="text" name="title" id="movie_title" required value="<?php echo $movie['title'] ?>">
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"><?php echo $movie['description'] ?></textarea>
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>
