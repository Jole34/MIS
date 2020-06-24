<?php
session_start();
?>
<!DOCTYPE html>
<?php
require_once("Database/Pomoc.php");
require_once("Database/DBUtils.php");
require_once("Database/Predmet.php");
$db = new DBUtils();

?>

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="CSS/zajednicki.css">
    <link rel="stylesheet" type="text/css" href="CSS/overaSemestra.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oвера</title>
</head>

<body onload="checkDate()">

    <?php Pomoc::getMeni();
    Pomoc::getHeader($_SESSION["ime"], $_SESSION["prezime"], $_SESSION["uloga"]);

    ?>
    <?php

    if (isset($_POST["potvrda"])) {
        $number = 0;
    }
    $fp = fopen('pomoc2.txt', 'r');
    $number = fgets($fp);

    if ($number == 1) {
        Pomoc::getInfoSemestar2();
    } else {
        Pomoc::getInfoSemestar();
    }

    if (isset($_POST["potvrda"])) {
        $fp = fopen('pomoc2.txt', 'w');
        fwrite($fp, "1");
        foreach ($_POST['odabir'] as $predmet) {
            fwrite($fp, "\n$predmet");
        }


        fclose($fp);
    }
    $predmetiK = $db->getPredmetiZaStudenta($_SESSION["korisnicko"]);
    $predmeti = array();
    for ($i = 0; $i < count($predmetiK); $i++) {
        $p = $db->getPredmetiKljuc($predmetiK[$i]);
        $predmeti[] = $p;
    }
    $boja = "orange";
    echo  " <div class=\"overaSemestra-odabirIspita\">";
    foreach ($predmeti as $p) {
        if ($p->getSemestarId() == 1) continue;
    ?>
        <form action="overaSemestra.php?potvrda" method="post">
            <label class="container"><?php echo $p->getSifra(); ?>
                <div style="display: inline-block;" class="overaSemestra-sifra"><?php echo $p->getNaziv(); ?></div>
                <div style="display: inline-block;" class="overaSemestra-profesor"></div>
                <input type="checkbox" name="odabir[]" checked onclick="return false" value="one">
                <span class="checkmark"></span>
                <div class="overaSemestra-potpis" style="background-color: <?php echo $boja; ?>;"><img></div>
            </label>
        <?php
    }
    echo "</div>";
        ?>
        <?php

        $pp = true;
        $niz = $db->getAnkete();

        if (!isset($POST["anketeP"])) {
            $_POST["anketeP"] = array();
        }

        for ($i = 0; $i <count($niz); $i++) {
            if ($niz[$i]->getSemestar() == 1) continue;
            $_POST["anketeP"][] = $niz[$i]->getPopunjena();
        }

        foreach ($_POST["anketeP"] as $an) {
            if ($an == 1) $pp = false;
        }
        if ($pp && $number == 0) {
        ?>
            <div class="overaSemestra-odabirIspita1">
                <input type="submit" name="potvrda" value="Потврди">
            </div>

        <?php
        }

        ?>

        </form>
        <div class="footer">
            <p></p>
        </div>
</body>
<script>
    var date = new Date();
    var divs = document.querySelectorAll(".overaSemestra-odabirIspita");
    var divs1 = document.querySelector(".overaSemestra-odabirIspita1");


    var dateC = date.getDate();
    var month = date.getMonth() + 1;

    function checkDate() {
        if ((month == 6 || month == 1) && (dateC >= 1 && dateC <= 31)) {
            for (i = 0; i < divs.length; i++) {
                divs[i].style.display = "block";
            }
            divs1.style.display = "block";
        }
    }
</script>

</html>