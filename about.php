<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

/**
 * $arCategory - список категорий для layout (init.php)
 */

$title = 'О нас';


$page_content = renderTemplate("about");

$result = renderTemplate('layout', [
    'content' => $page_content,
    'title' => $title,
    'arCategory' => $arCategory,
    'menuActive' => 'about'
]);

echo $result;
