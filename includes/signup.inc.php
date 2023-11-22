<?php

if (isset($_POST["signup-submit"])) {
    require "../connect.php";

    // Utilisez la fonction trim() pour supprimer les espaces en début et fin de chaîne
    $name = trim($_POST["uid"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $repeatedPassword = $_POST["password-repeat"];

    // Utilisez la fonction empty() pour vérifier si les champs sont vides
    if (empty($name) || empty($email) || empty($password) || empty($repeatedPassword)) {
        header("Location: ../signup.php?error=emptyfields&uid=" . $name . "&email=" . $email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location: ../signup.php?error=invalidemailUid");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidemail&uid=" . $name);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location: ../signup.php?error=invaliduid&email=" . $email);
        exit();
    } else if ($password !== $repeatedPassword) {
        header("Location: ../signup.php?error=passwordcheck&uid=" . $name . "&email=" . $email);
        exit();
    } else {
        $sql = "SELECT userid FROM users WHERE userid = ?";
        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resCheck = mysqli_stmt_num_rows($stmt);

            if ($resCheck > 0) {
                header("Location: ../signup.php?error=usertaken&email=" . $email);
                exit();
            } else {
                $sql = "INSERT INTO users (userid, useremail, passwordUser) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($con);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedpdw = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedpdw);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }

    // Placez la fermeture des connexions à la base de données à l'intérieur de la condition principale
    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    header("Location: ../signup.php?");
    exit();
}
?>