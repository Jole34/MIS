<!DOCTYPE html>

<head>
<meta charset="UTF-8">
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
            <img id="ankete-specImage" src="Images/ankete.png" />
            <h3>Title</h3>
        </center>
    </div>
    <?php

    for ($i = 0; $i < 4; $i++) {
    ?>
        <div class="anketa-link">
            <center>
                <img class="ankete-images" src="Images/ankete.png" />
                <h3>Title</h3>
            </center>
        </div>
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
    var img2 = document.querySelector("#ankete-specImage");
    var specDiv = document.querySelector("#anketa-linkfirstInRow");

    for (i = 0; i < div.length; i++) {
        let img1 = i;
        div[i].onmouseover = function() {
            rotating(img1)
        };
    }

    specDiv.onmouseover = function() {
        rotating2()
    };
    specDiv.onmouseleave = function() {
        derotating2()
    };

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

    function rotating2() {
        img2.setAttribute('style', 'transform:rotate(45deg)');
        img2.style.transition = "1s";
    }

    function derotating2() {
        img2.setAttribute('style', 'transform:rotate(0deg)');
        img2.style.transition = "1s";
    }
</script>

</html>