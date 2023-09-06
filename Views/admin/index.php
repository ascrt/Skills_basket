<?php $onglet = "Administration"; ?>

<?php if(isset($_SESSION['message'])) : ?>
    <div>
        <?= $_SESSION['message']; unset($_SESSION['message']) ?>
    </div>
<?php endif; ?>

<h1> Espace administration </h1>


<div>
    <a href="/admin/articles"> Espace Articles </a>
    <a href="#"> Espace Commentaires </a>
    <a href="#"> Espace Utilisateur </a>
</div>
