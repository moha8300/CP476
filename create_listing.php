<?php
    session_start();
    // Create database connection
    $conn = new mysqli("127.0.0.1", "root", "laksitha", "listings");
    $login_db = new mysqli("127.0.0.1", "root", "laksitha", "login_register");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    $user = $_SESSION['user_login'];
    $query = $login_db->query("SELECT * FROM users WHERE username = '$user'");
    
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $id = $row['id'];
        
        }
    }
    $_SESSION['user_id'] = $id;

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Kijiji Spinoff</title>
        <link href="style1.css" rel="stylesheet">
        <style>

            body{
                background-color: #D6CE93;
            }
            .navbar{
                display: flex;
                align-items: center;
                padding: 20px;
            }
            nav{
                flex: 1;
                text-align: right;
            }
            nav ul{
                display: inline-block;
                list-style-type: none;
            }
            nav ul li{
                display: inline-block;
                margin-right: 20px;
                

            }
            a{
                text-decoration: none;
                color: #EFEBCE;
            }
            p{
                color: #EFEBCE;
            }
            .licolor{
                color: white;
            }
            .navbar{
                background-color: #A3A380;
            }
            
            .container1{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 400px;
                background: #A3A380;
                border-radius: 10px;
            }
            .container1 h1{
                text-align: center;
                font-weight: 900px;
                padding: 0 0 20px 0;
                color: #EFEBCE;
                border-bottom: 1px solid #EFEBCE;
            }
            .container1 form{
                padding: 0 40px;
                box-sizing: border-box;
            }
            form .txt_field{
                position: relative;
                border-bottom:  2px solid #EFEBCE;
                margin: 30px 0;
            }
            .txt_field input{
                width: 500px;
                padding: 0 5px;
                height: 40px;
                font-size: 16px;
                border: none;
                background: none;
                outline: none;
            }
            .txt_field label{
                position: absolute;
                top: 50%;
                left: 5px;
                color: #EFEBCE;
                transform: translateY(-50%);
                font-size: 16px;
                pointer-events: none;
            }
            /* the below code is proably not needed at all */
            .txt_field span::before{
                content: '';
                position: absolute;
                top: 40px;
                left: 0px;
                width: 100%;
                height: 2px;
            }
            .txt_field input:focus ~ label, 
            .txt_field input:valid ~ label{
                top: -5px;
            }


           input[type="submit"]{
               width: 100%;
               margin: 20px 0;
               height: 50px;
               border: 1px solid;
               background: #EFEBCE;
               border-radius: 25px;
           }
           input[type="submit"]:hover{
               border-color: #EFEBCE;
               transition: .5s;
           }
        
        </style>
    </head>

        <body>
        
            <header>
                <div class="">
                    <div class="navbar">
                    <div class="name">
                        <label>Kijiji Spinoff!</label>
                    </div>
                    <nav>
                        <ul class="licolor">
                        <li><a href="welcome.php">Homepage</a></li>
                        <li><a href="uploads.php">Listings</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </nav>
                    </div>
                </div>
            </header>

            <div class="container1">
                <h1>Post a Listing</h1>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="txt_field">
                        <input type="text" name="title">
                        <label>Title</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="description">
                        <label>Item Description</label>
                    </div>
                    <div class="txt_field">
                        <input type="number" name="price" step=".01">
                        <label>Price</label>
                    </div>
                    <div class="txt_field">
                        <input type="file" name="file">
                    </div>
                    <div class="txt_field">
                        <input type="submit" name="submit" value="Upload">
                    </div>
                </form>
            </div>

        </body>

</html>