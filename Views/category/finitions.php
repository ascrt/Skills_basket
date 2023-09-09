<?php $onglet = "Finitions";?>

<?php foreach ($articlesAtkCercle as $articleAtkCercle): ?>
    
    <article>
        <h2> <?= $articleAtkCercle->title; ?> </h2>
        <p> <?= substr($articleAtkCercle->content, 0, 250)?>... </p>
        <div class="plus">
            <a href="/articles/single/<?= $articleAtkCercle->id?>"> Voir plus </a>
        </div>
    </article>

<?php endforeach ?>