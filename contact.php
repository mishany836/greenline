<?php
require_once 'core/init.php';


$title = 'Контакты';

// $arCategory - СПИСОК КАТЕГОРИЙ ДЛЯ init.php



/* echo '<pre>';
print_r($arCategory);
echo '</pre>';
 */


$page_content = renderTemplate("contact");
$res = renderTemplate('layout',[
                                 'content' => $page_content,
                                  'title' => 'Контакты',
                                'arCategory' => $arCategory,
                                'menuActive' => 'contact'
                                ]);

echo $res;
