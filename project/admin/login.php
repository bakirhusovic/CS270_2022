<?php
 require('../includes/checkGuest.php');

?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $title = 'Login';
    include('../includes/head.php');
    ?>
</head>
<body>
<div class="wrapper">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="processLogin.php" method="POST">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required value="<?= $_SESSION['form_input']['username'] ?? null ?>">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Save</button>
    </form>
    <?php unset($_SESSION['form_input']) ?>
</div>
</body>
</html>
