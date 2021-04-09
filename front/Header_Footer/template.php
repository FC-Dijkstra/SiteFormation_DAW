<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../CSS/menu.css" type="text/css">
    <title><?= isset($title)?$title:"" ?></title>
</head>

<header>
    <div class="header">
        <img class="logo" src="../IMG/logo.png" alt="Logo" />
        <ul class="menu">
            <li class="menu-item"><a href="accueil.php">Accueil</a></li>
            <li class="menu-item"><a href="cours.php">Cours</a></li>
            <li class="menu-item"><a href="forum.php">Forum</a></li>
            <li class="menu-item">
                <ul class="submenu">
                    <li class="menu-item connexion"><a href="#">CONNEXION</a></li>
                    <li class="menu-item inscription"><a href="#">INSCRIPTION</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <?= isset($content)?$content:"" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?= isset($scripts)?$scripts:"" ?>
</header>
