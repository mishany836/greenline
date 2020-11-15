<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';//
require_once  $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';//подключаем 
require_once  $_SERVER['DOCUMENT_ROOT'] . '/core/function.php';


$res = mysqli_query($link,"SELECT * FROM `category` ORDER BY `title` ASC");
$arCategory = mysqli_fetch_all($res,MYSQLI_ASSOC);

























