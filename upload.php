<?php
    session_start();
    include 'create_listing.php';
    $statusMsg = '';
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

    // File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database

                $insert = $conn->query("INSERT into listings (title, description, price, posted, picture, id_posted) VALUES ('$title', '$description', $price, NOW(), '".$fileName."', $id)");
                if($insert){
                    $statusMsg = "Listing successfully posted.";
                }else{
                    $statusMsg = "Listing posting failed, please try again.";
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your listing.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG & PNG files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }

    // Display status message
    echo $statusMsg;
?>
