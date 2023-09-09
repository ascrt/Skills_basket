<?php $onglet = "Administration"; ?>

<?php if(isset($_SESSION['message'])) : ?>
    <div class="message">
        <?= $_SESSION['message']; unset($_SESSION['message']) ?>
    </div>
<?php endif; ?>

<div class="espace">
    <h1> Espace administration </h1>
    <a href="/admin/articles"> Espace Articles </a>
    <a href="/admin/comments"> Espace Commentaires </a>
    <a href="/admin/users"> Espace Utilisateur </a>
</div>
