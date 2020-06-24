<?php
session_start();
require_once("Database/DBUtils.php");
require_once("Database/Anketa.php");

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
    <title>Анкете</title>
</head>

<body>
    <?php   Pomoc::getMeni(); 
    Pomoc::getHeader($_SESSION["ime"], $_SESSION["prezime"], $_SESSION["uloga"]);
    ?>
    <?php $stringPopunjena = "Анкета је уредно попуњена";
    $stringNePopunjena = "Анкета још није попуњена";
    $boja = "#3CB371";
    #Ako je popunjena s1 ako ne s2 if itd
     ?>
    <?php
    $db = new DBUtils();
    $niz = $db->getAnkete();
    $an = "abr";
    
    if (!isset($_SESSION["anketeP"])){
        $_SESSION["anketeP"] = array();
    }
    
    for ($i = 0; $i <count($niz); $i++) {
        if ($niz[$i]->getSemestar() == 1 ) continue;
    ?>
    <?php
     $_SESSION["anketeP"][] = $niz[$i]->getPopunjena();
          if ($niz[$i]->getPopunjena() == 1 ) {
              ?>
        <a href="abr0.php?<?php echo "anketa=".$niz[$i]->getNaziv(); ?>"><div class="anketa-link">
         <?php }
                else {
            echo  "<a href=\"\"><div class=\"anketa-link\">";
  
                }
         ?>


            <center>

                <img class="ankete-images" src="Images/ankete.png" />
                <h3><?php echo $niz[$i]->getNaziv();?></h3>
                <?php
                if ($niz[$i]->getPopunjena() == 1 ) {
                 print $stringNePopunjena;
                 $boja = "white";
                }
                 else {
                    print $stringPopunjena;
                    $boja = "#00018";
                }
                ?>
                <div class="anketa-link-verifikacija" style="background-color: <?php echo $boja; ?>;"><img></div>
            </center>
        </div><a>
    <?php
    }
    ?>
    <div class="footer">
        <p></p>
    </div>
</body>
<script>
    var div = document.querySelectorAll(".anketa-link");
    var img = document.querySelectorAll(".ankete-images");

    for (i = 0; i < div.length; i++) {
        let img1 = i;
        div[i].onmouseover = function() {
            rotating(img1)
        };
    }

    for (i = 0; i < div.length; i++) {
        div[i].onmouseleave = function() {
            derotating()
        };
    }

    function rotating(img1) {
        img[img1].setAttribute('style', 'transform:rotate(45deg)');
        img[img1].style.transition = "1s";
    }

    function derotating() {
        for (i = 0; i < div.length; i++) {
            img[i].setAttribute('style', 'transform:rotate(0deg)');
            img[i].transition = "1s";
        }
    }
</script>

</html>