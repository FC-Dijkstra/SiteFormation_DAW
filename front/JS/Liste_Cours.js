let search = document.getElementById("searchBox");
let container = $($(".cours_container")[0])

function updateCours(cats, type) {
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
    for(let j=0; j<cats.length; j++)
    {
        let cours = cats[j]
        for (let i = 0; i < cours.length; i++) {
            let node = document.createElement("div");
            node.onclick=()=>{location.href='/index.php?page=structureCours&id='+cours[i].id};
            let img = document.createElement("img");
            img.src = "/front/IMG/girl.png";
            img.className = "box1"

            let title = document.createElement("h3");
            title.className = "box2";
            title.innerText = cours[i].nom;

            let diff = document.createElement("p");
            diff.className = "box3";
            /*for (let i2 = 0; i2 < 3; i2++)
                diff.innerText += cat[i].difficulte > i2 ? '★' : '✩'*/
            switch (cours[i].difficulte) {
                case 'Débutant':
                    diff.innerText = '★✩✩✩';
                    break;
                case 'Intermédiaire':
                    diff.innerText = '★★✩✩';
                    break;
                case 'Avancé':
                    diff.innerText = '★★★✩';
                    break;
                case 'Expert':
                    diff.innerText = '★★★★';
                    break;
            }

            let desc = document.createElement("p");
            desc.className = "box4";
            desc.innerText = cours[i].description;

            node.className = "cours";
            node.appendChild(img);
            node.appendChild(title);
            node.appendChild(diff);
            node.appendChild(desc);
            $(".cours_"+listCat.find(e=>e.id===cours[i].categorie).titre.split('/')[1]).append(node)



        }
    }
}

search.oninput = () => {
    nouvellesCats = [];
    cats.forEach(cat=>{
        nouvellesCats.push(cat.filter(e=>e.nom.toLowerCase().includes(search.value.toLowerCase()) || (e.description !== undefined && e.description.toLowerCase().includes(search.value.toLowerCase()))))
    })
    updateCours(nouvellesCats, "Web/");
}
