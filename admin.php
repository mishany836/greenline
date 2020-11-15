<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';
$admin_login = 'admin';
$admin_pass = 'admin';
if ($_POST['login'] != '' && $_POST['pass'] != ''){
    if($_POST['login'] == $admin_login && $_POST['pass'] == $admin_pass){
        $_SESSION['is_admin'] = '1';
    }
}
//pr($_POST);
$page_content = renderTemplate('admin');

$result = renderTemplate('admin_layout',[
    'content' => $page_content,
    'title' => 'Админка', // передаем заголовок окна
    'menuActive' => 'index'
]);
echo  $result;











