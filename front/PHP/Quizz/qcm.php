<!DOCTYPE html>
<html lang="fr" >
<?php
include_once("../../Include/header_base.php");
?>
<link rel="stylesheet" href="/front/CSS/Quizz/qcm.css" type="text/css"/>
<script type="text/javascript" src="/front/JS/qcm.js"></script>
<body class="light">
<div id="centre">
<div id="progress"></div>

<h3 id="bvn"> Teste ton niveau ! </h3>
<div id="qcm">
<br/>
<br/>
<fieldset>
  <legend>Question 1</legend><br/>
  <input type="radio" name="11" value="11"/><span class="reponse">Reponse1</span><br/>
  <input type="radio" name="12" value="12"/><span class="reponse">Reponse2</span><br/>
  <input type="radio" name="13" value="13"/><span class="reponse">Reponse3</span><br/><br/>
</fieldset>
<br/>
<br/>
<fieldset>
  <legend>Question 2</legend><br/>
  <input type="radio" name="21" value="21"/><span class="reponse">Reponse1</span><br/>
  <input type="radio" name="22" value="22"/><span class="reponse">Reponse2</span><br/>
  <input type="radio" name="23" value="23"/><span class="reponse">Reponse3</span><br/><br/>
</fieldset>
<br/>
<br/>
<fieldset>
  <legend>Question 3</legend><br/>
  <input type="radio" name="31" value="31"/><span class="reponse">Reponse1</span><br/>
  <input type="radio" name="32" value="32"/><span class="reponse">Reponse2</span><br/>
  <input type="radio" name="33" value="33"/><span class="reponse">Reponse3</span><br/><br/>
</fieldset>
<br/>
<br/>
<fieldset>
  <legend>Question 4</legend><br/>
  <input type="radio" name="41" value="41"/><span class="reponse">Reponse1</span><br/>
  <input type="radio" name="42" value="42"/><span class="reponse">Reponse2</span><br/>
  <input type="radio" name="43" value="43"/><span class="reponse">Reponse3</span><br/><br/>
</fieldset>
<br/>
<br/>
<fieldset>
  <legend>Question 5</legend><br/>
  <input type="radio" name="51" value="51"/><span class="reponse">Reponse1</span><br/>
  <input type="radio" name="52" value="52"/><span class="reponse">Reponse2</span><br/>
  <input type="radio" name="53" value="53"/><span class="reponse">Reponse3</span><br/><br/>
</fieldset>
<br/>
<br/>
<fieldset>
  <legend>Question 6</legend><br/>
  <input type="radio" name="61" value="61"/><span class="reponse">Reponse1</span><br/>
  <input type="radio" name="62" value="62"/><span class="reponse">Reponse2</span><br/>
  <input type="radio" name="63" value="63"/><span class="reponse">Reponse3</span><br/><br/>
</fieldset>
<input id="bouton" type="button" value="Valider">
<br/>
<br/>
</div>
<br/>
<br/>
</fieldset>
</div>
</body>
<?php include('../../Include/footer.php') ?>
</html>
