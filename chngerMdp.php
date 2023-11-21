<?php
include("connect.php");
if (isset($_POST["submit"])) {
    if (!empty($_POST["name"]) && !empty($_POST("email")) && !empty($_POST["password"]) && !empty($_POST["Cpassword"])) {
        $name = htmlspecialchars(strtolower(trim($_POST["name"])));
        $password = md5($_POST["password"]);
        $query = "SELECT *FROM singnup WHERE name='$name' && password='$password'";
        if (mysqli_num_rows(mysqli_query($conn, $query)) > 0) {
            $_SESSION['name'] = $name;
            header('Location:login.php');
        } else {
            echo "password ou name est faut!";
        }
    } else {
        echo "il faut saisir tous les champs";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" required name="name" placeholder="name"><br>
        <input type="email" required name="email" placeholder="email"><br>
        <input type="password" required name="password" placeholder="password" minlength="8"><br>
        <input type="password" required name="Cpassword" placeholder="confirme password" minlength="8"><br>
        <button type="submit" name="submit">SignUp</button>


    </form>

</body>

</html>