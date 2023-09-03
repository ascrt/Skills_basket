<?php $onglet = "Attaque du cercle";?>

<?php foreach ($articlesAtkCercle as $articleAtkCercle): ?>
    
    <article>
        <h2> <?= $articleAtkCercle->title; ?> </h2>
        <p> <?= $articleAtkCercle->content;?> </p>
        <a href="/articles/single/<?= $articleAtkCercle->id?>"> Voir plus </a>
    </article>

<?php endforeach ?>