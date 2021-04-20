function change(moi)
{
  if (document.formulaire.elements[moi].checked == true)
  {
    document.getElementById(moi).style.backgroundColor = 'red';
  }
  else
  {
    document.getElementById(moi).style.backgroundColor = 'blue';
  }
}

$("#moi").click(fonction(){
  if(this.checked){
    document.getElementById(moi).style.backgroundColor = 'red';
  }
}

function ban(){
  $("#raisonBan").show();
}
