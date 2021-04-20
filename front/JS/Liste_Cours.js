let search = document.getElementById("searchBox");
let html = document.getElementById("html_cours");
let css = document.getElementById("css_cours");
let js = document.getElementById("js_cours");

function updateCours(cours) {
    html.innerHTML = "";
    css.innerHTML = "";
    js.innerHTML = "";
    for (let i = 0; i < cours.length; i++) {
        let node = document.createElement("div");
        node.onclick=()=>{location.href='/front/PHP/Cours/structureCours.php'};
        let img = document.createElement("img");
        img.src = "/front/IMG/girl.png";
        img.className = "box1"

        let title = document.createElement("h3");
        title.className = "box2";
        title.innerText = cours[i].nom;

        let diff = document.createElement("p");
        diff.className = "box3";
        for (let i2 = 0; i2 < 3; i2++)
            diff.innerText += cours[i].difficulte > i2 ? '★' : '✩'

        let desc = document.createElement("p");
        desc.className = "box4";
        desc.innerText = cours[i].description;

        node.className = "cours";
        node.appendChild(img);
        node.appendChild(title);
        node.appendChild(diff);
        node.appendChild(desc);
        switch (cours[i].categorie){
            case 1:
                html.appendChild(node);
                break;
            case 2:
                css.appendChild(node);
                break;
            case 3:
                js.appendChild(node);
        }


    }
}

search.oninput = () => {
    nouveauxCours = cours.filter(e=>e.nom.toLowerCase().includes(search.value.toLowerCase()) || (e.description !== undefined && e.description.toLowerCase().includes(search.value.toLowerCase())))
    updateCours(nouveauxCours);
}
