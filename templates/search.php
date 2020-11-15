<?php
if (!empty($arResult)):?>

<?foreach ($arResult as $news):?>
<div class="article">
    <h2><?=$news['title'];?></h2>
    <div class="clr"></div>
    <p><span class="date"><?=$news['news_date'];?></span>Автор<a href="#">Admin</a> | Категория<a href="#"><?=$news[''];?></a></p>
    <img src="<?=IMG_PATH?>/<?=$news['image']?>" width="205" alt="" />
    <p><?=$news['detail_text'];?></p>
    <p class="spec"><a href="/news_detail.php?id=<?=$news['id']?>" class="rm">Читать далее >></a><a href="#" class="com"></a></p>
    </div>
<?endforeach;?>
<?=$navigation;?>

<?else:?>
<p>По вашему запросу ничего не найдено.</p>
<?endif;?>
