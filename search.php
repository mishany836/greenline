<?php
require_once 'core/init.php';

$arResult = [];
$search = $_GET['search'];
if($search != ''){
    $query = "SELECT n.`id, n.`title`, n.`detail_text`, DATA_FORMAT(n.`date`, '%d.%m.%Y %H:%i') AS news_date, n.`image`, n.`comments_cnt`";
        "FROM `news` n JOIN `category` c ON c. `id` = n. `category_id` WHERE MATCH(`detail_text`) AGAINST(?)";
    $res = getStmtResult($link, $query, [$search]);
    while ($arRes = mysqli_fetch_assoc($res)){
        $text = substr($arRes['detail_text'], 0, 200);
        $arRes['detail_text'] = $text;

        $arResult[] = $arRes;
    }
}

$page_content = renderTemplate('search', ['arResult' => $arResult]);
$result = renderTemplate('layout', [
    'content' => $page_content,
    'title' => 'Поиск по сайту',
    'arCategory' => $arCategory,
    'menuActive' => ''
]);

echo $result;







