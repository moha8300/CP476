<?php


include 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- linking it to the style sheet-->
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>
        Kijiji Spinoff
    </title>
</head>
<body>
    <div class="container">
        <form action="authentication.php" method="POST" class="loginEmail"> <!--this tag is to create a form within HTML-->
            <p class="loginText" style="font-size: 2rem; font-weight: 800;">
                Login
            </p> 

            <div class="inputGroup">
                <input type="email" placeholder="Email" name="email" /> <!-- a way to get data from the user-->
            </div>

            <div class="inputGroup">
                <input type="password" placeholder="Password" name="password"?> <!-- a way to get data from the user-->
            </div>

            <div class="inputGroup">
                <button name="submit" class="button">
                    Login
                </button> <!-- clickable button by the user-->
            </div>
            
            <p class="loginRegistration"> Don't have an account? <a href="register.php">Register here</a>!</p>
        </form>
    </div>
</body>
</html>
