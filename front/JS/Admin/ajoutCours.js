let nombreChap = 1;
let nombreSection =1;


function updateSommaire()
{
  $("#sommaire").empty();

  //Create chapitres
  let chapitres = $("#Cours").children();
  for(let i = 0; i < chapitres.length;i++)
  {

    let chapitre = chapitres[i];
    chapitre.children[0].innerText="Chapitre "+(i+1);
    chapitre.children[1].placeholder="Titre du Chapitre "+(i+1);
    


    let chapSommaire = document.createElement("ul");
    chapSommaire.id="Chapitre_"+(i+1);
    chapSommaire.className="m_Chapitre";

    let aSommaire = document.createElement("a");
    aSommaire.onclick=()=>{afficherMasquer("listeChapitre"+(i+1))};

    let li_aSommaire = document.createElement("li");
    li_aSommaire.textContent="Chapitre "+(i+1);

    aSommaire.append(li_aSommaire);

    let lstchap = document.createElement("ul");
    lstchap.id="listeChapitre"+(i+1);
    lstchap.className="m_section";
    lstchap.style="display: none;"

    indexSection = ($($(".Chapitre")[(i)]).children(".LesSections").children());



    for(let j = 0; j < indexSection.length; j++)
    {

      indexSection[j].children[0].innerText="Section "+(j+1);
      indexSection[j].children[1].placeholder="Titre de la Section "+(j+1);
      indexSection[j].children[1].id="Chapitre"+(i+1)+"_Section"+(j+1);
      indexSection[j].children[indexSection[j].children.length-1].id="sectiontxt"+(j+1);

      let sommaireSection = document.createElement("li");
      sommaireSection.className="liste";

      let asommaireSection = document.createElement("a");
      asommaireSection.href="#Chapitre"+(i+1)+"_Section"+(j+1);
      asommaireSection.textContent="Section"+(j+1);

      sommaireSection.append(asommaireSection);
      console.log(  $("#listeChapitre"+(i+1)));
      lstchap.append(sommaireSection);
    }

    chapSommaire.append(aSommaire);
    chapSommaire.append(lstchap);

    $("#sommaire").append(chapSommaire);

  }

  

  //create section
}
function removeChap(elem)
{
  $(elem).parent('div').remove();
  nombreChap--; 
  updateSommaire()
}

function removeSection(elem)
{
  $(elem).parent('div').remove();
  nombreSection--;
  updateSommaire()
}

function addChap()
{
    nombreChap++;
    //Element sommaire

    

    //Element page
    let chapelement = document.createElement("div");
    chapelement.className="Chapitre";

    let chaplabel = document.createElement("label");
    chaplabel.textContent = "Chapitre "+nombreChap;

    let chaptext = document.createElement("input");
    chaptext.placeholder = "Titre du Chapitre "+nombreChap;
    chaptext.type="text";

    let chapbutton = document.createElement("input");
    chapbutton.onclick=()=>removeChap(chapbutton);
    chapbutton.value="X";
    chapbutton.type="button";

    let breuh = document.createElement("br");

    let chapsection = document.createElement("div");
    chapsection.className="LesSections";

    let chapadd = document.createElement("button");
    chapadd.className="addSection";
    chapadd.type = "button";

    let chap = nombreChap;
    chapadd.onclick=()=>{addSection(chapelement)};
    chapadd.textContent="Ajouter une section";

    chapelement.append(chaplabel);
    chapelement.append(chaptext);
    chapelement.append(chapbutton);
    chapelement.append(breuh);
    chapelement.append(breuh.cloneNode());
    chapelement.append(chapsection);
    chapelement.append(chapadd);

    $("#Cours").append(chapelement);

    updateSommaire()
}

function addSection(chapelement)
{
    /*
    Quand click sur bouton ajout section
    */


    nombreSection++;
    indexSection = $(chapelement).children(".LesSections").children().length +1; 

    //sommaire ajout section

    //Element AddSection


    let element = document.createElement("div");
    element.className="Section";

    let label = document.createElement("label");
    label.innerText="Section "+indexSection;
    label.id="Chapitre"+chapelement+"_Section"+indexSection;
    
    let texte = document.createElement("input");
    texte.placeholder="Titre de la section"+indexSection;
    texte.type="text";

    let boutton = document.createElement("input");
    boutton.type="button";
    boutton.onclick=()=>removeSection(boutton);
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

    let chapitres = $(".Chapitre");
    let i =0;

    for(;i<chapitres.length;i++)
      if(chapitres[i] === chapelement)
        break;

    $($(".Chapitre")[(i)]).children(".LesSections")[0].append(element); 

    updateSommaire()
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