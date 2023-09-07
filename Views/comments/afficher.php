<?php if(!$comments || empty($comments)) :?>
        <p> Soyez le premier à poster un commentaire </p>
<?php else :?>
    <div>
        <?php foreach ($comments as $comment) : ?>
            <h4> <?= $comment->pseudo; ?> </h4>
            <p> <?= $comment->content; ?> </p>
            <p> Publié le <?= $comment->date; ?> </p>
        <?php endforeach;?>
    </div>
<?php endif; ?>