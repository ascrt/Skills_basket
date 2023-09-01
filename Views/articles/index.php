<?php $onglet = "Articles"; ?>


<article>
    <?php foreach($articles as $article) : ?>
        <h2> <?= $article->title; ?> </h2>
        <p> <?= $article->content; ?> </p>
        <p> <?$article->date;?> </p>
    <?php endforeach;?>
</article>