<?php $onglet = "Espace Commentaires" ?>

<!-- Tableau des commentaires -->

<h2> Tableau des commentaires </h2>

<table>
    <thead>
        <th> ID </th>
        <th> Content </th>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment) : ?>
            <tr>
                <td> <?= $comment->id?> </td>
                <td> <?= $comment->content?> </td>
                <td> <a href="/admin/supprimerComments/<?= $comment->id ?>"> Supprimer </a> </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>