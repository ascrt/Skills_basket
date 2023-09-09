<?php $onglet = "Tirs";?>

<?php foreach ($articlesTir as $articleTir): ?>
    
    <article>
        <h2> <?= $articleTir->title; ?> </h2>
        <p> <?= substr($articleTir->content, 0, 250)?>... </p>
        <div class="plus">
            <a href="/articles/single/<?= $articleTir->id?>"> Voir plus </a>
        </div>
    </article>

<?php endforeach ?>