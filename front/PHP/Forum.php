<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../CSS/menu.css" type="text/css">
        <title><?= $title ?></title>
    </head>
    
    <header>
        <div class="header">
            <img class="logo" />
            <ul class="menu">
                <li class="menu-item"><a href="Accueil.html">Accueil</a></li>
                <li class="menu-item"><a href="Cours.html">Cours</a></li>
                <li class="menu-item"><a href="#">Forum</a></li>
                <li class="menu-item">
                    <ul class="submenu">
                        <li class="menu-item connexion"><a href="#">CONNEXION</a></li>
                        <li class="menu-item inscription"><a href="#">INSCRIPTION</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?= $content ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
        <?= $scripts; ?>
    </header>

</html>