function afficherMasquer(id)
{
  if(document.getElementById(id).style.display == "none")
  {
    document.getElementById(id).style.display = "block";
    document.getElementById(id).parentElement.style.listStyleType= "disclosure-open";
  }
  else
  {
    document.getElementById(id).style.display = "none";
    document.getElementById(id).parentElement.style.listStyleType= "disclosure-closed";
  }
}

window.onload = () => {
  window.addEventListener("scroll", () => {
    //gestion du défilement de la barre
    //quand on est tout en bas : toute la largeur
    let hauteur = document.documentElement.scrollHeight - window.innerHeight
    //on récupère la hauteur du scroll
    let position = window.scrollY
    //on récupère la largeur de la fenetre
    let largeur = document.documentElement.clientWidth
    //on calcule la largeur de la barre de progression
    let barre = position / hauteur * largeur
    //modification du css de la barre
    document.getElementById("progress").style.width = barre +"px"
  })
}

function AboDesabo()
{
  if(document.getElementById("abonnement").innerHTML == "S'abonner"){
    document.getElementById("abonnement").value = "Se désabonner";
    document.getElementById("abonnement").innerHTML = "Se désabonner";
    // TODO: ajax to /back/router.php&action=follow&cours=<ID>&csrf_token=<?= $_SESSION["csrf_token"]?>
    // (ping Yann)
  }
  else{
    document.getElementById("abonnement").value = "S'abonner";
    document.getElementById("abonnement").innerHTML = "S'abonner";
    // TODO: ajax to /back/router.php?action=unfollow&cours=<ID>&csrf_token=<?= $_SESSION["csrf_token"]?>
    // (ping Yann)
  }
}
