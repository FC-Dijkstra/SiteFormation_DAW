function ModifierInfos()
{
    if(document.getElementById("info_nom").readOnly == false)
    {
        document.getElementById("info_nom").readOnly = true;
        document.getElementById("info_prenom").readOnly = true;
        document.getElementById("info_mail").readOnly = true;
        
        $(".mdp").hide();
        $("#enregistrer").hide();
        $("#annuler").hide();
        $(".file").hide();

        $("#modifier").show();
    }
    else
    {
        document.getElementById("info_nom").readOnly = false;
        document.getElementById("info_mail").readOnly = false;
        document.getElementById("info_prenom").readOnly = false;

        $(".mdp").show();
        $("#enregistrer").show();
        $("#annuler").show();
        $(".file").show();
        
        $("#modifier").hide();
    }
}