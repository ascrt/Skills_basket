<?php $onglet = $article->title; ?>

<article>
    <h2> <?= $article->title; ?> </h2>
    <p> <?= $article->content; ?> </p>
    <a href="/comments/ajouter/<?= $article->id ?>"> Ajouter un commentaire</a>
    <button> Afficher les commentaires </button>
</article>