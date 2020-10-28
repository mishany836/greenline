<?php
require_once 'core/init.php';


$title = 'Главная страница';
$num = 2;//Количество новостей на странице
/**
 * Фильтрация по категориям
 */
$where = '';
if(isset($_GET['category'])){
    $category = intval($_GET['category']);
    if($category > 0){
        $where = 'WHERE `category_id` = ' . $category;
    }

}
$resTotal = mysqli_query($link, "SELECT * FROM `news` $where");
$total = mysqli_num_rows($resTotal);//Количество записей в запросе

$totalStr = ceil($total / $num);//Общее число страниц

$page = intval($_GET['page']);//получение номера страницы из адресной строки intval()- приводит к числу
if($page <= 0){
  $page = 1; //если номер страницы не существует или отрицательный
}elseif($page > $totalStr){
  $page = $totalStr;// если номер страницы больше чем их количество
}
//$where = '';
$offset = $page * $num - $num;//С какой новости начинать
//echo $totalStr;

//pr($_GET['category']);

//pr($total);
/* 
 $arCategory - СПИСОК КАТЕГОРИЙ ДЛЯ layout (init.php)
*/

$res = mysqli_query($link, "SELECT n.`id`, n.`title`, n.`preview_text`, n.`date`, n.`image`, n.`comments_cnt`, c.`title` AS news_cat".
" FROM `news` n JOIN `category` c ON c.`id` = n.`category_id` $where ORDER BY n.`id` LIMIT $offset, $num");
echo mysqli_error($link);
$arNews = mysqli_fetch_all($res,MYSQLI_ASSOC);

//pr($arNews);

$arPage = range(1, $totalStr); //МАссив со страницами [1,2,3,4....]

$prevPage = '';
if($page > 1){
    $prevPage = $page - 1;
}

$nextPage = '';
if($page < $totalStr){
    $nextPage = $page + 1;
}

$is_nav = ($totalStr > 1) ? true : false; //Если колличество страниц >1 то true иначе false

$pageNavigation = renderTemplate('navigation', [
                                    //'arPage' => $arPage,//получаем html шаблона навигации,Передаем массив со страницами
                                    'totalPage' => $totalStr,//Передаем колличество страниц
                                    'curPage' => $page, //передаем текущую страницу
                                    'nextPage' => $nextPage,//передаем номер следующей страницы
                                    'prevPage' => $prevPage,//передаем номер предыдущей страницы
                                    'show' => $is_nav //параметр для показа навигации
                                    ]);

$page_content = renderTemplate("main", [ // получаем html шаблона main.
                              'arNews' => $arNews,// массив с новостями полученными из базы 
                              'navigation' => $pageNavigation //передаем полученный html код навигации
]);
$result = renderTemplate('layout',[ //получаем главный шаблон страницы
                                'content' => $page_content, //передаем html код шаблона main
                                  'title' => $title, // передаем заголовок окна
                                  'arCategory' => $arCategory,//передаем массив с категориями полученный из баззы данных
                                 'menuActive' => 'main'
                                ]);

echo $result; // выводим на экран окончательный html страницы

