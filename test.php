<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';


?>
<!--1. сколько записей выводить на страницу

2. сколько всего записей

3. сколько будет страниц

4. определить текущую страницу ($_GET['page'])

LIMIT  ограничение выборки 
LIMIT n, m 
n - с какоцй записи начинать
m - сколько выводить

LIMIT n - количество строк

OFFSET m - смещение с какой начинать

.......LIMIT n OFFSET m


1.сформировать запрос с плейсхолдерами
2. отправить запрос в базу
3. Подставить значения в подготовленное выражение
4. выполнить подготовленное выражение
5. Обработать результат выполнения
-->
<?php
//r($_GET);
?>
<a href="?page=1&action=main">Ссылка</a>



<?php
/**
 *
i - integer (число)
S - string (Строка)
d - double (число с плавающей точкой) 1.3
b - blob (Бинарные данные)

написать функцию- принемает дни недели где суббота это 7
 */



?>
<?php
$cat = $_GET['category'];
$title = 'Технологии';
//$stmt = mysqli_prepare($link, "SELECT * FROM `category` WHERE `title` = ? ");// Подготавливает запрос Возвращает указатель

//mysqli_stmt_bind_param($stmt, "s", $title); // привязывает переменные к параметрам запроса

//mysqli_stmt_execute($stmt); // выполняет подготовленный запрос

 // $res = mysqli_stmt_get_result($stmt); // получает результат запроса

    $res = getStmtResult($link, "SELECT* FROM `category` WHERE `title`= ?", array($title));
    while($arRes = mysqli_fetch_assoc($res)){
        pr($arRes);
    }
?>