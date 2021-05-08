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

let formChild = document.form;
function FormPost(child)
{
  let temp = child;
  let array = [];
  if(temp = null)
  {
    return;
  }
  let j = 0
  for(let i = 0; i < child.childNodes.length; i++)
  {
    if((child.childNodes[i].nodeName == "INPUT" && (child.childNodes[i].type != "button") && (child.childNodes[i].type != "submit")) || child.childNodes[i].nodeName == "TEXTAREA")
    {
      array[j] = child.childNodes[i].value;
      j++;
    }

    let rep = FormPost(child.childNodes[i]);
    for(let k = 0; k < rep.length; k++)
    {
      array[j] = rep[k];
      j++;
    }
  }
  return array;
}

function SommairePost(child)
{
  let temp = child;
  let array = [];
  if(temp = null)
  {
    return;
  }
  let j = 0
  for(let i = 0; i < child.childNodes.length; i++)
  {
    if(child.childNodes[i].nodeName == "LI")
    {
      array[j] = child.childNodes[i].textContent;
      j++;
    }

    let rep = SommairePost(child.childNodes[i]);
    for(let k = 0; k < rep.length; k++)
    {
      array[j] = rep[k];
      j++;
    }
  }
  return array;
}

function Envoie()
{ 
  let arraytest = FormPost(document.getElementsByClassName('createCours')[0]);
  let arraytest2 = SommairePost(document.getElementById("sommaire"));
  let arraytest3 = createView(arraytest,arraytest2);
  for(let i = 0; i < arraytest3.length;i++)
  {
      console.log('Contenue Sommaire '+i+' : '+arraytest3[i]);
  }
}

function createView(array,sommaire)
	{
		let Chap = new Array();
		let liste = [];
		liste[0] = "<body class='light' onload='setFollowValue()'> <div id='progress'></div>";
		liste[1] = "<h3 id='bvn'>"+array[0]+"</h3>";
		liste[2] = "<button id='abonnement' type='button' value='S\'abonner' onclick='AboDesabo()'>S'abonner</button>";
		
		liste[3] = "<div id='line0'><hr></div>";
		liste[4] = "<div id='apprendre'> <p id='titre'> Ce que vous allez apprendre : </p> <p>"+array[1]+"</p> </div>";
		liste[5] = "<div id='sommaire'> <h3> Sommaire : </h3>";
		let indice = 5;
		let n_chapitre = 0;
		let n_section = 0;
		let n_section_max = 0;
		for(let i=0;i < sommaire.length ; i++)
		{
			if(sommaire[i].includes("Chapitre"))
			{
				n_section_max += n_section;
				let chapitre = sommaire[i].split(' ');
				n_chapitre = parseInt(chapitre[1]);
				if(chapitre[1] != "1")
				{
					Chap.push(n_section);
					liste[i+5] += "</ul> </ul>";
				}
				liste[i+6] = "<ul class='m_Chapitre' id='Chapitre_"+chapitre[1]+"'>";
				liste[i+6] += "<a onclick='afficherMasquer(\"listeChapitre"+chapitre[1]+"\")'><li>"+sommaire[i]+"</li></a>";
				liste[i+6] += "<ul id='listeChapitre"+chapitre[1]+"' class='m_Section' style='display: none;'>";
			}
			else
			{
				let section = sommaire[i].split('n');
				n_section = parseInt(section[1]);
				liste[i+6] = "<li class='liste'><a href='#Chapitre"+n_chapitre+"_Section"+n_section+"'>Section"+section[1]+"</a></li>";
			}
			if(i == sommaire.length-1)
			{
				if(!sommaire[i].includes("Chapitre"))
					Chap.push(n_section);
				n_section_max += n_section;
				liste[i+6] += "</ul> </ul>";
				indice += i+2;
			}
		}
		liste[indice] = "</div> <div id='Cours'>";
		indice = indice+1;
		n_section = 0 ;
		for(let i = 0; i < n_chapitre; i++)
		{
			let iC = i+1;
			liste[indice] = "<h1 class='Chapitre' id='Chapitre"+iC+"'>"+array[i+2*n_section+2]+"</h1>";
			indice++;
			for(let j = 1;j <= Chap[i];j++)
			{
				liste[indice] = "<h2 class='Section' id='Chapitre"+iC+"_Section"+j+"'>"+array[i+2*n_section+2+j+(j-1)]+"</h2>"
				liste[indice] += "<p>"+array[i+2*n_section+3+j+(j-1)]+"</p>"
				console.log(i+2*n_section+2+j+(j-1));
				indice++;
			}
			n_section += Chap[i];
		}
		console.log(array);
		liste[indice] = "</div> </body>";
		return liste;
		
	}

