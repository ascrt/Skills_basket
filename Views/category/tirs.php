<?php $onglet = "Tirs";?>

<?php foreach ($articlesTir as $articleTir): ?>
    
    <article>
        <h2> <?= $articleTir->title; ?> </h2>
        <p> <?= $articleTir->content;?> </p>
        <div class="plus">
            <a href="/articles/single/<?= $articleTir->id?>"> Voir plus </a>
        </div>
    </article>

<?php endforeach ?>