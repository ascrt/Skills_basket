<?php $onglet = "Login";?>

<article class="login">
    <?php if(!empty($_SESSION['erreur'])) : ?>
        <div class="erreur">
            <?php echo $_SESSION['erreur']; unset($_SESSION['erreur']); ?>
        </div>
    <?php endif ;?>
    <h1> Connexion </h1>
    <div>
        <?= $loginForm; ?>
        <a href="/users/register"> Pas ecnore alors inscrit-toi ici </a>
    </div>
</article>


