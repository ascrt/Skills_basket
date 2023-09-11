<?php $onglet = "Espace Commentaires" ?>

<h2> Utilisateurs du site </h2>

<table class="tab-com">
    <thead>
        <th> ID </th>
        <th> Pseudo </th>
        <th> Mail </th>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td> <?= $user->id ; ?> </td>
                <td> <?= $user->pseudo; ?> </td>
                <td> <?= $user-> mail ?> </td>
                <td> <a href="/admin/supprimerUser/<?= $user->id?>"> Supprimer </a> </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/admin"> Retour à l'accueil administration </a>