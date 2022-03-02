<?php

$server ="127.0.0.1";
$user = "root";
$pass = "1234";
$database = "login_register";

//$conn = new mysqli($server, $user, $pass, $database);

$conn = new mysqli("127.0.0.1", "root", "laksitha", "login_register");

if (!$conn)
{
    die("<script>alert('Connection Failed.')</script>");
}


?>