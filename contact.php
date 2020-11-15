<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';


$title = 'Контакты';
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'mishany19802608@mail.ru';
    $subject = 'Письмо из формы обратной связи';
    $text = '';
    $text .= 'Имя: ' . $name . PHP_EOL;
    $text .= 'EMAIL: ' . $email . PHP_EOL;
    $text .= 'Телефон: ' . $phone . PHP_EOL;
    $text .= 'Сообщение: ' . $message . PHP_EOL;
}

// $arCategory - СПИСОК КАТЕГОРИЙ ДЛЯ init.php



/* echo '<pre>';
print_r($arCategory);
echo '</pre>';
 */


$page_content = renderTemplate("contact");
$result = renderTemplate('layout',[
                                 'content' => $page_content,
                                  'title' => $title,
                                'arCategory' => $arCategory,
                                'menuActive' => '4'
                                ]);

echo $result;
