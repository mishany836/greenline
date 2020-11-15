<?php if($show): ?>
   <p class="pages">

   <small>Страница <?=$curPage;?> из <?=$totalPage;?></small>

       <?if($curPage > 1):// выводим ссылку на первую страницу?>
       <a href="?<?=setPageParam('page', 1);?>">&laquo</a>
       <?endif;?>

     <?if($prevPage != ''):// выводим ссылку на предыдущую страницу?>
         <a href="?<?=setPageParam('page', $prevPage);?>"><?=$prevPage;?></a>
    <?endif;?>

       <span><?=$curPage;?></span><?//Текущая страница?>

       <?if($nextPage != ''):// Выводим ссылку на следующую страницу?>
    <a href="?<?=setPageParam('page', $nextPage);?>"><?=$nextPage;?></a>
      <?endif;?>

       <?if($curPage < $totalPage)://Выводим ссылку на последнюю страницу?>
       <a href="?<?=setPageParam('page', $totalPage);?>">&raquo</a>
       <?endif;?>

  </p>
<?php endif;?>





