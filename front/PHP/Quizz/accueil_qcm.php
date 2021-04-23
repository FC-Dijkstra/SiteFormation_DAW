<link rel="stylesheet" href="/front/CSS/Quizz/accueil_qcm.css" type="text/css"/>
<body class="light">
<div id="centre">
<h3 id="bvn"> Choisis la catégorie et teste tes connaissances ! </h3>
<div id="line0"><hr></div>
<div id="qcm">
<p id="web"> Développement web </p>
  <div id="line1"><hr></div>
  <br/>
<div>
  <a id="webhtml" href="/back/router.php?action=getQCM&id=1&csrf_token=<?= $_SESSION['csrf_token']?>"> HTML </a> <br/>
</div>
<br/>
<div>
  <a id="webcss" href="index.php?page=QCM"> CSS </a> <br/>
</div>
<br/>
<div>
  <a id="webjs" href="index.php?page=QCM"> JavaScript </a> <br/>
</div>
<p id="app"> Développement d'applications </p>
  <div id="line1"><hr></div>
  <br/>
<div>
  <a id="appjava" href="index.php?page=QCM"> Java </a> <br/>
</div>
<br/>
<div>
  <a id="appswift" href="index.php?page=QCM"> Swift </a> <br/>
</div>
</div>
<br/>
</body>
