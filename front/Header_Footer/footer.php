<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../CSS/footer.css" type="text/css">
    <title><?= isset($title)?$title:"" ?></title>
</head>

<body>
    <div class="header">
        <img class="logo" />
        <ul class="menu">
            <li class="menu-item"><a href="#">Accueil</a></li>
            <li class="menu-item"><a href="#">Cours</a></li>
            <li class="menu-item"><a href="#">Forum</a></li>
            <li class="menu-item">
                <ul class="submenu">
                    <li class="menu-item connexion"><a href="#">CONNEXION</a></li>
                    <li class="menu-item inscription"><a href="#">INSCRIPTION</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <?= isset($content)?$content:"" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <?= isset($scripts)?$scripts:"" ?>
</body>

</html>