<!DOCTYPE html>
<html lang="fr" >
<?php include_once ('../Header_Footer/header.php'); ?>
<link rel="stylesheet" href="../CSS/accueil.css" type="text/css"/>
<body>
<h2> Bienvenue sur notre site de cours en ligne ! </h2>
<hr>
<div id="debut">
  <img src="../IMG/logo.PNG">
  <h3> Apprenez à plusieurs !
  <p> Rejoignez notre communauté. Les enseignants postent des cours très souvent et les élèves peuvent s'aider au besoin dans notre forum. </p>
</div>

<div id="presentation">
  <div id="droite">
    <img src="../IMG/logo.PNG">
    <h3> Des enseignants là pour vous apprendre à devenir des professionnels
    <p> Nous nous efforçons à vous proposer un contenu ludique, complet et formateur. Nous, les enseignants, sommes qualifiés, nous vous écrivons donc des cours digne de confiance, pour vous apprendre à développer le plus rapidement possible. </p>
  </div>
  <div id="gauche">
    <img src="../IMG/logo.PNG">
    <h3> Apprenez depuis votre canapé !
    <p> Apprenez différents langages de programmation (développement web, développement d'application...) gratuitement et ceux, depuis chez vous !</p>
  </div>
</div>

<hr>
<div id="cours">
  <h2> Différentes catégories de cours sont disponibles </h2>
  <a href="/front/PHP/Cours/web.php">
  <img class="hbox1" src="/front/IMG/logo.png"/></a>
  <a href="/front/PHP/Cours/application.php">
  <img class="hbox1" src="/front/IMG/logo.png"/></a>
</div>

<hr>
<div id="forum">
  <h2> Venez parler avec les autres étudiants sur nos forums !</h2>
  <input id="bouton" type="button" value="Forum">
</div>

</body>
<?php include ('../Header_Footer/footer.php'); ?>
</html>
