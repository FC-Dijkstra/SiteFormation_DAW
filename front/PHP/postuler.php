<link rel="stylesheet" href="/front/CSS/postuler.css" type="text/css"/>
<script type="text/javascript" src="/front/JS/postuler.js"></script>
<form  method="post">
<body id="body">
<div id="progress"></div>
 <p id="debut">
    		Pour pouvoir nous rejoindre, et devenir l'un de nos enseignants, </br>veuillez remplir le formulaire suivant.</p>

<div id="line0"><hr></div>
 <p id="debut2">Nous allons vous demander plusieurs informations vous concernant. A la fin de ce formulaire, votre candidature sera prise en compte si toutes les informations sont bien remplies. </p>
 <p id="civilite">
   Civilité :      <select name="civilité" >
                    <option value="madame">Madame</option>
                    <option value="monsieur">Monsieur</option>
                    <option value="aucun">Non pr&eacute;cis&eacute;</option>
                  </select>
                  <br/>

 		Nom :      <input type="text" size="20" name="nom" required="required"/><br/>
 		Pr&eacute;nom :      <input type="text" size="20" name="prenom" required="required"/><br/>
    Adresse mail :      <input type="email" size="20" name="email" required="required"/><br/>
    Num&eacute;ro de t&eacute;l&eacute;phone :      <input type="tel" size="20" name="tel" required="required"/><br/>
  </p>
  <div id="line1"><hr></div>
  <div id="line1"><hr></div>
  <p id="xp">
 		Quelles sont vos expériences professionnelles ?      <input type="text" size="20" name="expériences" required="required"/><br/></p>
    <div id="line2"><hr></div>
    <div id="line2"><hr></div>
  <p id="motiv">
    Quelles sont vos motivations ?      <input type="text" size="20" name="motivations" required="required"/><br/></p>
    <div id="line3"><hr></div>
    <div id="line3"><hr></div>
  <p id="coursenseigner">
 		Cochez les cours pour lesquels vous voulez enseigner :      <div>
                                                                  <input type="checkbox" id="html" name="html">
                                                                  <label for="html">HTML</label>
                                                                </div>
                                                                <div>
                                                                  <input type="checkbox" id="css" name="css">
                                                                  <label for="css">CSS</label>
                                                                </div>
                                                                <div>
                                                                  <input type="checkbox" id="js" name="js">
                                                                  <label for="js">JavaScript</label>
                                                                </div>
                                                                <div>
                                                                  <input type="checkbox" id="c" name="c">
                                                                  <label for="c">C</label>
                                                                </div>
                                                                <div>
                                                                  <input type="checkbox" id="cplus" name="cplus">
                                                                  <label for="cplus">C++</label>
                                                                </div>
                                                                <div>
                                                                  <input type="checkbox" id="java" name="java">
                                                                  <label for="java">Java</label>
                                                                </div>
                                                                <div>
                                                                  <input type="checkbox" id="php" name="php">
                                                                  <label for="php">PHP</label>
                                                                </div>
                                                                <br/>
                                                                </p>
 <input type="submit" value="envoyer" class="button2"><input type="reset" value="effacer" class="button3">
 </p>
 </form>
 <?php
    if(isset($_POST['message'])){
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: ' . $_POST['email'] . "\r\n";

        $message = '<h1>Message envoyé depuis la page "devenir enseignant" du site</h1>
        <p><b>Nom : </b>' . $_POST['nom'] . '<br>
        <b>Prenom : </b>' . $_POST['prenom'] . '<br>
        <b>Email : </b>' . $_POST['email'] . '<br>
        <b>Telephone : </b>' . $_POST['tel'] . '<br>
        <b>Experiences : </b>' . $_POST['experiences'] . '<br>
        <b>Motivations : </b>' . $_POST['motivations'] . '</p>'

        ;


        $retour = mail('Camille.dardoize.romsie@gmail.com', 'Envoi depuis page Contact', $message, $entete);
        if($retour) {
            echo '<p>Votre message a bien été envoyé.</p>';
        }
    }
    ?>
</body>
