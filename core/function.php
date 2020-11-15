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
/**
 * Функция подготовленного запроса
 * @param $link
 * @param $query
 * @param array $param
 * @return false|mysqli_result
 */
function getStmtResult($link, $query, $param =[]){
    if (!empty($param)) {     //если есть массив с параметрами
        $stmt = mysqli_prepare($link, $query);// Подготавливаем запрос
        $type = '';    // Подготавливаем аргумент с типами на основе типов в параметрах для передачи
        foreach ($param as $item){  //заполняем type
            if (is_int($item)){
                $type .= 'i';
            }elseif (is_string($item)){
                $type .= 's';
            }elseif (is_double($item)){
                $type .= 'd';
            }else{
                $type .= 's';
            }
        }

        $values = array_merge([$stmt, $type], $param); //подготавливаем массив параметров

        $func = 'mysqli_stmt_bind_param';
        $func(...$values); // ... - указывает переменное число аргументов

        mysqli_stmt_execute($stmt);//выполняет подготовленный запрос
        $result = mysqli_stmt_get_result($stmt); // Получает результат запроса
        return $result;
    }else{
        $result = mysqli_query($link, $query);
        return $result;
    }
}

































