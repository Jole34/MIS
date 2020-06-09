<?php
    session_start();
?>
<!DOCTYPE html>
<?php
    require_once("Database/Pomoc.php");
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/zajednicki.css">
    <link rel="stylesheet" type="text/css" href="CSS/ankete.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ПочетнаАсистент</title>
</head>

<body>
    <?php   Pomoc::getMeniP(); 
            Pomoc::getHeader($_SESSION["ime"], $_SESSION["prezime"], $_SESSION["uloga"]);
           
    ?>
    <div class="footer">
        <p></p>
    </div>
</body>
</html>