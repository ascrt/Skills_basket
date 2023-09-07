<?php $onglet = "Profil"; ?>

<div class="espace">
    <h1> Bienvenue <?= $_SESSION['user']['pseudo'] ;?> </h1>
    <p> Vous pouvez maintenant poster des commentaires ou modifier votre profil </p>
    <a href="/users/modifier/<?= $user->id;?>"> Modifier votre profil </a>
    <a href="/articles"> Allez voir les articles </a>
    <a href="/users/logout"> Se deconnecter </a>
</div>



