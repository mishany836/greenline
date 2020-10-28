<?php if($show): ?>
   <p class="pages">

   <small>Страница <?=$curPage;?> из <?=$totalPage;?></small>

       <?if($curPage > 1):// выводим ссылку на первую страницу?>
       <a href="?page=1">&laquo</a>
       <?endif;?>

     <?if($prevPage != ''):// выводим ссылку на предыдущую страницу?>
         <a href="?page=<?=$prevPage;?>"><?=$prevPage;?></a>
    <?endif;?>

       <span><?=$curPage;?></span><?//Текущая страница?>

       <?if($nextPage != ''):// Выводим ссылку на следующую страницу?>
    <a href="?page=<?=$nextPage;?>"><?=$nextPage;?></a>
      <?endif;?>

       <?if($curPage < $totalPage)://Выводим ссылку на последнюю страницу?>
       <a href="?page=<?=$totalPage;?>">&raquo</a>
       <?endif;?>

  </p>
<?php endif;?>





