<?php
session_start();

require_once("Database/DBUtils.php");
require_once("Database/Student.php");
require_once("Database/Asistent.php");
require_once("Database/Profesor.php");
require_once("Database/Pomoc.php");

if (isset($_POST["login"]) && isset($_POST["loginP"])){
        if ($pm = Pomoc::checkLogin($_POST["login"],$_POST["loginP"])){
            $_SESSION['ime'] = $pm->getIme();
            $_SESSION['prezime'] = $pm->getPrezime();
            $_SESSION['uloga'] = 'Студент';
            $_SESSION['korisnicko'] = $pm->getKorisicko();
            header("Location: indexS.php?");
         }
        else if ($pm = Pomoc::checkLoginAsistent($_POST["login"],$_POST["loginP"])){
            if (!isset($_SESSION["ime"]) && !isset($_SESSION["prezime"]) && !isset($_SESSION["uloga"])){
                $_SESSION['ime'] = $pm->getIme();
                $_SESSION['prezime'] = $pm->getPrezime();
                $_SESSION['uloga'] = 'Асистент';
                header("Location: indexA.php?");
            }
        }
        else if ($pm = Pomoc::checkLoginProfesor($_POST["login"],$_POST["loginP"])){
            if (!isset($_SESSION["ime"]) && !isset($_SESSION["prezime"]) && !isset($_SESSION["uloga"])){
                $_SESSION['ime'] = $pm->getIme();
                $_SESSION['prezime'] = $pm->getPrezime();
                $_SESSION['uloga'] = 'Професор';
                $_SESSION['korisnicko'] = $pm->getKorisicko();
                header("Location: indexP.php?");
            }
        } else {
        ?>
        <script>
            window.alert("Неисправан унос!");
            exit();
        </script>
    <?php
    }
}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="CSS/csslogin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="PMF images">
        <img src="Images/pmf2.png" id="img1">
    </div>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <h2 class="active">Страница за пријављивање </h2>

            <form  method="post"> 
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Корисничко име">
                <input type="password" id="password" class="fadeIn third" name="loginP" placeholder="Лозинка">
                <input type="submit" class="fadeIn fourth" value="Улогуј се">
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="#">Заборавили сте лозинку?</a>
            </div>

        </div>
    </div>
</body>

</html>