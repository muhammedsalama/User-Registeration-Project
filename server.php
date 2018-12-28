<?php
session_start();

// connect to database
$server_name = 'localhost';
$db_name = 'registeration';
$host_name = 'root';
$password = '';

$db_connect = mysqli_connect($server_name,$host_name,$password,$db_name);
if($db_connect){
    $user_name="";
    $email="";
    $errors = array();

    if(isset($_POST['register'])){
        $user_name = mysql_real_escape_string($_POST['username']);
        $email = mysql_real_escape_string($_POST['email']);
        $password = mysql_real_escape_string($_POST['password']);
        $confirm_password = mysql_real_escape_string($_POST['confirm_password']);

        //ensure filling up the input fields
        if(empty($user_name)){
            array_push($errors,"Username is required!");
        }
        if(empty($email)){
            array_push($errors,"Email is required!");
        }
        if(empty($password)){
            array_push($errors,"Password is required!");
        }
        if(empty($confirm_password)){
            array_push($errors,"Confirmed Password is required!");
        }
        if($password != $confirm_password){
            array_push($errors,"The two passwords must match!");
        }

        //if there are no errors ,save user to database
        if(count($errors) == 0){
            $password = md5($password);        //encrypt password before storing it
            $insert_query = "INSERT INTO users (username, email, password) VALUES ('$user_name','$email', '$password')";
            mysqli_query($db_connect,$insert_query);

            $_SESSION['username'] = $user_name;
            $_SESSION['success'] = 'You are now logged in!';
            header('location: index.php');          //redirect to home page

        }

    }
}

if(isset($_POST['login'])){
    $user_name = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    
    //ensure filling up the input fields
    if(empty($user_name)){
        array_push($errors,"Username is required!");
    }
    if(empty($password)){
        array_push($errors,"Password is required!");
    }

    if(count($errors) == 0){
        $password = md5($password);
        $select_query = "SELECT * FROM users WHERE username = '$user_name' AND password = '$password'";
        $result = mysqli_query($db_connect,$select_query);
        if(mysqli_num_rows($result) == 1){
            //log user in
            $_SESSION['username'] = $user_name;
            $_SESSION['success'] = 'You are now logged in!';
            header('location: index.php');          //redirect to home page
        }else{
            array_push($errors,"Wrong Username/Password");
            header('location: login.php');
        }
    }

}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

?>