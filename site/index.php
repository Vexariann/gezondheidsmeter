<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<script> alert('U bent al ingelogt.'); window.location.href='dashboard.php';</script>";
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="gezondheidsmeter">
    <meta name="authors" content="Joel, Julian, Jeremy, Miquel, Tiffany & Rens">
    <meta name="keywords" content="gezondheid, meter, gezondheidsmeter, gezond leven, eten, slaap, drugs, drinken">
    <link rel="icon" href="assets/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="application/javascript" src="assets/javascript/index.js"></script>
    <title>Gezondheidsmeter - Home</title>
</head>
    <div class="sitecontainer">
        <!-- content -->
        <image class="logo" src="assets/images/logobig.png" alt="logo"><br>
        <div class="buttongroup">
            <a class="button" href="registreren.php">
                Registreren
            </a>
            <a class="button" href="inloggen.php">
                Inloggen
            </a>
        </div>
    </div>
</body>
</html>