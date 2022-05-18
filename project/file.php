<?php

require('includes/checkLogged.php');

$fileName = $_GET['filename'];

$content = file_get_contents('assets/uploads/' . $fileName);

header('Content-Type: image/jpeg');

echo $content;
