<?php
include 'assets/php/Connection.php'; ?>
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
    <link rel="stylesheet" href="assets/css/ww_vergeten.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="application/javascript" src="assets/javascript/index.js"></script>
    <title>Gezondheidsmeter - wachtwoord vergeten</title>
</head>
<body>
<div class="sitecontainer">
    <!-- header -->
    <div class="headercontainer">
        <image class="logosmall" src="assets/images/logo.png" alt="logo">
            <h2>Wachtwoord reset</h2>
            <a style="visibility:hidden;" href="settings.php">
                <image class="settingsmenu" src="assets/images/settings.png" alt="settings">
            </a>
    </div>
    <!-- content -->
    <div class="center">
        Voer hier uw E-mail in om uw wachtwoord te resetten.<br>
        <form class="form" action="" method="POST">
            <input class="inputfield" type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email">
            <input class="button" type="submit" name="request" value="Email aanvragen">
        </form>
    </div>
</div>
</body>
</html>