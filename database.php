<?php

require_once "config.php";
class Database
{
    private $host, $username, $password, $dbname;
    public $sql;
    function __construct($_host, $_username, $_password, $_dbname)
    {
        $this->host = $_host;
        $this->username = $_username;
        $this->password = $_password;
        $this->dbame = $_dbname;
    }
    function connect()
    {
        $this->sql = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->sql->connect->errno ) {
            echo $this->sql->connect_error();
            exit ("Connect Error: ".$this->sql->connect_error());
        }
#        $this->sql->query("use ".$this->dbname.";");
    }
    function reconnect()
    {
        $this->disconnect();
        $this->connect();
    }
    function disconnect()
    {
         mysqli_close($this->sql);
    }
    function status()
    {
        print_r(mysqli_get_connection_stats($this->sql));
    }
    function __destruct()
    {
        $this->disconnect();
    }
}

$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db->connect();

?>
