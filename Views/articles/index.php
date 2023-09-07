<?php $onglet = "Articles"; ?>



    <?php foreach($articles as $article) : ?>
        <article>
            <h2> <?= $article->title; ?> </h2>
            <p> <?= $article->content; ?> </p>
            <p> <?= $article->date;?> </p>
            <div class="plus">
                <a href="/articles/single/<?= $article->id;?>"> Voir plus </a>
            </div>
        </article>
    <?php endforeach;?>
