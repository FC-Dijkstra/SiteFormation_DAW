let search = document.getElementById("searchBox");
let container = $($(".cours_container")[0])

function updateCours(cours, type) {
    container.empty();
    // Création des catégories
    for(let i=0; i<listCat.length; i++){
        let titre = listCat[i].titre.replace(type, '');
        let cat = document.createElement('div');
        cat.className = titre;

        let title = document.createElement('h4');
        title.className='langage';
        title.innerText = titre;

        let cours = document.createElement('div')
        cours.className = 'cours_'+titre

        cat.append(title);
        cat.append(cours);
        container.append(cat);
    }
    for(let j=0; j<cours.length; j++)
    {
        let cat = cours[j]
        for (let i = 0; i < cat.length; i++) {
            let node = document.createElement("div");
            node.onclick=()=>{location.href='/front/PHP/Cours/structureCours.php'};
            let img = document.createElement("img");
            img.src = "/front/IMG/girl.png";
            img.className = "box1"

            let title = document.createElement("h3");
            title.className = "box2";
            title.innerText = cat[i].nom;

            let diff = document.createElement("p");
            diff.className = "box3";
            /*for (let i2 = 0; i2 < 3; i2++)
                diff.innerText += cat[i].difficulte > i2 ? '★' : '✩'*/
            diff.innerText = cat[i].difficulte

            let desc = document.createElement("p");
            desc.className = "box4";
            desc.innerText = cat[i].description;

            node.className = "cours";
            node.appendChild(img);
            node.appendChild(title);
            node.appendChild(diff);
            node.appendChild(desc);
            $(".cours_"+listCat.find(e=>e.id===cat[i].categorie).titre.split('/')[1]).append(node)



        }
    }
}

search.oninput = () => {
    nouveauxCours = cours.filter(e=>e.nom.toLowerCase().includes(search.value.toLowerCase()) || (e.description !== undefined && e.description.toLowerCase().includes(search.value.toLowerCase())))
    updateCours(nouveauxCours);
}
