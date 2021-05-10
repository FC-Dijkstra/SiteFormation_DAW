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

$(document).ready(function()
{
  $(window).on("scroll", function()
  {
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
    document.getElementById("progress").style.width = barre +"px";
  });
});


function AboDesabo()
{
  if($("#abonnement").text() == "S'abonner"){
    $("#abonnement").text("Se désabonner");
    let csrf = $("#csrf").text();
    let id = $("#cours").text();
    $.ajax({
      url: "/back/router.php",
      type: "POST",
      data: { action: "follow", csrf_token: csrf, cours: id},
      success: function(html){ alert(html);},
      error: function(result, status, error){alert("Erreur: " + error + " resultat: " + result + " statut: " + status)}
    });
  }
  else{
    $("#abonnement").text("S'abonner");
    let csrf = $("#csrf").text();
    let id = $("#cours").text();

    $.ajax({
      url: "/back/router.php",
      type: "POST",
      data: {action: "unfollowAsync", csrf_token: csrf, cours: id},
      success: function(html){alert(html);},
      error: function(result, status, error){alert("Erreur: " + error + " resultat: " + result + " statut: " + status)}
    })
  }
}

function setFollowValue()
{
  let followValue = $("#isFollowing").text();
  if (followValue === "true")
    $("#abonnement").text("Se désabonner");
  else if (followValue === "false")
    $("#abonnement").text("S'abonner");
}