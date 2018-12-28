<?php
include('server.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>User Registeration System</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Register</h2>
        </div>

        <form action="register.php" method="post">

        <!-- apply validations -->
        <?php include('errors.php'); ?>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $user_name ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email ?>">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="register">Register</button>
            </div>
            <p>Already a member? <a href='login.php'>log in</a> </p>
        </form>

    </body>
</html>