<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Registeration System</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Log In</h2>
        </div>
        <form action="login.php" method="post">
            <!-- apply validations -->
            <?php include('errors.php'); ?>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login">Log In</button>
            </div>
            <p>Not yet a member? <a href='register.php'>Register</a> </p>
        </form>

    </body>
</html>