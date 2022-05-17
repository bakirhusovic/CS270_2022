<?php

require('../includes/checkLogged.php');

$_SESSION = [];
session_destroy();

header('Location: /admin/login.php');
exit();
