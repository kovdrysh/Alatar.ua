<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 23.01.2016
 * Time: 12:11
 */
$directory = 'images';
if(isset($_FILES['image'])){
    $file_name = $_FILES['image']['name'];
    $extention = pathinfo($file_name, PATHINFO_EXTENSION);
    if ($extention == "jpg" || $extention == "jpeg" || $extention == "gif" || $extention == "bmp" || $extention == "png")
    {
        if($_FILES['image']['size'] != 0 && $_FILES['image']['size'] < 1024*2*1024){
            if(is_uploaded_file($_FILES['image']['tmp_name'])){
                if(move_uploaded_file($_FILES['image']['tmp_name'], "$directory/".basename($_FILES['image']['name']))){
                    echo 'Зображення успішно завантажене';
                }
            }
        }
        else{
            echo 'Розмір файлу має бути меньше 3-х мегабайтів';
        }
    }
    else{
        echo 'Файл має бути зображенням';
    }
}
else echo 'Something wrong';