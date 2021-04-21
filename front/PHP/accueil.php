<!DOCTYPE html>
<html lang="fr" >
<?php include_once ('../Header_Footer/header.php'); ?>
<link rel="stylesheet" href="../CSS/accueil.css" type="text/css"/>
<body>
<h2 id="bvn"> Bienvenue sur notre site de cours en ligne ! </h2>
<hr>
<div id="debut">
  <img src="../IMG/logo.PNG">
  <h3> Apprenez à plusieurs !</h3>
  <p> Rejoignez notre communauté. Les enseignants postent des cours très souvent et les élèves peuvent s'aider au besoin dans notre forum. </p>
</div>

<div id="presentation">
  <div id="gauche">
    <img src="../IMG/enseignants.PNG">
    <h3> Des enseignants là pour vous apprendre le meilleur</h3>
    <p> Nous nous efforçons à vous proposer un contenu ludique, complet et formateur. Nous, les enseignants, sommes qualifiés, nous vous écrivons donc des cours digne de confiance, pour vous apprendre à développer le plus rapidement possible. </p>
  </div>
  <div id="milieu">
    <img src="../IMG/canape.PNG">
    <h3> Apprenez depuis votre canapé !</h3>
    <p> Apprenez différents langages de programmation (développement web, développement d'application...) gratuitement et ceux, depuis chez vous !</p>
  </div>
  <div id="droite">
    <img src="../IMG/pro.PNG">
    <h3> Débutant, amateur ou expert ?</h3>
    <p> Nous donnons des cours pour tout type de niveau ! Et si vous ne savez pas quel niveau vous avez, faites nos qcm pour avoir des recommandations !</p>
  </div>
</div>

<hr>
<div id="cours">
  <h3> Différentes catégories de cours sont disponibles </h3>
  <a href="/front/PHP/Cours/web.php">
  <img class="hbox1" src="/front/IMG/logo.png"/></a>
  <a href="/front/PHP/Cours/application.php">
  <img class="hbox1" src="/front/IMG/logo.png"/></a>
</div>

<hr>
<div id="forum">
  <h3> Venez parler avec les autres étudiants sur nos forums !</h3>
  <input id="bouton" type="button" value="Forum">
</div>

</body>
<?php include ('../Header_Footer/footer.php'); ?>
</html>
