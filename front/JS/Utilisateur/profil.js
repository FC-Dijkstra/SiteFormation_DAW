function ModifierInfos()
{
    if(document.getElementById("info_nom").readOnly == false)
    {
        document.getElementById("info_nom").readOnly = true;
        document.getElementById("info_prenom").readOnly = true;
        document.getElementById("info_mail").readOnly = true;
        document.getElementById("modifier").innerHTML = "Modifier";
       
    }
    else
    {
        document.getElementById("info_nom").readOnly = false;
        document.getElementById("info_mail").readOnly = false;
        document.getElementById("info_prenom").readOnly = false;
        
        document.getElementById("modifier").innerHTML = "Enregistrer";
    }
    
}