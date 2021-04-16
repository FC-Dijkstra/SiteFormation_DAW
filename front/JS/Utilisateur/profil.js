function ModifierInfos()
{
    if(document.getElementById("info_nom").readOnly == false)
    {
        document.getElementById("info_nom").readOnly = true;
        document.getElementById("info_prenom").readOnly = true;
        document.getElementById("info_mail").readOnly = true;
        document.getElementById("modifier").innerHTML = "Modifier";
        $(".mdp").hide();
        $("#enregistrer").hide();
    }
    else
    {
        document.getElementById("info_nom").readOnly = false;
        document.getElementById("info_mail").readOnly = false;
        document.getElementById("info_prenom").readOnly = false;
        
        document.getElementById("modifier").innerHTML = "Annuler";
        $(".mdp").show();
        $("#enregistrer").show();
    }
}