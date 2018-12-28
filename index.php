<?php
    include('server.php');
?>

<?php 
    //if the user not logged in ,not allowed to visit ths page
    if(empty($_SESSION['username'])){
        header('location: login.php');
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>User Registeration System</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Home Page</h2>
        </div>

        <div class="content">
            <?php if(isset($_SESSION['success'])): ?>
            <div class="error success">
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
            <?php endif ?>

            <?php if(isset($_SESSION['username'])): ?>
                <p> Welcome <strong><?php echo $_SESSION['username'];?></strong> </p>
                <p><a href="index.php?logout='1'" style="color:red;">Log out</a>  </p>
            <?php endif ?>
        </div>


    </body>
</html>