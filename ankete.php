<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="CSS/zajednicki.css">
    <link rel="stylesheet" type="text/css" href="CSS/ankete.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ankete</title>
</head>

<body>

    <div class="sidebar">
        <a href="#Random"><img src="Images/icon1.png"> Random </a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
        <a href="#Random"><img src="Images/icon1.png"> Random</a>
    </div>
    <div id="anketa-linkfirstInRow">
        <center>
            <img src="Images/ankete.png" />
        </center>
    </div>
    <?php

    for ($i = 0; $i < 4; $i++) {
    ?>
        <div class="anketa-link">
            <center>
                <img src="Images/ankete.png" />
            </center>
        </div>
    <?php
    }
    ?>
    <div class="footer">
        <p></p>
    </div>
</body>

</html>