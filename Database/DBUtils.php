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
    public function __destruct(){
        $this->connection = null;
    }
}
