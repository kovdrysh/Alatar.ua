<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 23.06.2016
 * Time: 14:41
 */
include_once 'IErrorHandler.php';

class ErrorHandler implements IErrorHandler{
    public static function myErrorHandler($code, $message, $file, $line){
        echo 'Fatal error! '.$message;
    }

    public static function fatalErrorHandler(){
        $error = error_get_last();
        if($error['type'] === E_ERROR){
            self::myErrorHandler(E_ERROR, $error['message'], $error['file'], $error['line']);
        }
    }
}

/*- Значит мы, календарь, Мая. И тут: "нет, мы не будем", спички консервы Далай Лама, свет не будем фотоны фонарь включил кто? Никого. а потом: кто алё, и что? ничего, Страшно. Значит 28-й год, когда: "Мы не будем запускать", а потом журналисты оп, а и что? Ничего никогда не было нужно
- Камаз
- Да. 18 тысяч, красный, желтый, яркий - маска. В руки берешь, алё сечи? ЧТО?! Ничего! Дети маленькие, мама! мама! мама! Но мы не можем.
 *
 *
 */