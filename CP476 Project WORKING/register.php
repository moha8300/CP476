<?php


include 'config.php';


if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cnfrmpassword = md5($_POST['cnfrmpassword']);

    if ($password == $cnfrmpassword)
    {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if(!$result->num_rows > 0)
        {
            $sql = "INSERT INTO users (username, email, password)
                VALUES ('$username', '$email', '$password')";

            $result = mysqli_query($conn, $sql);
            if ($result)
            {
                echo "<script>alert('User Registered!') window.location.href='index.php'; </script>";

            } else{
                echo "<script>alert('Something went wrong.')</script>";
            }
            
        } else {
            echo "<script>alert('An account with this email already exists.')</script>";
        }
        
    } else {
        echo "<script>alert('Password do not match.')</script>";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- linking it to the style sheet-->
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>
        Register For Kijiji Spinoff
    </title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="loginEmail"> <!--this tag is to create a form within HTML-->
            <p class="loginText" style="font-size: 2rem; font-weight: 800;">
                Register
            </p> 

            <div class="inputGroup">
                <input type="text" placeholder="Username" name="username" required> <!-- a way to get data from the user-->
            </div>

            <div class="inputGroup">
                <input type="email" placeholder="Email" name="email" required> <!-- a way to get data from the user-->
            </div>

            <div class="inputGroup">
                <input type="password" placeholder="Password" name="password" required> <!-- a way to get data from the user-->
            </div>

            <div class="inputGroup">
                <input type="password" placeholder="Confirm Password" name="cnfrmpassword" required> <!-- a way to get data from the user-->
            </div>

            <div class="inputGroup">
                <button name="submit" class="button">
                    Register
                </button> <!-- clickable button by the user-->
            </div>
            
            <p class="loginRegistration">Have an account? <a href="index.php">Login here</a>!</p>
        </form>
    </div>
</body>
</html>
