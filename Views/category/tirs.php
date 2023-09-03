<?php $onglet = "Tirs";?>

<?php foreach ($articlesTir as $articleTir): ?>
    
    <article>
        <h2> <?= $articleTir->title; ?> </h2>
        <p> <?= $articleTir->content;?> </p>
        <a href="/articles/single/<?= $articleTir->id?>"> Voir plus </a>
    </article>

<?php endforeach ?>