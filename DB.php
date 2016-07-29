<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 19.09.2015
 * Time: 14:28
 */


class DB{
    private static $instance;
    private $dbh;
    public $connected;
    private $host = "localhost";
    private $dbname = "AlatarDB";
    private $user = "root";
    private $pass = "";

    private function __construct(){}

    public static function get(){
        if (self::$instance === null){
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function connect(){
        try{
            $this->dbh = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->pass);
            $this->connected = true;
            return $this->dbh;
        } catch(PDOException $e){
            $this->connected = false;
            echo $e->getMessage();
        }
    }

    public  function getDbh(){
        return $this->dbh;
    }
}
?>
