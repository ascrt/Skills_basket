<?php $onglet = "Dribble";?>

<?php foreach ($articlesDribble as $articleDribble): ?>
    
    <article>
        <h2> <?= $articleDribble->title; ?> </h2>
        <p> <?= substr($articleDribble->content, 0, 250)?>... </p>
        <div class="plus">
            <a href="/articles/single/<?= $articleDribble->id?>"> Voir plus </a>
        </div>
    </article>
    
<?php endforeach ?>