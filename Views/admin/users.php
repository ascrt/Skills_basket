<?php $onglet = "Espace Commentaires" ?>


<table>
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
                <td> <?= $user-> Mail ?> </td>
                <a href="#"> Supprimer </a>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>