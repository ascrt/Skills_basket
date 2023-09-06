<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $onglet;?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/style/style.css">
</head>
<body>
    <nav>
    <!-- Liens -->
        <ul class="liens">
            <li><a href="/"> Acceuil</a></li>
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
            <?php if(isset($_SESSION['user'])  && !empty($_SESSION['user']['id'])): ?>
                <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === "Admin") :?>
                    <li> <a href="/admin"> Administration </a></li>
                <?php endif; ?>
                <li> <a href="/users/profil"> Profil </a></li>
                <li><a href="/users/logout"> Deconnexion </a></li>
            <?php else : ?>
                <li><a href="/users/login"> Login </a></li>
            <?php endif; ?>
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
        <?php if(!empty($_SESSION['erreur'])) : ?>
            <div class="erreur">
                <?php echo $_SESSION['erreur']; unset($_SESSION['erreur']); ?>
            </div>
        <?php endif ;?>
        <?= $content; ?>
    </main>
    <footer>
        <div class="social">
            <div class="circle"><i class="fa-brands fa-instagram"></i></div>
            <div class="circle"><i class="fa-brands fa-tiktok"></i></div>
            <div class="circle"><i class="fa-brands fa-twitter"></i></div>
        </div>
        <nav>
            <a href="#"> Accueil </a>
            <a href="#"> Inscription </a>
            <a href="#">Politque de confidentialié</a>
            <a href="#"> Contact </a>
        </nav>
        <p> &copy; 2023 tout droit réservés</p>
    </footer>


    <script src="/assets/js/script.js"></script>
</body>
</html>