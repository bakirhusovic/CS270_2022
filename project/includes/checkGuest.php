<?php
session_start();

if (isset($_SESSION['is_logged']) && $_SESSION['is_logged']) {
    header('Location: /admin');
    exit();
}
