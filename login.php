<?php

require 'includes/init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = require 'includes/db.php';

    if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {
        
        Auth::login();

        Url::redirect('/www/');

    } else {
        
        $error = "login incorrect";

    }
}

?>
<?php require 'includes/header.php'; ?>

<h2>Login</h2>

<?php if (! empty($error)) : ?>
    <p><?= $error ?></p>
<?php endif; ?>

<form method="post">

    <div class="form-group">
        <label for="username">Username</label>
        <input name="username" id="username" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <button class="btn">Log in</button>

    <p>Don't have an account? <a href="/www/register.php">Register</a></p>

    

</form>

<?php require 'includes/footer.php'; ?>
