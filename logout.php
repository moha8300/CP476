<?php

session_start();
unset ($_SESSION['user_login']);
unset($_SESSION['password']);
unset($_SESSION['email']);
session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
<script> Cache-Control: no-cache, no-store, must-revalidate
        Pragma: no-cache
        Expires: 0
</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php header("Location: index.php");?>
</head>
<body>

</body>


