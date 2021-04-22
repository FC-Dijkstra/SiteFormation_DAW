<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/back/controllers/AffichageCours.php");
?>
<link rel="stylesheet" href="/front/CSS/structureCours.css" type="text/css"/>
<script type="text/javascript" src="/front/JS/structureCours.js"></script>
<?php
	
	$html = returnView($_GET['id']);
	for($i = 0;$i < count($html);$i++)
	{
		echo $html[$i];
	}
?>