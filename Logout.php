<?php
include("interdit.php");
echo "bienvenue ";
if (isset($_POST["submit"])) {
    unset($_SESSION["name"]);
    header("Location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <button type="submit" name="submit">Logout</button>


    </form>

</body>

</html>