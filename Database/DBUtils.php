<?php
class DBUtils
{

    private $conn;
    private $salt = "dsaf7493^&$(#@Kjh";

    public function __construct($configFile = "sqlconfigFile.ini")
    {
        if ($config = parse_ini_file($configFile)) {
            $host = $config["host"];
            $database = $config["database"];
            $user = $config["user"];
            $password = $config["password"];
            $this->connection = new PDO("mysql:host=$host;dbname=$database", $user, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
    public function __destruct()
    {
        $this->connection = null;
    }


    #Predmeti
    function getPredmeti()
    {
        if (!$this->conn) return false;
        $predmeti = array();

        try {
            $sql = "select * from Predmet;";
            $result = $this->conn->query($sql);
            while ($row = $result->fetch()) {
                $sifra = $row["Sifra"];
                $naziv = $row["Naziv"];
                $asistent = $row["Asistent_KorisnickoIme"];
                $profesor = $row["Profesor_KorisnickoIme"];
                $semestar = $row["Semestar_idSemestar"];
            }
        } catch (PDOException $e) {
            return $predmeti;
        }
    }

    #Semestar
    function getSemestri()
    {
        if (!$this->conn) return false;
        $semestri = array();

        try {
            $sql = "select * from Semestar;";
            $result = $this->conn->query($sql);
            while ($row = $result->fetch()) {
                $godina = $row["Godina"];
                $naziv = $row["Naziv"];
            }
        } catch (PDOException $e) {
            return $semestri;
        }
    }

    #Student
    function getStudenti()
    {
        if (!$this->conn) return false;
        $studenti = array();

        try {
            $sql = "select * from Student;";
            $result = $this->conn->query($sql);
            while ($row = $result->fetch()) {
                $korisnik = $row["KorisnickoIme"];
                $brIndeks = $row["BrIndeks"];
                $ime = $row["Ime"];
                $prezime = $row["Prezime"];
                $lozinka = $row["Lozinka"];
                $jmbg = $row["JMBG"];
                $email = $row["Email"];
                $semestar = $row["Semestar_idSemestar"];
            }
        } catch (PDOException $e) {
            return $studenti;
        }
    }


    #Asistenti
    function getAsistenti()
    {
        if (!$this->conn) return false;
        $asistenti = array();

        try {
            $sql = "select * from Asistent;";
            $result = $this->conn->query($sql);
            while ($row = $result->fetch()) {
                $korisnik = $row["KorisnickoIme"];
                $ime = $row["Ime"];
                $prezime = $row["Prezime"];
                $lozinka = $row["Lozinka"];
                $email = $row["Email"];
            }
        } catch (PDOException $e) {
            return $asistenti;
        }
    }

    #Profesori
    function getProfesori()
    {
        if (!$this->conn) return false;
        $profesori = array();

        try {
            $sql = "select * from Profesor;";
            $result = $this->conn->query($sql);
            while ($row = $result->fetch()) {
                $korisnik = $row["KorisnickoIme"];
                $ime = $row["Ime"];
                $prezime = $row["Prezime"];
                $lozinka = $row["Lozinka"];
                $email = $row["Email"];
            }
        } catch (PDOException $e) {
            return $profesori;
        }
    }


    #Ankete
    function getAnkete()
    {
        if (!$this->conn) return false;
        $ankete = array();

        try {
            $sql = "select * from Anketa;";
            $result = $this->conn->query($sql);
            while ($row = $result->fetch()) {
                $id = $row["idAnketa"];
                $naziv = $row["Naziv"];
                $rez = $row["RezultatAnkete"];
                $pop = $row["PopunjenaAnketa"];
                $semestar = $row["Semestar_idSemestar"];
            }
        } catch (PDOException $e) {
            return $ankete;
        }
    }


    #Slusanje
    function getSlusanje()
    {
        if (!$this->conn) return false;
        $slusanje = array();

        try {
            $sql = "select * from SlusanjePredmeta;";
            $result = $this->conn->query($sql);
            while ($row = $result->fetch()) {
                $id = $row["idSlusanjePredmeta"];
                $student = $row["Student_KorisnickoIme"];
                $premdet = $row["Predmet_idIspit"];
            }
        } catch (PDOException $e) {
            return $slusanje;
        }
    }
}
