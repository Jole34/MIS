<?php
    session_start();
?>
<!DOCTYPE html>
<?php
    require_once("Database/Pomoc.php");
    require_once("Database/DBUtils.php");
    require_once("Database/Student.php");
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/zajednicki.css">
    <link rel="stylesheet" type="text/css" href="CSS/ankete.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ПретрагаКурсева</title>
</head>

<body>
    <?php   Pomoc::getMeniP(); 
            Pomoc::getHeader($_SESSION["ime"], $_SESSION["prezime"], $_SESSION["uloga"]);
            Pomoc::getInfoProfesor();
            Pomoc::getTable($_SESSION["korisnicko"]);

            $db = new DBUtils();
            $studenti = array();

            if(isset($_GET["studenti"])){
               $imena = $db->getSlusanjePredmet($_GET["studenti"]);
               for ($i=0; $i<count($imena); $i++){
                    $student = $db->studentKorisnicko($imena[$i]);
                    $studenti[] = $student;
               }

               echo "<div class=\"rezS\">";
               foreach($studenti as $st){
                    echo "Име: ".$st->getIme();
                    echo $st->getPrezime()."<br>";
                    echo "Број индекса: ".$st->getBrIndeks()."<br>";
                    echo "Емаил: ".$st->getEmail()."<br>";
                    echo "Јмбг: ".$st->getJmbg();
               }
            }
    ?>
    
    
    <div class="footer">
        <p></p>
    </div>
</body>
</html>