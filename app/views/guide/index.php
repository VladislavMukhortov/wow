<h1 class="guide-title">Гайды</h1>
    <?foreach($guidesIds as $item):?>
        <a href="/guide/list/<?= $item['id']?>">
            <div class="guide-item">
                <img class="guide-img" src="/public/img/guide/<?= $item['img']?>">
                <div class="guide-title-item"><?= $item['title']?></div>
            </div>
        </a>
    <?endforeach?>