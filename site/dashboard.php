<?php include 'assets/php/connection.php';
session_start();

if(!isset($_SESSION['username'])){
    echo "<script> alert('U bent nog niet ingelogt.'); window.location.href='inloggen.php';</script>";
}

$sql = "SELECT melding FROM melding WHERE datum = CURDATE() AND gebruiker_ID = " . $_SESSION['id'];
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result,MYSQLI_ASSOC);

if(isset($data)){

    $sql = "
        SELECT arbeid.datum , koppel_user_drinks.datum, koppel_user_drugs.datum, koppel_user_eten.datum, koppel_user_sport.datum, slaap.datum
        FROM arbeid 
        LEFT JOIN koppel_user_drinks ON arbeid.gebruiker_ID = koppel_user_drinks.gebruiker_ID
        LEFT JOIN koppel_user_drugs ON arbeid.gebruiker_ID = koppel_user_drugs.gebruiker_ID
        LEFT JOIN koppel_user_eten ON arbeid.gebruiker_ID = koppel_user_eten.gebruiker_ID
        LEFT JOIN koppel_user_sport ON arbeid.gebruiker_ID = koppel_user_sport.gebruiker_ID
        LEFT JOIN slaap ON arbeid.gebruiker_ID = slaap.gebruiker_ID
        WHERE arbeid.datum AND koppel_user_drinks.datum AND koppel_user_drugs.datum AND koppel_user_eten.datum AND koppel_user_sport.datum AND slaap.datum = CURDATE() AND arbeid.gebruiker_ID AND koppel_user_drinks.gebruiker_ID AND koppel_user_drugs.gebruiker_ID AND koppel_user_eten.gebruiker_ID AND koppel_user_sport.gebruiker_ID AND slaap.gebruiker_ID =" . $_SESSION['id'];
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if(isset($row)){
        $date = date("Y-m-d");
        $id = $_SESSION['id'];

        $query = "DELETE FROM melding WHERE datum = '$date' AND gebruiker_ID = '$id'";

        mysqli_query($conn, $query);
    }else{

    }
}else{
    /*
    $date = date("Y-m-d");
    $id = $_SESSION['id'];
    $query = "INSERT INTO melding (melding, datum, gebruiker_ID)
  			  VALUES('Er is voor vandaag nog geen data ingevuld.', $date, $id)";
=======
    $query = "INSERT INTO melding (melding, datum, gebruiker_ID)
  			  VALUES('Er is voor vandaag nog geen data ingevuld.', '$date', $id)";

    mysqli_query($conn, $query);
    */

    $sql = "
    SELECT arbeid.datum , koppel_user_drinks.datum, koppel_user_drugs.datum, koppel_user_eten.datum, koppel_user_sport.datum, slaap.datum
    FROM arbeid 
    LEFT JOIN koppel_user_drinks ON arbeid.gebruiker_ID = koppel_user_drinks.gebruiker_ID
    LEFT JOIN koppel_user_drugs ON arbeid.gebruiker_ID = koppel_user_drugs.gebruiker_ID
    LEFT JOIN koppel_user_eten ON arbeid.gebruiker_ID = koppel_user_eten.gebruiker_ID
    LEFT JOIN koppel_user_sport ON arbeid.gebruiker_ID = koppel_user_sport.gebruiker_ID
    LEFT JOIN slaap ON arbeid.gebruiker_ID = slaap.gebruiker_ID
    WHERE arbeid.datum AND koppel_user_drinks.datum AND koppel_user_drugs.datum AND koppel_user_eten.datum AND koppel_user_sport.datum AND slaap.datum = CURDATE() AND arbeid.gebruiker_ID AND koppel_user_drinks.gebruiker_ID AND koppel_user_drugs.gebruiker_ID AND koppel_user_eten.gebruiker_ID AND koppel_user_sport.gebruiker_ID AND slaap.gebruiker_ID =" . $_SESSION['id'];
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if(isset($row)){

    }else{
        $date = date("Y-m-d");
        $id = $_SESSION['id'];

        $query = "INSERT INTO melding (melding, datum, gebruiker_ID) 
  			  VALUES('Voor $date is nog geen data ingevuld.', '$date', $id)";

        mysqli_query($conn, $query);
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
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script
    <script type="application/javascript" src="assets/javascript/index.js"></script>
    <title>Gezondheidsmeter - Dashboard</title>
</head>
<body>
<div class="sitecontainer">
    <!-- header -->
    <div class="headercontainer">
        <image class="logosmall" src="assets/images/logo.png" alt="logo">
            <h1>Dashboard</h1>



            <a class="settingsmenu" href="settings.php">
                <image class="settingsimg" src="assets/images/settings.png" alt="settings">
            </a>

    </div>
    <?php echo "<p class='usernameheader'>" . $_SESSION['username'] . "</p>";?>
    <!-- content -->
    <div class="metercontainer">
        <div class="meter arbeid" id="arbeid">Arbeid<br>-</div>
        <div class="meter eten" id="eten">Eten<br>-</div>
        <div class="meter drinken" id="drinken">Drinken<br>-</div>
        <div class="meter drugs" id="drugs">Drugs<br>-</div>
        <div class="meter slaap" id="slaap">Slaap<br>-</div>
        <div class="meter sport" id="sport">Sport<br>-</div>
        <div class="bigmeter algemeen" id="totaal">Gemiddelde cijfer<br>-</div>
    </div>
    <div class="pos">
        <div class="chart-btnGroup" id="accordion">
            <button type="button" class="collapsible" id="arbeid">Arbeid</button>
            <div class="content"><br><br><br>
                <canvas id="chartArbeid"></canvas>
            </div>

            <button type="button" class="collapsible" id="sport">Sport</button>
            <div class="content"><br><br><br>
                <canvas id="chartSport"></canvas>
            </div>

            <button type="button" class="collapsible" id="slaap">Slaap</button>
            <div class="content"><br><br><br>
                <canvas id="chartSlaap"></canvas>
            </div>

            <button type="button" class="collapsible" id="eten">Eten</button>
            <div class="content"><br><br><br>
                <canvas id="chartEten"></canvas>
            </div>

            <button type="button" class="collapsible" id="drinken">Drinken</button>
            <div class="content"><br><br><br>
                <canvas id="chartDrinken"></canvas>
            </div>

            <button type="button" class="collapsible" id="drugs">Drugs</button>
            <div class="content"><br><br><br>
                <canvas id="chartDrugs"></canvas>
            </div>
        </div>
    </div>
    <!-- bottom buttons-->
    <div class="bottomcontainer">
        <div class="bottombuttongroup">
            <a class="bottombutton_active" href="#"><img class="bottomimg" src="assets/images/dashboard.png" alt="dashboard"></a>
            <a class="bottombutton" href="vragenformulier.php"><img class="bottomimg" src="assets/images/questions.png" alt="vragenformulier"></a>
            <a class="bottombutton" href="meldingen.php"><img class="bottomimg" src="assets/images/notifications.png" alt="meldingen"></a>
        </div>
    </div>
</div>
<script src="assets/javascript/dashboard.js"></script>
<script src="assets/javascript/chartjs.js"></script>
<script src="assets/javascript/berekening.js"></script>

</body>
</html>