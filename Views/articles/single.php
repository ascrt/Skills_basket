<?php $onglet = $article->title; ?>

<article id="<?php echo $article->id?>">
    <h2> <?= $article->title; ?> </h2>
    <p> <?= $article->content; ?> </p>
    <a href="/comments/afficher/<?= $article->id ?>"> Afficher les commentaire</a>
</article>




