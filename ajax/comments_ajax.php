<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';
mysqli_begin_transaction($link);

$resC = getStmtResult($link,"INSERT INTO `comments` SET `text` = ?, `author` = ?, `news_id` = ?, `date` = NOW()", [
    $_POST['message'],
    $_POST['name'],
    $_POST['news_id']
]);
    $id = mysqli_insert_id($link);// получает id только что вставленной записи
$resN = getStmtResult($link, "SELECT `comment_cnt` FROM `news` WHERE `id` = ?", [$_POST['news_id']]);
$cnt = mysqli_fetch_assoc($resN)['comments_cnt'];
$cnt++;

$resNews = getStmtResult($link, "UPDATE `news` SET `comments_cnt` = ? WHERE `id` = ?", [$cnt, $_POST['news_id']]);
//var_dump($id);

if($id > 0){
  mysqli_commit($link);
    //echo 'ok';

    $resComment = getStmtResult($link, "SELECT * FROM `comments` WHERE `news_id` = ? ", [$_POST['news_id']]);
    $arComments = mysqli_fetch_all($resComment, MYSQLI_ASSOC); //получаем комментарий текущей новости

    $comments = renderTemplate('comments', [ //получаем шаблон комментариев
        'arComments' => $arComments // передаем массив в шаблон комментариев

    ]);
    $arResult = [];
    $arResult['comments'] = $comments;
    $arResult['cc'] = count($arComments);
    echo json_encode($arResult); //превращаем  массив в json
}else{
  mysqli_rollback($link);
    echo 'error';

}








































