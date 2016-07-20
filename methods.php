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
                $data->name, $data->telNumber, $data->email, strip_tags($data->info), $data->date, 0);
            mail("artem.astakhov95@gmail.com", "Замовлення пиломатеріалів", "Доброго дня\n\n$data->info\n\nІм'я: $data->name\nКонтактний телефон: $data->telNumber\nЕлектронна адреса: $data->email");
        }catch(Exception $e){
            echo $e;
        }
       
    }


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