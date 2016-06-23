<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 23.06.2016
 * Time: 14:41
 */
include_once '/IErrorHandler.php';

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