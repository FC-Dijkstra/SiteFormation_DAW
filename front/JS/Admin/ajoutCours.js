let nombreChap = 1;
let nombreSection =1;


function removeChap()
{

}

function removeSection()
{


}

function addChap()
{
    nombreChap++;
    
    //Element sommaire

    let chapSommaire = document.createElement("a");
    chapSommaire.onclick=()=>{afficherMasquer(this)};
    chapSommaire.textContent="Chapitre "+nombreChap;

    $(".m_chapitre").append(chapSommaire);

    //Element page
    let chapelement = document.createElement("div");
    chapelement.className="Chapitre";

    let chaplabel = document.createElement("label");
    chaplabel.textContent = "Chapitre "+nombreChap;

    let chaptext = document.createElement("input");
    chaptext.placeholder = "Titre du Chapitre "+nombreChap;
    chaptext.type="text";

    let chapbutton = document.createElement("input");
    chapbutton.value="X";
    chapbutton.type="button";

    let breuh = document.createElement("br");

    let chapsection = document.createElement("div");
    chapsection.className="LesSections";

    let chapadd = document.createElement("button");
    chapadd.className="addSection";

    let chap = nombreChap;
    chapadd.onclick=()=>{addSection(chap)};
    chapadd.textContent="Ajouter une section";

    chapelement.append(chaplabel);
    chapelement.append(chaptext);
    chapelement.append(chapbutton);
    chapelement.append(breuh);
    chapelement.append(breuh.cloneNode());
    chapelement.append(chapsection);
    chapelement.append(chapadd);

    $("#Cours").append(chapelement);
}

function addSection(numChap)
{
    /*
    Quand click sur bouton ajout section
    */
    nombreSection++;



    let element = document.createElement("div");
    element.className="Section";

    let label = document.createElement("label");
    label.innerText="Section "+nombreSection;
    
    let texte = document.createElement("input");
    texte.placeholder="Titre de la section"+nombreSection;
    texte.type="text";

    let boutton = document.createElement("input");
    boutton.type="button";
    boutton.onclick="removeSection()";
    boutton.className="delChap";
    boutton.value="X";

    let breuh = document.createElement("br");

    let area = document.createElement("textarea");
    area.className="sectiontxt";
    area.placeholder="Contenue de section";

    //id peut etre a mettre
    element.append(label);
    element.append(texte);
    element.append(boutton);
    element.append(breuh); element.append(breuh.cloneNode());
    element.append(area);


    $($(".Chapitre")[(numChap-1)]).children(".LesSections")[0].append(element); 
}
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