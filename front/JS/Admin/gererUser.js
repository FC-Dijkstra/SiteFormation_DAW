$(document).ready(function() {
  $("#supp").on("click", deleteUser);
});

function deleteUser()
{
  let id = $("input[type=radio]:checked").val();
  let csrf = $("#csrf").val();
  console.log(id);
  $.ajax({
    url: "/back/router.php",
    type: "POST",
    data: {action: "deleteUser", csrf_token: csrf, utilisateur: id },
    success: function(html){alert(html); document.location.reload();},
    error: function(result, status, error){alert("Erreur: " + error + " resultat: " + result + " statut: " + status);}
  });
}
