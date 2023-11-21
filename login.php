<?php
include("connect.php");
session_start();
if (isset($_POST["submit"])) {
    $name = htmlspecialchars(strtolower(trim($_POST["name"])));
    $password = htmlspecialchars(strtolower(trim($_POST["password"])));
    $query = "SELECT * FROM singnup WHERE name='$name' && password='$password'";
    if (mysqli_num_rows(mysqli_query($con, $query)) > 0) {
        $_SESSION['name'] = $user;
        header("Location:login.php");
    } else {
        echo "name ou password est faut";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginIn</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="POST">
        <input type="text" required name="name" placeholder="name "><br>
        <input type="password" required name="password" placeholder="password" minlength="8"><br>
        <button type="submit" name="submit">Login</button>
        <a href="chngerMdp.php">j'ai oublie mot de passe !</a>


    </form>

</body>

</html>