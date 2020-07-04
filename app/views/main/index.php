<?php 
?>
<div class="news-container">
    <?foreach($news as $item):?>
        <h3><?= $item['title']?></h3>
        <img src="<?= $item['img']?>">
        <p><?= $item['content']?><p>
    <?endforeach?>
</div>