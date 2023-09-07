<?php $onglet = $article->title; ?>

<article class="single">
    <h2> <?= $article->title; ?> </h2>
    <p> <?= $article->content; ?> </p>
    <div class="comments"  id="btn-comments">
        <a href="/comments/afficher/<?= $article->id ?>"> Afficher les commentaires </a>
    </div>
</article>








<script src="/assets/js/app.js"></script>




