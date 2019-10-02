<?php include 'assets/php/connection.php' ?>
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
    <link rel="stylesheet" href="assets/css/settings.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="application/javascript" src="assets/javascript/index.js"></script>
    <title>Gezondheidsmeter - Instelligen</title>
</head>
<body>
<div class="sitecontainer">
    <!-- header -->
    <div class="headercontainer">
        <image class="logosmall" src="assets/images/logo.png" alt="logo">
            <h1>Instellingen</h1>
            <a class="settingsmenu" href="#">
                <image class="settingsimg" src="assets/images/settings.png" alt="settings">
            </a>
    </div>
    <!-- content -->
    <div class="button general">Algemene instellingen</div>
    <a class="button logout" href="logout.php">Uitloggen</a>
    <!-- bottom buttons-->
    <div class="bottomcontainer">
        <div class="bottombuttongroup">
            <a class="bottombutton" href="dashboard.php"><img class="bottomimg" src="assets/images/dashboard.png" alt="dashboard"></a>
            <a class="bottombutton" href="vragenformulier.php"><img class="bottomimg" src="assets/images/questions.png" alt="vragenformulier"></a>
            <a class="bottombutton" href="meldingen.php"><img class="bottomimg" src="assets/images/notifications.png" alt="meldingen"></a>
        </div>
    </div>
</div>
</body>
</html>