<?php

?>
<div class="article">
<?if(!empty($)):?>

  <?foreach($ as $):?> 
 <h2><span>Support to</span> Company Name</h2>
 <div class="clr"></div>
 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<strong>Possimus magnam, quaerat totam veritatis similique tenetur asperiores laborum quasi architecto at illo odio iure quam, mollitia itaque doloribus, soluta odit sunt.</strong> </p>
 <p><strong>Lorem ipsum dolor sit amet</strong></p>
 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea voluptate repellendus corporis vero facere eligendi, consequatur quod, explicabo tenetur est nostrum nihil voluptatum molestiae animi dignissimos aliquid! Non, laudantium? Ut.</p>
<ul>
 <?endforeach;?>


  <li class="block-question">
<p class="question"><?=$support['title'];?></p>
<p class="ans"><?=$support['text'];?></p>
</li>
</ul>


</div>
<?else:?>
    <p>Новостей пока нет.</p>       
  <?endif;?>