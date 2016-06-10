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
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
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


    public static function addProduct($dat){
        $data = json_decode($dat);
        $data->code = self::translit($data->caption);
        try {
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("INSERT INTO products (code, caption, type, measure, price, info, image) VALUES (?,?,?,?,?,?,?)", $data->code, $data->caption,
                        $data->type, $data->measure, $data->price, $data->info, $data->imageName);
            echo 'Товар успішно доданий';
        }
        catch(Exception $e){echo $e;}
    }


    private static function translit($str) {
        $ukr = array('А', 'Б', 'В', 'Г', 'Ґ', 'Д', 'Е', 'Є', 'Ж', 'З', 'И', 'І', 'Ї', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х',
            'Ц', 'Ч', 'Ш', 'Щ', 'Ь', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'ґ', 'д', 'е', 'є', 'ж', 'з', 'и','і', 'ї', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р',
            'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ь', 'ю', 'я', '\'', ' ');
        $lat = array('A', 'B', 'V', 'H', 'G', 'D', 'E', 'YE', 'ZH', 'Z', 'Y', 'I', 'YI', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F',
            'H', 'C', 'CH', 'SH', 'SHCH', '', 'Yu', 'Ya', 'a', 'b', 'v', 'h','g', 'd', 'e', 'ye', 'zh', 'z', 'y', 'i', 'yi', 'y', 'k', 'l', 'm', 'n',
            'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'shch', '', 'yu', 'ya', '', '-');
        return str_replace($ukr, $lat, $str);
    }


    public static function addType($dat){
        $data = json_decode($dat);
        try {
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("INSERT INTO productsTypes (type) VALUES (?)", $data->type);
        }
        catch(Exception $e){echo $e;}
    }


    public static function addContact($json){
        $data = json_decode($json);
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("INSERT INTO contacts (types, info, icon) VALUES (?,?,?)", $data->type, $data->info, $data->icon);
        }catch(Exception $e){
            echo $e;
        }
        echo "Данні оновлено!";
    }


    public static function changeMap($json){
        $data = json_decode($json);
        $num = 1;
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("DELETE FROM map where id = 1");
        }catch(Exception $e){
            echo $e;
        }
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("INSERT INTO map (id, map_link) VALUES (?, ?)", $num, $data->map);
        }catch(Exception $e){
            echo $e;
        }
        echo ("Карту змінено!");
    }


    public static function getContacts($json){
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("SELECT types, info, icon FROM contacts");
        }catch(Exception $e){
            echo $e;
        }
        $result = '<div id = "contacts-change" style="margin-top: 15px;">';
        while($row = $db->nextRow()){
            $result.='<div class="contact-item" style="margin-bottom: 30px;"><label class="lab" for ="text">'.$row[0].'</label>
		                <input type = "text" class = "form-control" value="'.$row[1].'" style="margin-bottom:10px;">
                        <label class="lab" for ="text">Icon</label>
                        <input type = "text" class = "form-control" value="'.$row[2].'" style="margin-bottom:10px;">
		                <button class="contact-update btn btn-success" type="button" onclick="UpdateContactClick(this)">Редагувати</button></div>';
        }
        echo $result;
    }

    public static function getVacancies($json){
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("SELECT caption, info, image FROM vacancies");
        }catch(Exception $e){
            echo $e;
        }
        $result = '<div id = "contacts-change" style="margin-top: 15px;">';
        while($row = $db->nextRow()){
            $result.='<div class="contact-item" style="margin-bottom: 30px;"><label class="lab" for ="text">'.$row[0].'</label>
                        <input type = "text" class = "form-control" value="'.$row[1].'" style="margin-bottom:10px;">
                        <div class="control-group form-group"> 
                            <div class="controls"> 
                               <label for="image">Зображення</label> 
                                <form action="fileUpload.php" method="post" id="upload-form" enctype="multipart/form-data"> 
                                    <div class="fileform"> 
                                        <div id="fileformlabel">'.$row[2].'</div> 
                                        <div class="selectbutton" >Обзор</div> 
                                        <input type="file" class="add add-text form-control" accept="image/*" name="image" id="image" onchange="imageChangeFunc(this)"> 
                                    </div> 
                                </form> 
                            </div> 
                        </div> 
                        <button class="contact-update btn btn-success" type="button" onclick="UpdateVac(this)">Редагувати</button>
                        <button class="contact-update btn btn-danger" type="button" onclick="deleteVac(this)" style="margin-left:20px">Видалити</button></div>';
        }
        echo $result;
    }

    public static function updateContacts($dat){
        $data = json_decode($dat);
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("UPDATE contacts SET info=?, icon=?  WHERE types=?",$data->info, $data->icon, $data->label);
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public static function updateVac($dat){
        $data = json_decode($dat);
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("UPDATE vacancies SET info=?, image=?  WHERE caption=?",$data->info, $data->image, $data->label);
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public static function orderSuccess($dat){
        $data = json_decode($dat);
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("UPDATE orders SET done=1 WHERE id=?",$data->id);
        }
        catch(Exception $e){
            echo $e;
        }
    }


    public static function addDeliveryType($json){
        $data = json_decode($json);
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("INSERT INTO deliveryInfo (type, info, icon) VALUES (?,?,?)", $data->type, $data->info, $data->icon);
        }catch(Exception $e){
            echo $e;
        }
        echo "Данні оновлено!";
    }

    public static function addVacancyType($json){
        $data = json_decode($json);
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("INSERT INTO vacancies (caption, info, image) VALUES (?,?,?)", $data->type, $data->info, $data->image);
        }catch(Exception $e){
            echo $e;
        }
        echo "Данні оновлено!";
    }

    public static function getDeliveryTypes($json){
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("SELECT type, info, icon FROM deliveryInfo");
        }catch(Exception $e){
            echo $e;
        }
        $result = '<div id = "contacts-change" style="margin-top: 15px;">';
        while($row = $db->nextRow()){
            $result.='<div class="contact-item" style="margin-bottom: 30px;"><label class="lab" for ="text">'.$row[0].'</label>
                        <input type = "text" class = "form-control" value="'.$row[1].'" style="margin-bottom:10px;">
                        <label class="lab" for ="text">Icon</label>
                        <input type = "text" class = "form-control" value="'.$row[2].'" style="margin-bottom:10px;">
                        <button class="contact-update btn btn-success" type="button" onclick="UpdateDel(this)">Редагувати</button>
                        <button class="contact-update btn btn-danger" type="button" onclick="deleteDel(this)" style="margin-left:20px">Видалити</button></div>';
        }
        $result.='<a href = "http://fontawesome.io/icons/" target="_blank">Сайт с иконками</a>';
        echo $result;
    }


    public static function updateDel($dat){
        $data = json_decode($dat);
        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("UPDATE deliveryInfo SET info=?, icon=? WHERE type=?",$data->info, $data->icon, $data->label);
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public static function deleteDel($dat){
        $data = json_decode($dat);

        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("DELETE FROM deliveryInfo WHERE type=?", $data->label);
        }
        catch(Exception $e){
            echo $e;
        }
    }

     public static function deleteVac($dat){
        $data = json_decode($dat);

        try{
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("DELETE FROM vacancies WHERE caption=?", $data->label);
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public static function updateProduct($dat){
        $data = json_decode($dat);
        var_dump($data);
        try {
            $db = new Recordset();
            $db->connect(self::$host, self::$dbname, self::$user, self::$pass);
            $db->SQL("UPDATE products SET caption=?, type=?, measure=?, price=?, info=?, image=? WHERE code=?", $data->caption, $data->type,
                $data->measure, $data->price, $data->info, $data->imageName, $data->code);
            echo 'update';
        }
        catch(Exception $e){
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