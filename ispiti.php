<?php
session_start();
?>
<!DOCTYPE html>
<?php
require_once("Database/Pomoc.php");
require_once("Database/DBUtils.php");
require_once("Database/Kurs.php");
$db = new DBUtils();

?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/zajednicki.css">
    <link rel="stylesheet" type="text/css" href="CSS/overaSemestra.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ПријаваИспита</title>
</head>

<body onload="checkDate()">

    <?php Pomoc::getMeni();
    Pomoc::getHeader($_SESSION["ime"], $_SESSION["prezime"], $_SESSION["uloga"]);

    ?>
    <?php
    $fp = fopen('pomocni.txt', 'r');
    $number = fgets($fp);


    $predmetiK = $db->getPredmetiZaStudenta($_SESSION["korisnicko"]);
    $predmeti = array();
    for ($i = 0; $i < count($predmetiK); $i++) {
        $p = $db->getPredmetiKljuc($predmetiK[$i]);
        $predmeti[] = $p;
    }
    $boja = "orange";

    if (trim($number, "\n") == "0") {
        Pomoc::getInfoIspiti();
        echo  " <div class=\"overaSemestra-odabirIspita\">";
        foreach ($predmeti as $p) {
    ?>
            <form action="forms.php" method="post">
                <label class="container"><?php echo $p->getSifra(); ?>
                    <div style="display: inline-block;" class="overaSemestra-sifra"><?php echo $p->getNaziv(); ?></div>
                    <div style="display: inline-block;" class="overaSemestra-profesor"></div>
                    <input type="checkbox"  name="odabir[]" value="<?php echo $p->getSifra(); ?>">
                    <span class="checkmark"></span>
                    <div class="overaSemestra-potpis" style="background-color: <?php echo $boja; ?>;"><img></div>
                </label>
            <?php
        }
        echo "</div>";
        fclose($fp);
            ?>

            <div class="overaSemestra-odabirIspita1">
                <input type="submit" name="potvrda" value="Потврди пријаву">
            </div>
            </form>
            <?php
        } else {
            Pomoc::getInfoSemestarOveren();
            $predmetiK2 = array();
            while (!feof($fp)) {
                $predmetiK2[] =  trim(fgets($fp), "\n");
            }

            fclose($fp);
            $predmeti2 = array();
            for ($i = 0; $i < count($predmetiK2); $i++) {
                $p = $db->getPredmetiSifra($predmetiK2[$i]);
                $predmeti2[] = $p;
            }
            $boja = "orange";

            echo  " <div class=\"overaSemestra-odabirIspita\">";


            foreach ($predmeti2 as $p) {
            ?>
                <form action="forms.php" method="post">
                    <label class="container"><?php echo $p->getSifra(); ?>
                        <div style="display: inline-block;" class="overaSemestra-sifra"><?php echo $p->getNaziv(); ?></div>
                        <div style="display: inline-block;" class="overaSemestra-profesor"></div>
                        <input type="checkbox" name="odabir[]" onclick ="return false" value="<?php echo $p->getSifra(); ?>" checked>
                        <span class="checkmark"></span>
                        <div class="overaSemestra-potpis" style="background-color: <?php echo $boja; ?>;"><img></div>
                    </label>
                    <?php
                }
                echo "</div>";
                $br = count($predmeti);
               
                foreach ($predmeti as $p) {
                    foreach ($predmeti2 as $p2) {
                        if ($p->getSifra() == $p2->getSifra())
                        $br--;
                    }
                }
                
                if ($br == 0) {

                } else {
                    echo  " <div class=\"overaSemestra-odabirIspita\">";
                    foreach ($predmeti as $p) {
                        foreach ($predmeti2 as $p2) {
                            if ($p->getSifra() == $p2->getSifra()) continue 2;
                        }
                    ?>
                        <form action="forms.php" method="post">
                            <label class="container"><?php echo $p->getSifra(); ?>
                                <div style="display: inline-block;" class="overaSemestra-sifra"><?php echo $p->getNaziv(); ?></div>
                                <div style="display: inline-block;" class="overaSemestra-profesor"></div>
                                <input type="checkbox" name="odabir[]" value="<?php echo $p->getSifra(); ?>">
                                <span class="checkmark"></span>
                                <div class="overaSemestra-potpis" style="background-color: <?php echo $boja; ?>;"><img></div>
                            </label>
                <?php
                    }
                
    
                    echo "</div>";

                ?>
                <div class="overaSemestra-odabirIspita1">
                    <input type="submit" name="potvrda" value="Потврди пријаву">
                </div>
        <?php } 
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