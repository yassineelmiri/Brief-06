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

        <form class="" action="includes/signup.inc.php" method="post">
            <div class="form-signup">
                <h1 class="form-title">Sign Up</h1>

                <input type="text" name="longitude" class="form-input" placeholder="longitude">
                <input type="text" name="latitude" class="form-input" placeholder="latitude">
                <input type="text" name="adresse" class="form-input" placeholder="adresse">                
                <button type="submit" name="signup-submit" class="form-button">Sign Up</button>
                <?php
                include("connect.php");
                if (isset($_POST["submit"])) {
                    //if($_POST['password'] === $_POST['Cpassword])
                    // if (!empty($_POST["name"]) && !empty($_POST("email")) && !empty($_POST["password"]) ) {
                    $longitude = htmlspecialchars(strtolower(trim($_POST['longitude'])));
                    $latitude = htmlspecialchars(strtolower(trim($_POST['latitude'])));
                    $adresse = htmlspecialchars(strtolower(trim($_POST['adresse'])));
                    if ($longitude && $latitude && $adresse) {
                        $query = "INSERT INTO client(longitude,latitude,adresse)values('$longitude','$latitude','$adresse')";
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




   

    <script>
        //menu responsive code JS

        var menu_toggle = document.querySelector('.menu_toggle');
        var menu = document.querySelector('.menu');
        var menu_toggle_span = document.querySelector('.menu_toggle span');

        menu_toggle.onclick = function () {
            menu_toggle.classList.toggle('active');
            menu_toggle_span.classList.toggle('active');
            menu.classList.toggle('responsive');
        }

    </script>
</body>

</html>