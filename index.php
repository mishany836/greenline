<?php
require_once 'core/init.php';
$title = 'Главная страница';
$num = 2; // колличество новосей на странице
$where = '';
if(isset($_GET['category'])){
    $category = intval($_GET['category']);
    if($category > 0){
        $where = 'WHERE `category_id` = ?';
    }
}
// Если есть условие и выбрана категория
if($where != '' && isset($category)){
    $resTotal = getStmtResult($link, "SELECT * FROM `news` $where", [$category]);
}else{
    $resTotal = getStmtResult($link, "SELECT * FROM `news`");

}
$total = mysqli_num_rows($resTotal); //колличество записей в запросе
$totalStr = ceil($total / $num); //общее число страниц
$page = intval($_GET['page']); //получение номера страницы из адрессной строки intval() - приводит к числу

if($page <= 0){
    $page = 1;// если номер страницы не существует или отртцательный
}elseif ($page > $totalStr){
$page = $totalStr; //если номер страницы больше чем их количество
}
$offset = $page * $num - $num;//  с какой новости начинать
$query = "SELECT n. `id`, n.`title`, n. `preview_text, DATE_FORMAT(n.`date`, '%d.%m.%Y %H:%i') AS news_date, n.`comments`";
    "FROM `news` n JOIN `category` c ON c.`id` = n. `category_id` $where ORDER BY n. `id` LIMIT ?, ?";

//в зависимости от наличия условия подготавливаем параметры
if($where != '' && isset($category)){
    $param = [$category, $offset, $num];
}else{
    $param = [$offset, $num];
}
$res = getStmtResult($link, $query, $param);
$arNews = mysqli_fetch_all($res, MYSQLI_ASSOC);

$arPage = range(1, $totalStr); //массив со страницами [1,2,3,4,...]

$prePage = '';
if($page > 1){
    $prevPage = $page - 1;
}

$nextPage = '';
if($page < $totalStr){
    $nextPage = $page + 1;
}

$is_nav = ($totalStr > 1) ? true : false; //если количество страниц > 1 то true иначе false
$pageNavigation = renderTemplate('navigation',[ // получаем html  шаблона навигации
    //'arPage' => $arPage,
    'totalPage' => $totalStr,
    'curPage' => $page,
    'nextPage' => $nextPage,
    'prevPage' => $prevPage,
    'show' => $is_nav
]);
$page_content = renderTemplate("main",[
    'arNews' => $arNews,
    'navigation' => $pageNavigation
]);

$result = renderTemplate('layout',[
    'content' => $page_content,
    'title' => $title,
    'arCategory' => $arCategory,
    'menuActive' => 'index'
]);
echo  $result;





































