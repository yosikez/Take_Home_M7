<?php 
require_once("config/account.php");
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-wrap">
        <h3>Login Account</h3>
        <form method="post">
            <input type="text" name="username" placeholder="Username" id="user">
            <input type="text" name="password" placeholder="Password" id="pass">
            <button type="submit" name="submit">Login</button>
        </form>
    </div>

    



</body>

</html>