<?php
if (isset($_POST["odabir"]) && is_array($_POST["odabir"])){
    $fp = fopen('pomocni.txt', 'w');
    fwrite($fp, "1");
    foreach($_POST['odabir'] as $predmet){
        fwrite($fp, "\n$predmet");
    }


    fclose($fp);
}
header('Location: ispiti.php');
die();
?>