<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $onglet;?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="grid-container">
        <nav>
            <!-- Les liens -->
            <ul class="nav-lien">
                <li> <a href="/"> Accueil </a></li>
                <li> <a href="/articles"> Articles </a></li>
                <li> <a href="#"> Login </a></li>
                <li> <a href="#"> Inscription </a></li>
            </ul>
            <!-- Le burger -->
            <button id="btn-burger">
                <span class="line l1"> </span>
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

    <script src="assets/js/script.js"></script>
</body>
</html>