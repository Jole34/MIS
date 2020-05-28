<!DOCTYPE html>

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="CSS/zajednicki.css">
    <link rel="stylesheet" type="text/css" href="CSS/overaSemestra.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Overa Semestra</title>
</head>

<body onload="checkDate()">

    <div class="sidebar">
        <a href="#Random"><img src="Images/icon1.png"> Random </a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
    </div>
    <?php
    for ($i = 0; $i < 3; $i++) { ?>
        <div class="overaSemestra-odabirIspita">
            <form action="forms.php" method="post">
                <label class="container">One
                    <input type="checkbox" name="odabir[]" value="one" checked="checked">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Two
                    <input type="checkbox" value="two" name="odabir[]">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Three
                    <input type="checkbox" value="three" name="odabir[]">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Four
                    <input type="checkbox" value="four" name="odabir[]">
                    <span class="checkmark"></span>
                </label>
        </div>
    <?php } ?>
    <div class="overaSemestra-odabirIspita1">
        <input type="submit" name="potvrda" value="Потврди">
    </div>
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
        if ((month == 5 || month == 1) && (dateC >= 1 && dateC <= 28)) {
            for (i = 0; i < divs.length; i++) {
                divs[i].style.display = "block";
            }
            divs1.style.display = "block";
        }
    }
</script>

</html>