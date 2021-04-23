<link rel="stylesheet" href="/front/CSS/Forum/index.css" type="text/css">
<body>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/back/class/categorie.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/back/controllers/Forum.php");

$categorie = categorie::getAll();
$convWeb = recupConv("Web");
$convApp = recupConv("App");

?>


<div class="forum_header">
<h3>Message de la page</h3>
    <p>
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
        Description rapide
    </p>
</div>
<div class="forum_category">
    <h3>Dev web</h3>
    <table class="forum_category_table">
        <tbody>
        <?php
		if($convWeb != null)
		{
			for($i = 0; $i < count($convWeb);$i++)
			{
				echo "<tr><td onclick='/front/PHP/Cours/structureCours.php?id='>".$convWeb[$i]["titre"]."</td></tr>";
			}
		}
		?>
        </tbody>
    </table>
</div>
<div class="forum_category">
    <h3>Dev apps</h3>
    <table class="forum_category_table">
        <tbody>
        <?php
		if($convApp != null)
		{
			for($i = 0; $i < count($convWeb);$i++)
			{
				echo "<tr><td>".$convApp[$i]["titre"]."</td></tr>";
			}
		}
		?>
        </tbody>
    </table>
</div>
</body>