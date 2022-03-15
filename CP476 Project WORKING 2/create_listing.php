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



        <style>

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
                color: #555;
            }
            p{
                color: #555;
            }
            .licolor{
                color: white;
            }
            .navbar{
                background-color: lightgray;
            }
            .container1{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 400px;
                background: lightgray;
                border-radius: 10px;
            }
            .container1 h1{
                text-align: center;
                padding: 0 0 20px 0;
                border-bottom: 1px solid silver;
            }
            .container1 form{
                padding: 0 40px;
                box-sizing: border-box;
            }
            form .txt_field{
                position: relative;
                border-bottom:  2px solid #adadad;
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
                color: #adadad;
                transform: translateY(-50%);
                font-size: 16px;
                pointer-events: none;
            }
           input[type="submit"]{
               width: 100%;
               margin: 20px 0;
               height: 50px;
               border: 1px solid;
               background: #2691d9;
               border-radius: 25px;
           }
           input[type="submit"]:hover{
               border-color: #2691d9;
               transition: .5s;
           }


        
        
        </style>
    </head>

        <body>
        
            <header>
                <div class="container">
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
                        <label>ItemDescription</label>
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