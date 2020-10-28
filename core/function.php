<?php


//Подключаем шаблон с параметрами

function renderTemplate($name, $data = [])

{
   $result = ''; //подготавливаем результат
   $name = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $name . '.php'; // создаем полный путь  из $name
   if (!file_exists($name)) {


      return $result; //если такого файла нет, возвращаем результат


   }
   ob_start(); //начало буферезации

   extract($data); //создает переменные из массива ['title' => '123'] = $title = '123'

   require_once $name; // подключаем шаблон
   $result = ob_get_clean(); // очищаем буфер
   return $result; //возвращаем результат

}


/**
 * функция для форматированного вывода массива
 */

function pr($arr){

echo '<pre>';
print_r($arr);
echo '</pre>';
 


}

/**
 * Функция добавления параметра в адрессную строку
 */
function setPageParam($param, $value)
{
$qParam = $_SERVER['QUERY_STRING'];//получаем строку с параметрами
parse_str($qParam, $arr); //Генерируем массив из этой строки
if(!empty($param) && !empty($value)){ //если переданы параметры
        $arr[$param] = $value;
}
        return http_build_query($arr);
}
//function getWeekDay()
 //array_key_exists()