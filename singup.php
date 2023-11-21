<?php
include("connect.php");
if (isset($_POST["submit"])) {
    //if($_POST['password'] === $_POST['Cpassword])
    if (!empty($_POST["name"]) && !empty($_POST("email")) && !empty($_POST["password"]) && !empty($_POST["Cpassword"])) {
        $name = htmlspecialchars(strtolower(trim($_POST["name"])));
        $email = htmlspecialchars(strtolower(trim($_POST["email"])));
        $password = md5($_POST["password"]);
        $Cpassword = md5($_POST["Cpassword"]);
        if ($password == $Cpassword) {
            $query = "INSERT INTO singnup(name,email,password) VALUE('$name','$email','$password')";
            if (mysqli_query($con, $query)) {
                header('Location:login.php');
            } else {
                echo "no connected";
            }
        } else {
            echo "il faut saisir tous les champs";
        }
    } else {
        echo "password est faux";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
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