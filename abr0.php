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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="CSS/zajednicki.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Анкета</title>
</head>

<body onload="checkDate()">


    <?php Pomoc::getMeni();
    Pomoc::getHeader($_SESSION["ime"], $_SESSION["prezime"], $_SESSION["uloga"]);

    $predmetiK1 = $db->getPredmetiZaStudenta($_SESSION["korisnicko"]);

    $predmetiL = array();
    $asistenti = array();
    $predmeti = array();

    for ($i = 0; $i < count($predmetiK1); $i++) {
        $p = $db->getPredmetiKljuc($predmetiK1[$i]);
        $predmetiL[] = $p->getSifra() . " " . $p->getNaziv();
        $predmeti[] = $p->getProfesorId();
        $asistenti[] = $p->getAsistentId();
    }



    $profesori = array();
    $asis = array();


    for ($i = 0; $i < count($predmeti); $i++) {
        $p = $db->getProfesorKljuc($predmeti[$i]);
        $profesori[] = $p->getIme() . " " . $p->getPrezime();
        $a = $db->getAsistentKljuc($asistenti[$i]);
        $asis[] = $a->getIme() . " " . $a->getPrezime();
    }



    $profesori = array_unique($profesori);
    $asis = array_unique($asis);
    $niz = array();


    $ime = "";
    $odabir = "";
    $forma = "";
    $formam = "";
    $vp = "";
    $vp2 = "";
    $popunjena = true;

    if (isset($_GET["anketa"])) {
        $ime = $_GET["anketa"];
    }
    switch ($ime) {
        case "Анкета за професора":
            $odabir = "професора";
            $forma = "професор";
            $formam = "професору";
            $vp = "предавања";
            $vp2 = "предавањима";
            $niz = $profesori;
            break;
        case "Анкета за асистента":
            $odabir = "асистента";
            $forma = "асистент";
            $formam = "асистенту";
            $vp = "вежбе";
            $vp2 = "вежбама";
            $niz = $asis;

            break;
        case "Анкета за предмет":
            $odabir = "предмет";
            $formam = "предмету";
            $niz = $predmetiL;
            break;
        case "Анкета за раднике":
            $odabir = "радник";
            $popunjena = false;
            break;
        case "Анкета за факултет":
            $odabir = "факултет";
            $popunjena = false;
            break;
        default:
            break;
    }
   if (!isset($_SESSION["odredjeni"])){
    $_SESSION["odredjeni"] = array();
    }
    if (isset($_POST["odabir"])) {
        $_SESSION["odredjeni"] [] =  $_POST["odabir"];
    }

    if (isset($_SESSION["odredjeni"])) {
    for ($i = 0; $i <count($niz); $i++) {
        foreach ($_SESSION["odredjeni"]  as $o) {
            if ($niz[$i] == $o) {
                unset($niz[$i]);
                $niz = array_values($niz);
            }
        }
    }
}
if ($popunjena) {
    if (count($niz) == 0){
      $db->updateAnketa($ime);
       header("Location: ankete.php");
    }
} else {
    if (isset($_POST["potvrda"])){
        $db->updateAnketa($ime);
       header("Location: ankete.php");
    }
}
    ?>
    <form action="" method="post">
        <?php
        if ($odabir != "радник" && $odabir != "факултет") {
        ?>
            <p class="odap">Одаберите <?php echo $odabir; ?>: </p>
            <select name="odabir" class="odabirProfesora">
                <?php foreach ($niz as $p) {
                    echo "<option>" . $p . "</option>";
                }
                ?>
            </select>
        <?php } ?>
        <div class="formsA">
            <?php
            if ($odabir != "предмет" && $odabir != "радник" && $odabir != "факултет") {
            ?>
                <div class="anketa">
                    <h4><span class="dot"></span>Да ли је <?php echo $forma; ?> редован на <?php echo $vp2; ?>?</h4>
                    <input type="checkbox" class="check" name="prof2" value="Да" checked>
                    <label for="prof1">Да</label><br>
                    <input type="checkbox" class="check" name="prof3" value="Често">
                    <label for="prof2">Често</label><br>
                    <input type="checkbox" class="check" name="prof4" value="Не">
                    <label for="prof3">Ретко</label><br>
                    <input type="checkbox" class="check" name="prof4" value="Не">
                    <label for="prof4">Не</label><br>
                </div>
                <div class="anketa">
                    <h4><span class="dot"></span>Да ли <?php echo $forma; ?> држи консултације?</h4>
                    <input type="checkbox" class="check2" name="prof22" value="Да" checked>
                    <label for="prof11">Да</label><br>
                    <input type="checkbox" class="check2" name="prof33" value="Често">
                    <label for="prof22">Често</label><br>
                    <input type="checkbox" class="check2" name="prof44" value="Не">
                    <label for="prof33">Ретко</label><br>
                    <input type="checkbox" class="check2" name="prof44" value="Не">
                    <label for="prof44">Не</label><br>
                </div>
                <div class="anketa">
                    <h4><span class="dot"></span>Да ли је добијате сву потребну литературу?</h4>
                    <input type="checkbox" class="check3" name="prof22" value="Да" checked>
                    <label for="prof11">Да</label><br>
                    <input type="checkbox" class="check3" name="prof33" value="Често">
                    <label for="prof22">Често</label><br>
                    <input type="checkbox" class="check3" name="prof44" value="Не">
                    <label for="prof33">Ретко</label><br>
                    <input type="checkbox" class="check3" name="prof44" value="Не">
                    <label for="prof44">Не</label><br>
                </div>
                <div class="anketa">
                    <h4><span class="dot"></span>Колико често посећујете <?php echo $vp; ?>?</h4>
                    <input type="checkbox" class="check4" name="prof22" value="Да" checked>
                    <label for="prof11">Увек</label><br>
                    <input type="checkbox" class="check4" name="prof33" value="Често">
                    <label for="prof22">Често</label><br>
                    <input type="checkbox" class="check4" name="prof44" value="Не">
                    <label for="prof33">Ретко</label><br>
                    <input type="checkbox" class="check4" name="prof44" value="Не">
                    <label for="prof44">Никад</label><br>
                </div>
                <div class="anketa">
                    <h4><span class="dot"></span>Мишљење о <?php echo $formam; ?>:</h4>
                    <input type="text" class="text">
                </div>
                <div class="anketa">
                    <h4><span class="dot"></span>Оцените рад <?php echo $odabir; ?>:</h4>
                    <input type="number" id="quantity" name="quantity" min="1" max="10" value="10">
                </div>
        </div>
        <?php
            } else {
                if ($odabir == "предмет") {
        ?>
            <div class="anketa">
                <h4><span class="dot"></span>Да ли је предмет добро организован?</h4>
                <input type="checkbox" class="check" name="prof2" value="Да" checked>
                <label for="prof1">Да</label><br>
                <input type="checkbox" class="check" name="prof4" value="Не">
                <label for="prof4">Не</label><br>
                <input type="checkbox" class="check" name="prof5" value="Делимично">
                <label for="prof5">Делимично</label><br>
                <input type="checkbox" class="check" name="prof6" value="Никако">
                <label for="prof6">Никако</label><br>

            </div>
            <div class="anketa">
                <h4><span class="dot"></span>Да ли имате сву потребну литературу за предмет?</h4>
                <input type="checkbox" class="check2" name="prof22" value="Да" checked>
                <label for="prof11">Да</label><br>
                <input type="checkbox" class="check2" name="prof33" value="Често">
                <label for="prof22">Често</label><br>
                <input type="checkbox" class="check2" name="prof44" value="Не">
                <label for="prof33">Ретко</label><br>
                <input type="checkbox" class="check2" name="prof44" value="Не">
                <label for="prof44">Не</label><br>
            </div>
            <div class="anketa">
                <h4><span class="dot"></span>Мишљење о <?php echo $formam; ?>:</h4>
                <input type="text" class="text">
            </div>
            <div class="anketa">
                <h4><span class="dot"></span>Оцените рад предмета:</h4>
                <input type="number" id="quantity" name="quantity" min="1" max="10" value="10">
            </div>
            </div>
        <?php
                }
                if ($odabir == "радник") {

        ?>
            <div class="anketa">
                <h4><span class="dot"></span>Да ли је радници факултета добро организовани?</h4>
                <input type="checkbox" class="check" name="prof2" value="Да" checked>
                <label for="prof1">Да</label><br>
                <input type="checkbox" class="check" name="prof4" value="Не">
                <label for="prof4">Не</label><br>
                <input type="checkbox" class="check" name="prof5" value="Делимично">
                <label for="prof5">Делимично</label><br>
                <input type="checkbox" class="check" name="prof6" value="Никако">
                <label for="prof6">Никако</label><br>

            </div>
            <div class="anketa">
                <h4><span class="dot"></span>Да ли имате сву потребну помоћ?</h4>
                <input type="checkbox" class="check2" name="prof22" value="Да" checked>
                <label for="prof11">Да</label><br>
                <input type="checkbox" class="check2" name="prof33" value="Често">
                <label for="prof22">Често</label><br>
                <input type="checkbox" class="check2" name="prof44" value="Не">
                <label for="prof33">Ретко</label><br>
                <input type="checkbox" class="check2" name="prof44" value="Не">
                <label for="prof44">Не</label><br>
            </div>
            <div class="anketa">
                <h4><span class="dot"></span>Мишљење о радницима факултета:</h4>
                <input type="text" class="text">
            </div>
            <div class="anketa">
                <h4><span class="dot"></span>Оцените рад запослених:</h4>
                <input type="number" id="quantity" name="quantity" min="1" max="10" value="10">
            </div>
            </div>
        <?php
                }
                if ($odabir == "факултет") { ?>
            <div class="anketa">
                <h4><span class="dot"></span>Да ли је факултет добро организован?</h4>
                <input type="checkbox" class="check" name="prof2" value="Да" checked>
                <label for="prof1">Да</label><br>
                <input type="checkbox" class="check" name="prof4" value="Не">
                <label for="prof4">Не</label><br>
                <input type="checkbox" class="check" name="prof5" value="Делимично">
                <label for="prof5">Делимично</label><br>
                <input type="checkbox" class="check" name="prof6" value="Никако">
                <label for="prof6">Никако</label><br>

            </div>
            <div class="anketa">
                <h4><span class="dot"></span>Да ли имате сву потребну помоћ?</h4>
                <input type="checkbox" class="check2" name="prof22" value="Да" checked>
                <label for="prof11">Да</label><br>
                <input type="checkbox" class="check2" name="prof33" value="Често">
                <label for="prof22">Често</label><br>
                <input type="checkbox" class="check2" name="prof44" value="Не">
                <label for="prof33">Ретко</label><br>
                <input type="checkbox" class="check2" name="prof44" value="Не">
                <label for="prof44">Не</label><br>
            </div>
            <div class="anketa">
                <h4><span class="dot"></span>Мишљење факултету:</h4>
                <input type="text" class="text">
            </div>
            <div class="anketa">
                <h4><span class="dot"></span>Оцените факултет:</h4>
                <input type="number" id="quantity" name="quantity" min="1" max="10" value="10">
            </div>
            </div>

    <?php }
            } ?>

    <div id="margine">
        <input class="odabir" type="submit" name="potvrda" value="Потврди">
    </div>
    </form>
    <div class="footer">
        <p></p>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('.check').click(function() {
            $('.check').not(this).prop('checked', false);
        });
    });
    $(document).ready(function() {
        $('.check2').click(function() {
            $('.check2').not(this).prop('checked', false);
        });
    });
    $(document).ready(function() {
        $('.check3').click(function() {
            $('.check3').not(this).prop('checked', false);
        });
    });
    $(document).ready(function() {
        $('.check4').click(function() {
            $('.check4').not(this).prop('checked', false);
        });
    });
</script>

</html>