<?php

$link = mysqli_connect('localhost', 'root', '', 'greenline');

if(!$link){

    echo 'Произошла ошибка!' . PHP_EOL;
    echo 'код ошибки ' . mysqli_connect_errno() . PHP_EOL;
    echo 'Текст ошибки' . mysqli_connect_error();
    die();  
}
mysqli_set_charset($link,"utf8");

$res = mysqli_query($link, "SELECT * FROM `category` ORDER BY `title` ASC");
$arCategory = mysqli_fetch_all($res,MYSQLI_ASSOC);
/* echo '<pre>';
print_r($arCategory);
echo '</pre>' */;

