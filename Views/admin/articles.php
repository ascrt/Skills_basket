<?php $onglet = "Espace Articles" ;?>

<a href="/admin/ajouter"> Ajouter un article </a>

<!-- Tableau des articles -->


<h2> Articles du site </h2>

<table>
    <thead>
        <th> ID</th>
        <th> Title</th>
        <th> Contenu </th>
        <th> Date </th>
    </thead>
    <tbody>
        <?php foreach ($articles as $article) : ?>
            <tr>
                <td> <?= $article->id ;?> </td>
                <td> <?= $article->title ;?> </td>
                <td> <?= $article->content;?> </td>
                <td> <?= $article->date ;?> </td>
                <td> <a href="/admin/modifier/<?= $article->id?>"> Modifier </a> </td>
                <td> <a href="/admin/supprimer/<?= $article->id?>"> Supprimer</a> </td>    
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/admin"> Retour à l'accueil administration </a>