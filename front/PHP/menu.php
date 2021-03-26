<?php ob_start(); ?>
<link rel="stylesheet" href="../CSS/menu.css" type="text/css">
<?php $css = ob_get_clean(); ?>
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