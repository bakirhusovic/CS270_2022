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
<form action="" method="post">
    <div>
        <label for="num_1">Number 1</label>
        <input required type="text" id="num_1" name="num_1" value="<?php echo $_POST['num_1'] ?? '' ?>">
    </div>
    <div>
        <label for="num_2">Number 2</label>
        <input required type="text" id="num_2" name="num_2" value="<?php echo $_POST['num_2'] ?? '' ?>">
    </div>
    <button type="submit">Submit</button>
</form>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $_POST['num_1'] + $_POST['num_2'];

    echo 'Result: ' . $result;
} else {
    echo 'This is GET request';
}
?>

</body>
</html>
