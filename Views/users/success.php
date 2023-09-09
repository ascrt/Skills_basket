<?php $onglet = "Success"; ?>

<div>
    <p> <?= $_SESSION['message']; unset($_SESSION['message']) ?> </p>
    <a href="/users/login"> Se connecter</a>
</div>