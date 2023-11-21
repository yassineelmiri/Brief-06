<?php
session_start(); //masfoufa fiha bzef dyal bayanate 
if (!$_SESSION['name']) {
    header('Location:login.php');
    exit();
}
?>