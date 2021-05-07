function ModifierInfos()
{
    if(document.getElementById("info_nom").readOnly == false)
    {
        console.log("lock")
        $("#info_nom, #info_prenom, #info_mail").attr("readonly", true);
        $(".mdp, #enregistrer, #annuler, .file").hide();
        $("#modifier").show();
    }
    else
    {
        console.log("unlock");

        $("#info_nom, #info_mail, #info_prenom").attr("readonly", false);
        $(".mdp, #enregistrer, #annuler, .file").show();
        $("#modifier").hide();
    }
}

$(document).ready(function(){
   $("#conf_npassword").on("input", function()
   {
       if ($("#npassword").val() != $("#conf_npassword").val())
       {
           console.log("diff");
           document.getElementById("conf_npassword").setCustomValidity("Les mots de passe sont différents");
           document.getElementById("conf_npassword").reportValidity();
       }
       else
       {
           console.log("nodiff");
           document.getElementById("conf_npassword").setCustomValidity('');
           document.getElementById("conf_npassword").validity = ValidityState.valid;
           document.getElementById("conf_npassword").reportValidity();
       }
   })
});