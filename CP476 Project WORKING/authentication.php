<?php
session_start();

include 'config.php';


if (isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $email = stripcslashes($email);  
    $password = stripcslashes($password);  

    $email = mysqli_real_escape_string($conn, $email);  
    $password = mysqli_real_escape_string($conn, $password);  
    
    $encrypt_password=md5($password);

    $sql = "select * from users where email = '$email' and password = '$encrypt_password'";  

    $result = $conn->query($sql);

    $user_info = $result->fetch_column(1);
    

    $count = mysqli_num_rows($result);  

    if($count == 1){  
        $_SESSION['user_login'] = $user_info;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("Location: welcome.php");
    }  
    else
    {  
        echo "<script>
            alert('Wrong email or password incorrect.')
            window.location.href='index.php';
        </script>";
    }     
}




?>