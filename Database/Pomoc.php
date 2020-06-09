<?php
require_once("DBUtils.php");
require_once("Predmet.php");
class Pomoc
{


    public static function getTable($korisnicko){
        $db = new DBUtils();
        $predmeti = $db->getPredmetiProf($korisnicko);

        echo "<table  class=\"predmeti\"><tr><th>Шифра</th><th>Назив</th><th>Студенти</th>";
        foreach($predmeti as $p){
            ?>
             <tr>
                <td><?php echo $p->getSifra(); ?></td>
                <td><?php  echo $p->getNaziv(); ?></td>
                <td><a href="<?php echo "pretraga.php?studenti=".$p->getId(); ?>"><button class="search">Тражи</button></a></td><br>
             </tr>
        
        <?php 
        }
        echo "</table>";

    }



    public static function getMeni()
    {
?>
        <div class="sidebar">
            <div id="pmfit"><img src="Images/pmf2.png" id="img2"></div>
            <a href="indexS.php"><img src="Images/icon1.png">Почетна</a>
            <a href="overaSemestra.php"><img src="Images/icon1.png">Семестри</a>
            <a href="ankete.php"><img src="Images/icon1.png">Анкете</a>
            <a href="ispiti.php"><img src="Images/icon1.png">Испити</a>
            <a href="odjava.php"><img src="Images/icon1.png">Одјава</a>
        </div>
    <?php
    }

    public static function getMeniP()
    {
?>
        <div class="sidebar">
            <div id="pmfit"><img src="Images/pmf2.png" id="img2"></div>
            <a href="indexP.php"><img src="Images/icon1.png">Почетна</a>
            <a href="pretraga.php"><img src="Images/icon1.png">Претрага курсева</a>
            <a href="odjava.php"><img src="Images/icon1.png">Одјава</a>
        </div>
    <?php
    }
    public static function getHeader($ime, $prezime, $uloga)
    {
    ?>
        <div class="licniP">
            <div class="unutrasnji"><?php echo $ime . " ";
                                    echo "</div";
                                    echo "<div class=\"unutrasnji\">";
                                    echo $prezime . " ";
                                    echo "</div>";
                                    echo "<div class=\"unutrasnji\">";
                                    echo $uloga . " "; ?>
            </div>
        </div>
    <?php
    }

    public static function getInfo()
    {
    ?>
        <div class="info">
            <h1>Поштовани студенти</h1>
            Добродошли на нови веб портал Природно-математичког факултета у Новом Саду.
            <img src="Images/zgrada.png" />
        </div>
    <?php
    }

    public static function getInfoP()
    {
    ?>
        <div class="info">
            <h1>Поштовани професори</h1>
            Добродошли на нови веб портал Природно-математичког факултета у Новом Саду.
            <img src="Images/zgrada.png" />
        </div>
    <?php
    }


    public static function getInfoSemestar()
    {
    ?>
        <div class="info3">
            <h1>Овера семестра</h1>
            Уколико је овера семестра у току можете је извршити само ако сте попунили све анкете које сте требали.
        </div>
    <?php
    }

    public static function getInfoIspiti()
    {
    ?>
        <div class="info3">
            <h1>Пријава испита</h1>
            Уколико је пријава испита у току можете је извршити, подсећамо да је пријава на нашем факултету бесплатна.
        </div>
<?php
    }

    public static function getInfoProfesor()
    {
    ?>
        <div class="info3">
            <h1>Претрага курсева</h1>
           Приказ курсева које тренутно предајете на нашем факултету. Одабире курс, прегледајте студенте који слушају тај курс.
           
        </div>
<?php
    }

    public static function checkLogin($username, $pass)
    {
        $db = new DBUtils();
        $res = $db->studentLogin($username, $pass);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    public static function checkLoginAsistent($username, $pass)
    {
        $db = new DBUtils();
        $res = $db->asistent($username, $pass);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    public static function checkLoginProfesor($username, $pass)
    {
        $db = new DBUtils();
        $res = $db->profesor($username, $pass);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }
}
?>