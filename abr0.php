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

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Анкета</title>
</head>

<body onload="checkDate()">

    <?php Pomoc::getMeni();
    Pomoc::getHeader($_SESSION["ime"], $_SESSION["prezime"], $_SESSION["uloga"]);
    ?>
    <div class="formsA">
        <div class="anketa">
            <h4><span class="dot"></span>Да ли је професор редован на предавањима?</h4>
            <input type="checkbox" id="prof1" name="prof2" value="Да">
            <label for="prof1">Да</label><br>
            <input type="checkbox" id="prof2" name="prof3" value="Често">
            <label for="prof2">Често</label><br>
            <input type="checkbox" id="prof3" name="prof4" value="Не">
            <label for="prof3">Ретко</label><br>
            <input type="checkbox" id="prof4" name="prof4" value="Не">
            <label for="prof4">Не</label><br>
        </div>
        <div class="anketa">
            <h4><span class="dot"></span>Да ли професор држи консултације?</h4>
            <input type="checkbox" id="prof1" name="prof22" value="Да">
            <label for="prof11">Да</label><br>
            <input type="checkbox" id="prof2" name="prof33" value="Често">
            <label for="prof22">Често</label><br>
            <input type="checkbox" id="prof3" name="prof44" value="Не">
            <label for="prof33">Ретко</label><br>
            <input type="checkbox" id="prof4" name="prof44" value="Не">
            <label for="prof44">Не</label><br>
        </div>
        <div class="anketa">
            <h4><span class="dot"></span>Да ли је добијате сву потребну литературу?</h4>
            <input type="checkbox" id="prof1" name="prof22" value="Да">
            <label for="prof11">Да</label><br>
            <input type="checkbox" id="prof2" name="prof33" value="Често">
            <label for="prof22">Често</label><br>
            <input type="checkbox" id="prof3" name="prof44" value="Не">
            <label for="prof33">Ретко</label><br>
            <input type="checkbox" id="prof4" name="prof44" value="Не">
            <label for="prof44">Не</label><br>
        </div>
        <div class="anketa">
            <h4><span class="dot"></span>Колико често посећујете предавања?</h4>
            <input type="checkbox" id="prof1" name="prof22" value="Да">
            <label for="prof11">Увек</label><br>
            <input type="checkbox" id="prof2" name="prof33" value="Често">
            <label for="prof22">Често</label><br>
            <input type="checkbox" id="prof3" name="prof44" value="Не">
            <label for="prof33">Ретко</label><br>
            <input type="checkbox" id="prof4" name="prof44" value="Не">
            <label for="prof44">Никад</label><br>
        </div>
        <div class="anketa">
            <h4><span class="dot"></span>Мишљење о професору:</h4>
            <input type="text" class="text">
        </div>
        <div class="anketa">
            <h4><span class="dot"></span>Оцените рад професора:</h4>
            <input type="number" id="quantity" name="quantity" min="1" max="10" value="10">
    </div>
    <div >
        <input class="odabir" type="submit" name="potvrda" value="Потврди">
    </div>
    <div class="footer">
        <p></p>
    </div>
</body>

</html>