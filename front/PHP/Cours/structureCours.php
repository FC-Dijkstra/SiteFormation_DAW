<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/back/controllers/AffichageCours.php");
?>
<link rel="stylesheet" href="/front/CSS/structureCours.css" type="text/css"/>
<div id="progress"></div>
<script type="text/javascript" src="/front/JS/structureCours.js"></script>

<div style="display: none;" id="csrf"><?= Token::get()?></div>
<div style="display: none;" id="cours"><?= Input::get("id")?></div>
<div style="display: none;" id="isFollowing"><?= isFollowing(Input::get("id")) == true ? "true" : "false"?></div>
<?php
	
	$html = returnView($_GET['id']);
	for($i = 0;$i < count($html);$i++)
	{
		echo $html[$i];
	}
?>