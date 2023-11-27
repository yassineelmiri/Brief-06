<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Luxe </title>
    <link rel="stylesheet" href="styleHome.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/3010b1eaf1.js" crossorigin="anonymous"></script>
</head>

<body>


    <br><br><br>

    <main class="signup-form">

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-signup">
                <h1 class="form-title">Gestion des Agences</h1>
                <input type="number" name="idBank" class="form-input" placeholder="number de bank">
                <input type="number" name="longitude" class="form-input" placeholder="longitude">
                <input type="number" name="latitude" class="form-input" placeholder="latitude">
                <input type="text" name="adresse" class="form-input" placeholder="adresse">
                <button type="submit" name="submit" class="form-button">ajouter</button>
                <?php
                include("connect.php");
                if (isset($_POST["submit"])) {
                    //if($_POST['password'] === $_POST['Cpassword])
                    // if (!empty($_POST["name"]) && !empty($_POST("email")) && !empty($_POST["password"]) ) {
                    $idBank = htmlspecialchars(strtolower(trim($_POST['idBank'])));
                    $longitude = htmlspecialchars(strtolower(trim($_POST['longitude'])));
                    $latitude = htmlspecialchars(strtolower(trim($_POST['latitude'])));
                    $adresse = htmlspecialchars(strtolower(trim($_POST['adresse'])));
                    if ($longitude && $latitude && $adresse && $idBank) {
                        $query = "INSERT INTO agences(longitude,latitude,adresse,idBank)values('$longitude','$latitude','$adresse','$idBank')";
                        mysqli_query($con, $query);
                        echo "valid";
                    }
                } else {
                    echo "il faut saisir tout les champs";
                }

                ?>
            </div>
        </form>

    </main>
</body>

</html>