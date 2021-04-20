<!DOCTYPE html>
<html lang="fr">

<link rel="stylesheet" href="../../CSS/Forum/index.css" type="text/css">
<?php
include_once(__DIR__ . "./../../Header_Footer/header.php");
?>
<body>

<div class="forum_header">
  <h3>Forum HTML</h3>
  <p>
    Forum sur le HTML, c'est trop bien, apprenez à faire des div et techniquement y'a que ça. HTML5 est trop permissif, dans tous les cas ce que vous ferez sera correct
  </p>
</div>
<div class="forum_category">
  <h3>Dev web</h3>
  <table class="forum_category_table">
    <tbody>
    <tr>
      <td onclick=location.href="conversation.php?id=1">Comment faire de la ratatouille en html ?</td>
    </tr>
    <tr>
      <td>c quoi un div</td>
    </tr>
    <tr>
      <td>aide projet info fac svp</td>
    </tr>
    <tr>
      <td>attention au html Jojo</td>
    </tr>
    </tbody>
  </table>
</div>


</body>


<?php include(__DIR__ . './../../Header_Footer/footer.php') ?>
</html>