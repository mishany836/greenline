<?php
require_once 'core/init.php';
/**
 * $arCategory - список категорий для layout (init.php)
 */

$title = 'Поддержка';

$res = mysqli_query($link, "SELECT n.`id`, n.`title`, n.`preview_text`, `date`, n.`image`, n.`comments_cnt`, c.`title` AS new_cat FROM `news` n JOIN `category` c ON c.`id` = n.`category_id`");
$arNews = mysqli_fetch_all($res,MYSQLI_ASSOC);

//pr($arNews);


$page_content = renderTemplate("support", [
                              'arNews' => $arNews
]);
$result = renderTemplate('layout',[
                                'content' => $page_content,
                                  'title' => $title,
                                'arCategory' => $arCategory,
                                'menuActive' => 'support'
                                ]);

echo $result;