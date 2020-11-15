<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

pr($_FILES);
if (!empty($_FILES['user_file']['error'])){
foreach ($_FILES['user_file']['error'] as $k => $val){
    if ($val == 0) {
        $upload = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
        $arName = explode('.', $_FILES['user_file']['name'][$k]);
        $name = $arName[0] . '_' . time() . '.' . $arName[1];
        move_uploaded_file($_FILES['user_file']['tmp_name'][$k], $upload . $name);
        }
    }
}
/* //первый вариант одиночной загрузки файла
if ($_FILES['user_file']['error'] == 0){

$upload = $_SERVER['DOCUMENT_ROOT'] . '/upload/'; // путь к папке с загрузками
$arName = explode('.', $_FILES['user_file']['name']);
$name = $arName[0] . '_' . time() . '.' . $arName[1]; //составляем новое имя для файла с использованием метки времени
move_uploaded_file($_FILES['user_file']['tmp_name'], $upload . $name);

}
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <input type="file" name="user_file" />
    <input type="submit" value="Загрузить" />
</form>
*/
?>
<!-- форма для загрузки файлов-->
<form method="post" enctype="multipart/form-data">
    <input type="file" name="user_file[]" /><br>
    <input type="file" name="user_file[]" /><br>
    <input type="file" name="user_file[]" /><br>
    <input type="file" name="user_file[]" /><br>
    <input type="submit" value="Загрузить" />
</form>












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
//$cat = $_GET['category'];
//$title = 'Технологии';
//$stmt = mysqli_prepare($link, "SELECT * FROM `category` WHERE `title` = ? ");// Подготавливает запрос Возвращает указатель

//mysqli_stmt_bind_param($stmt, "s", $title); // привязывает переменные к параметрам запроса

//mysqli_stmt_execute($stmt); // выполняет подготовленный запрос

 // $res = mysqli_stmt_get_result($stmt); // получает результат запроса

   // $res = getStmtResult($link, "SELECT* FROM `category` WHERE `title`= ?", array($title));
    //while($arRes = mysqli_fetch_assoc($res)){
       // pr($arRes);
   // }
?>