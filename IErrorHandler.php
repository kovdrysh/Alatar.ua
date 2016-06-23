<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 23.06.2016
 * Time: 14:42
 */

interface IErrorHandler{
    public static function myErrorHandler($code, $message, $file, $line);
    public static function fatalErrorHandler();
}