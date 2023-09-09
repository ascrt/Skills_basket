<?php $onglet = $article->title; ?>

<article class="single">
    <h2> <?= $article->title; ?> </h2>
    <p> <?= $article->content; ?> </p>

    <button id="btn-comments" onclick="voirComments()"> Voir commentaires </button>
    <div id="com">
        <a href="/comments/ajouter/<?= $article->id?>">Ajouter un commentaire </a>
        <?php if(!$comments || empty($comments)) :?>
            <p> Soyez le premier à poster un commentaire </p>
        <?php else :?>
            <?php foreach ($comments as $comment) : ?>
                <h4> <?= $comment->pseudo; ?> </h4>
                <p> <?= $comment->content; ?> </p>
                <p> Publié le <?= $comment->date; ?> </p>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
</article>






<!--<div class="comments"  id="btn-comments">
        <a href="/comments/afficher/$article->id ?>"> Afficher les commentaires </a>
    </div>-->


<script src="/assets/js/app.js"></script>




