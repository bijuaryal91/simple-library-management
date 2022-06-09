<?php
    session_start();
    if(isset($_SESSION["user"]))
    {
        header("location:dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>
    <div class="container">
        <label class="heading">Admin Login</label>
        <form method="post" action="php/verifyUser.php" onsubmit="return validate()">
            <input type="text" name="username" placeholder="Enter Username" class="input-field username" autocomplete="off">
            <input type="password" name="password" placeholder="Enter Password" class="input-field password">
            <input type="submit" value="Login" class="btn-primary" name="submit">
            <div class="errorText"></div>
    
        </form>
    </div>

</body>
<script src="main.js"></script>
</html>