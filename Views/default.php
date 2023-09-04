<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $onglet;?></title>
    <link rel="stylesheet" href="/assets/style/style.css">
</head>
<body>
    <div class="grid-container">
        <nav>
        <!-- Liens -->
            <ul class="liens">
                <li><a href="/"> Acceuil</a></li>
                <li><a href="/articles"> Articles</a></li>
                <li>
                    <!-- dropdown  -->
                    <div class="dropdown">
                        <a href="/"> Catégories</a>
                        <!-- Dropdown contenu -->
                        <div class="dropdown-contenu">
                            <?php foreach ($categories as $categorie): ?>
                                <a href="/category/<?=$categorie->category_title?>/<?= $categorie->id?>"> <?= $categorie->category_title;?> </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <li><a href="/users/login"> Login </a></li>
                <li><a href="#"> Contact </a></li>
            </ul>
            <!-- Bouton burger -->
            <button id="btn-burger">
                <span class="line l1"></span>
                <span class="line l2"></span>
                <span class="line l3"></span>
            </button>
        </nav>  
        <header>
            <h1> Skills_Basket</h1>
        </header>
        <main>
            <?= $content; ?>
        </main>
        <footer>
            <p> &copy; 2023 tout droit réservés</p>
        </footer>
    </div>

    <script src="/assets/js/script.js"></script>
</body>
</html>