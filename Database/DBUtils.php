<?php

require_once("Predmet.php");
require_once("Student.php");
require_once("Asistent.php");
require_once("Profesor.php");
require_once("SlusanjePredmeta.php");
class DBUtils
{

    private $conn;
    private $salt = "dsaf7493^&$(#@Kjh";

    public function __construct($configFile = "sqlconfigFIle.ini")
    {
        if ($config = parse_ini_file($configFile)) {
            $host = $config["host"];
            $database = $config["database"];
            $user = $config["user"];
            $password = $config["password"];
            $this->conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
    public function __destruct()
    {
        $this->conn = null;
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
                $p = new Predmet($sifra, $naziv, $asistent, $profesor, $semestar);
                $predmeti[] = $p;
            }
            return $predmeti;
        } catch (PDOException $e) {
            return $predmeti;
        }
    }

    function getPredmetiProf($korisnicko){
        if (!$this->conn) return false;
        $predmeti = array();
        try{
            $sql = "select * from Predmet where Profesor_KorisnickoIme = :korisnicko;";
            $result = $this->conn->prepare($sql);
            $result->bindValue("korisnicko", $korisnicko);
            $result->execute();
            while ($row = $result->fetch()) {
                $sifra = $row["Sifra"];
                $naziv = $row["Naziv"];
                $asistent = $row["Asistent_KorisnickoIme"];
                $profesor = $row["Profesor_KorisnickoIme"];
                $semestar = $row["Semestar_idSemestar"];
                $p = new Predmet($sifra, $naziv, $asistent, $profesor, $semestar, $row["idIspit"]);
                $predmeti[] = $p;
            }
            return $predmeti;
        } catch(PDOException $e){
            return false;
        }


    }

    function getSlusanjePredmet($id){
        if (!$this->conn) return false;
        $imena = array();
        try {
            $sql = "select Student_KorisnickoIme from SlusanjePredmeta where Predmet_idIspit = :id;";
            $result = $this->conn->prepare($sql);
            settype($id, "int");
            $result->bindValue("id", $id);
            $result->execute();
             while ($row = $result->fetch()) {
                    $imena[]= $row["Student_KorisnickoIme"];
             }
             return $imena;
             }catch (PDOException $e) {
            return false;
        }
    }

    #Svi predmeti koje slusa korisnik
    function getPredmetiZaStudenta($korisnicko)
    {
        if (!$this->conn) return false;
        $predmeti = array();

        try {
            $sql = "select Predmet_idIspit from SlusanjePredmeta where Student_KorisnickoIme = :korisnicko;";
            $result = $this->conn->prepare($sql);
            $result->bindValue("korisnicko", $korisnicko);
            $result->execute();
            while ($row = $result->fetch()) {
                $p = $row["Predmet_idIspit"];
                $predmeti[] = $p;
            }
            return $predmeti;
        } catch (PDOException $e) {
            return $predmeti;
        }
    }

        
    function getPredmetiKljuc($kljuc)
    {
        if (!$this->conn) return false;

        try {
            settype($kljuc1, 'int');
            $sql = "select * from Predmet where idIspit = :kljuc;";
            $result = $this->conn->prepare($sql);
            $result->bindValue("kljuc", $kljuc);
            $result->execute();
            $row = $result->fetch();
               $sifra = $row["Sifra"];
                $naziv = $row["Naziv"];
                $asistent = $row["Asistent_KorisnickoIme"];
                $profesor = $row["Profesor_KorisnickoIme"];
                $semestar = $row["Semestar_idSemestar"];
                $p = new Predmet($sifra, $naziv, $asistent, $profesor, $semestar);
                return $p;
        } catch (PDOException $e) {
            return false;
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
                $studenti[] = new Student($korisnik, $brIndeks, $ime, $prezime, $lozinka, $jmbg, $email, $semestar);
            }
            return $studenti;
        } catch (PDOException $e) {
            return $studenti;
        }
    }

    public function studentLogin($username, $pass){
        if (!$this->conn) return false;
        try{
            $sql = "select * from Student where KorisnickoIme = :username and Lozinka = :pass;";
            $result = $this->conn->prepare($sql);
            $result->bindValue("username", $username);
            $result->bindValue("pass", $pass);
            $result->execute();
            $row = $result->fetch();

            if ($row){
            $korisnik = $row["KorisnickoIme"];
            $brIndeks = $row["BrIndeks"];
            $ime = $row["Ime"];
            $prezime = $row["Prezime"];
            $lozinka = $row["Lozinka"];
            $jmbg = $row["JMBG"];
            $email = $row["Email"];
            $semestar = $row["Semestar_idSemestar"];
            return new Student($korisnik, $brIndeks, $ime, $prezime, $lozinka, $jmbg, $email, $semestar);
            }else {
                return false;
            }
        } catch(PDOException $e){
            return false;
        }
    }

    public function studentKorisnicko($username){
        if (!$this->conn) return false;
        try{
            $sql = "select * from Student where KorisnickoIme = :username;";
            $result = $this->conn->prepare($sql);
            $result->bindValue("username", $username);
            $result->execute();
            $row = $result->fetch();

            if ($row){
            $korisnik = $row["KorisnickoIme"];
            $brIndeks = $row["BrIndeks"];
            $ime = $row["Ime"];
            $prezime = $row["Prezime"];
            $lozinka = $row["Lozinka"];
            $jmbg = $row["JMBG"];
            $email = $row["Email"];
            $semestar = $row["Semestar_idSemestar"];
            return new Student($korisnik, $brIndeks, $ime, $prezime, $lozinka, $jmbg, $email, $semestar);
            }else {
                return false;
            }
        } catch(PDOException $e){
            return false;
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
                $asistenti[] = new Asistent($korisnik, $ime, $prezime, $lozinka,$email);
            }
        } catch (PDOException $e) {
            return $asistenti;
        }
    }

    public function asistent($username, $pass){
        if (!$this->conn) return false;
        try{
            $sql = "select * from Asistent where KorisnickoIme = :username and Lozinka = :pass;";
            $result = $this->conn->prepare($sql);
            $result->bindValue("username", $username);
            $result->bindValue("pass", $pass);
            $result->execute();
            $row = $result->fetch();

            if ($row){
                $korisnik = $row["KorisnickoIme"];
                $ime = $row["Ime"];
                $prezime = $row["Prezime"];
                $lozinka = $row["Lozinka"];
                $email = $row["Email"];
            return new Asistent($korisnik, $ime, $prezime, $lozinka,$email);
            }else {
                return false;
            }
        } catch(PDOException $e){
            return false;
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
                $profesori[] =  new Profesor($korisnik, $ime, $prezime, $lozinka,$email);
            }
        } catch (PDOException $e) {
            return $profesori;
        }
    }

    public function profesor($username, $pass){
        if (!$this->conn) return false;
        try{
            $sql = "select * from Profesor where KorisnickoIme = :username and Lozinka = :pass;";
            $result = $this->conn->prepare($sql);
            $result->bindValue("username", $username);
            $result->bindValue("pass", $pass);
            $result->execute();
            $row = $result->fetch();

            if ($row){
                $korisnik = $row["KorisnickoIme"];
                $ime = $row["Ime"];
                $prezime = $row["Prezime"];
                $lozinka = $row["Lozinka"];
                $email = $row["Email"];
            return new Profesor($korisnik, $ime, $prezime, $lozinka,$email);
            }else {
                return false;
            }
        } catch(PDOException $e){
            return false;
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
                $ankete[]= new Anketa($id, $naziv, $rez, $pop, $semestar);
            }
            return $ankete;
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
