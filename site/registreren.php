<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<script> alert('U bent al ingelogt.'); window.location.href='dashboard.php';</script>";
}

include 'assets/php/Connection.php';
if (isset($_POST["username"])) {

    //setting the variables
    $username = "";
    $email = "";
    $password = "";
    $repeatpassword = "";
    $length = "";
    $weight = "";
    $gender = "";
    $errors = array();

    //escaping special characters in al variables
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repeatpassword = mysqli_real_escape_string($conn, $_POST['repeatpassword']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $datum = mysqli_real_escape_string($conn, $_POST['date']);
    $length = mysqli_real_escape_string($conn, $_POST['length']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    //see if it is empty and if empty it wil return a error
    if (empty($username)) {
        array_push($errors, "U moet een gebruikersnaam invullen.");
        echo "<script> alert('De gebruikersnaam moet nog ingevuld worden.')</script>";
    }
    if (empty($email)) {
        array_push($errors, "Email moet worden ingevuld.");
        echo "<script> alert('het Email adres moet nog ingevuld worden.')</script>";
    }
    if (empty($password)) {
        array_push($errors, "Wachtwoord moet worden ingevuld.");
        echo "<script> alert('Het wachtwoord moet nog ingevuld worden.')</script>";
    }
    if (empty($repeatpassword)) {
        array_push($errors, "Wachtwoord moet worden ingevuld.");
        echo "<script> alert('Het wachtwoord moet nog ingevuld worden.')</script>";
    }
    if (empty($datum)) {
        array_push($errors, "Datum moet worden ingevuld.");
        echo "<script> alert('De geboortedatum moet nog ingevuld worden.')</script>";
    }
    if (empty($length)) {
        array_push($errors, "De lengte moet worden ingevuld.");
        echo "<script> alert('De lengte moet nog ingevuld worden.')</script>";
    }
    if (empty($weight)) {
        array_push($errors, "Het gewicht moet worden ingevuld.");
        echo "<script> alert('Het gewicht moet nog ingevuld worden.')</script>";
    }
    if (empty($gender)) {
        array_push($errors, "Het geslacht moet worden ingevuld.");
        echo "<script> alert('Het geslacht moet nog ingevuld worden.')</script>";
    }
    if($password == $repeatpassword){
        //searching the name in the database to see if it already exists
        $user_check_query = "SELECT * FROM gebruiker WHERE gebruikersnaam ='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        //returns text if name or email already exists
        if ($user) {
            if ($user['gebruiker'] === $username) {
                array_push($errors, "Gebruikersnaam bestaat al.");
            }

            if ($user['email'] === $email) {
                array_push($errors, "Email bestaat al.");
            }
        }

        //if there were no errors it will continue the code
        if (count($errors) == 0) {
            //hashing the password
            $password = password_hash($password, PASSWORD_DEFAULT);

            //getting a unique id to put in the database and send with a mail
            $uniekid = uniqid();

            //puts data into database
            $query = "INSERT INTO gebruiker (gebruikersnaam, wachtwoord, email, geboortedatum, lengte, gewicht, geslacht, activeer_id) 
                      VALUES('$username', '$password', '$email', '$datum', '$length', '$weight', '$gender', '$uniekid')";

            mysqli_query($conn, $query);

            $user_check_query = "SELECT * FROM gebruiker WHERE gebruikersnaam ='$username' OR email='$email' LIMIT 1";
            $result = mysqli_query($conn, $user_check_query);
            $gebruiker = mysqli_fetch_assoc($result);


            //sets a mail to be send to the user to activate their account
            $to = $email;
            $subject = "Account activeren";

            $message = "
                <html>
                <head>
                <title>Account activeren</title>
                </head>
                <body>
                <p>Bedankt voor het aanmaken van een account, maar voordat u kunt inloggen moet u uw account activeren u kunt dat hier doen</p>
                <br>
                <a href='http://localhost/periode%209/gezondheidsmeter/site/account_activeren.php?email=$email&uniekid=$uniekid'>Activeer account</a>
                </body>
                </html>
                ";


            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <no-reply@gmail.com>' . "\r\n";

            mail($to, $subject, $message, $headers);
            //gives alert to user and sends them to index page
            echo "<script> alert('Er is een mail naar u gestuurd,u kunt nu uw account verifieren.'); window.location.href='index.php';</script>";
        }
    }else{
        echo "<script> alert('De Wachtwoorden zijn niet hetzelfde.')</script>";
    }
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
    <link rel="stylesheet" href="assets/css/registreren.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="application/javascript" src="assets/javascript/index.js"></script>
    <title>Gezondheidsmeter - Registreren</title>
</head>
<body>
    <div class="sitecontainer">
        <!-- header -->
        <div class="headercontainer">
        <a href="index.php">
            <image class="logosmall" src="assets/images/logo.png" alt="logo">
        </a>
        </div>
        <!-- content -->
        <form class="form" action="" method="POST">
            <input class="inputfield" type="text" required name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" placeholder="Gebruikersnaam">
            <input class="inputfield" type="password" required name="password" value="<?php echo isset($_POST['username']) ? $_POST['password'] : '' ?>" placeholder="Wachtwoord">
            <input class="inputfield" type="password" required name="repeatpassword" value="<?php echo isset($_POST['username']) ? $_POST['password'] : '' ?>" placeholder="Herhaal wachtwoord">
            <input class="inputfield" type="email" required name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email">
            <input class="inputfield" type="date" required name="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : '' ?>" placeholder="Geboortedatum">
            <input class="inputfield" type="number" required name="length" value="<?php echo isset($_POST['length']) ? $_POST['length'] : '' ?>" placeholder="Lengte">
            <input class="inputfield" type="number" required name="weight" value="<?php echo isset($_POST['weight']) ? $_POST['weight'] : '' ?>" placeholder="Gewicht">
            <div class="radiobuttonwrapper">
                <input class="radiobutton" type="radio" name="gender" value="male"> Man
                <input class="radiobutton" type="radio" name="gender" value="female"> Vrouw
                <input class="radiobutton" type="radio" name="gender" value="other"> Anders<br>
            </div>
            <input class="submitbutton" type="submit" name="inloggen" value="Registreren"><br>
        </form>
    </div>
</body>
</html>