<link rel="stylesheet" href="/front/CSS/Forum/index.css" type="text/css">
<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . "/back/class/categorie.php");
	include_once($_SERVER['DOCUMENT_ROOT'] . "/back/controllers/Forum.php");
	$id = $_GET['id'];
	$conversations = recupConvById($id);
	$cateName = categorie::getById($id);
?>
<body>

<div class="forum_header">
  <h3>Forum <?php echo $cateName["titre"];?></h3>
</div>
<div class="forum_category">
  <table class="forum_category_table">
    <tbody>
		<?php
		
			for($i = 0; $i < count($conversations);$i++)
			{
				$idconv = $conversations[$i]["id"];
				echo "<tr><td onclick=location.href=\"index.config php?page=messagesForum&id=$idconv\"> ".$conversations[$i]["titre"]."</td></tr>";
			}
		?>
    </tbody>
  </table>
</div>
</body>