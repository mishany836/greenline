<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

$id = intval($_GET['id']);
$title = 'Новость';

$query = "SELECT n.`id`, n.`title`, n.`detail_text`, DATE_FORMAT(n.`date`, '%d.%m.%Y %H:%i) AS date_detail, n.`image`, n.`comments_cnt`, c.`title` AS news_cat".
    "FROM `news` n JOIN `category` c ON c.`id` = n.`category_id` WHERE n.`id` = ? LIMIT ?";

$res = getStmtResult($link, $query, [$id, 1]);

$arNewsDetail = mysqli_fetch_assoc($res);

$resComment = getStmtResult($link, "SELECT * FROM `comments` WHERE `news_id`= ?", [$id]);
$arComments = mysqli_fetch_all($resComment, MYSQLI_ASSOC);// получаем коментарии текущей новости

$resTags = getStmtResult($link, "SELECT *FROM `tags` WHERE `news_id` = ?, [$id]");
$arTags = mysqli_fetch_all($resTags, MYSQLI_ASSOC);

$comments = renderTemplate('comments', [// получаем шаблон коментариев
    'arComments' => $arComments // передаем массив в шаблон коментариев
]);

$page_content = renderTemplate("news_detail", [ // получаем html шаблона main.
    'arNews' => $arNewsDetail,// массив с новостями полученными из базы
    'comments' => $comments,
    'arTags' => $arTags //передаем массив с тегами новости

]);

$result = renderTemplate('layout',[ //получаем (главный шаблон страницы)
    'content' => $page_content, //передаем html код шаблона main
    'title' => $title, // передаем заголовок окна
    'arCategory' => $arCategory,//передаем массив с категориями полученный из баззы данных
    'menuActive' => 'index'
]);

echo $result; // выводим на экран окончательный html страницы


























