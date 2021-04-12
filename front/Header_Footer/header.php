<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/front/CSS/header.css" type="text/css">
    <script type="text/javascript" src="/front/JS/Sombre.js"></script>
    <title><?= isset($title)?$title:"" ?></title>
</head>

<header>
    <div class="header">
        <img class="hbox1" src="/front/IMG/logo.png" alt="Logo" />
        <ul class="hbox2">
            <li class="menu-item"><a href="/front/PHP/accueil.php">Accueil</a></li>
            <li class="menu-item"><a href="/front/PHP/cours.php">Cours</a></li>
            <li class="menu-item"><a href="/front/PHP/forum.php">Forum</a></li>
            <div class="htrait">
            </div>
        </ul>
        
        <ul class="hbox3">
            <li class="menu-item connexion"><a href="#">Connexion</a></li>
            <li class="menu-item inscription"><a href="#">Inscription</a></li>
            <li class="menu-item darkmode"><button onclick="toggleTheme()" type="button">Dark Mode</button></li>
        </ul>
       
    </div>
    <?= isset($content)?$content:"" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?= isset($scripts)?$scripts:"" ?>
</header>
