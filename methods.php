<?
include_once 'Recordset.php';

class SQLMethods{
    private static $host = "localhost";
    private static $dbname = "AlatarDB";
    private static $user = "root";
    private static $pass = "";

    public static function createOrder($json)
    {
        $data = json_decode($json);
        try{
            $data->date = date('Y-m-d H:i');
            $db = new Recordset();
            $db->connect();
            $db->SQL("INSERT INTO orders (name, telNumber, email, info, date, done) VALUES (?,?,?,?,?,?)",  
                strip_tags($data->name), strip_tags($data->telNumber), strip_tags($data->email), strip_tags($data->info), $data->date, 0);
        }catch(Exception $e){
            echo $e;
        }
       
    }

    /*public static function checkUser($json){
        $data = json_decode($json);
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("SELECT password FROM users WHERE login = ?",$data->login);
        }catch(Exception $e){
            echo $e;
        }
       $pass = $db->nextRow();

        if ($pass[0] == $data->password){
            echo "/admin";
        }
    }*/




    public static function setLanguageInfo($lang){
        session_start();
        if($lang == 'ukr'){
            $_SESSION['lang'] = '_ukr';
        }
        elseif($lang == 'en'){
            $_SESSION['lang'] = '_en';
        }
        var_dump($_SESSION);
    }

}