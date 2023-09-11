<?php $onglet = "Espace Commentaires" ?>

<!-- Tableau des commentaires -->

<h2> Tableau des commentaires </h2>


<table class="tab-com">
    <thead>
        <th> ID </th>
        <th> Content </th>
        <th> Date </th>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment) : ?>
            <tr>
                <td> <?= $comment->id?> </td>
                <td> <?= $comment->content?> </td>
                <td> <?= $comment->date ?> </td>
                <td> <a href="/admin/supprimerComments/<?= $comment->id ?>"> Supprimer </a> </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/admin"> Retour à l'accueil administration </a>
