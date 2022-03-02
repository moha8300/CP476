<?php

    session_start();
    error_reporting(0);

    include 'config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME</title>
</head>
<body>  
    <div style="text-align:right;"> 
            <a href="create_listing.php">Post</a>
            <a href="logout.php">Logout</a>
    </div>
    <h2 style="text-align:center;">
        Welcome
        <strong>
            <?php echo $_SESSION['user_login']; ?>
        </strong>
    </h2>
</body>
</html>