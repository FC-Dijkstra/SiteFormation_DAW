<!DOCTYPE html>
<html lang="fr" >
<link rel="stylesheet" href="/front/CSS/Admin/ajoutCours.css" type="text/css"/>
<script type="text/javascript" src="/front/JS/structureCours.js"></script>
<div id="progress"></div>
<body>
<form class="createCours">
    <input class="text" id="bvn" placeholder="Titre du cours"></input>
    <div id="line0"><hr></div>
    <div id="apprendre">
        <p id="titre"> Ce que vous allez apprendre : </p>
        <textarea  class="apprendre" placeholder="Ce cours va vous permettre d'apprendre..."></textarea>
        </input>
    </div>
    <div id="sommaire">
    <h3> Sommaire : </h3>
    <ul class="m_Chapitre" id="Chapitre_1">

    <a onclick="afficherMasquer('listeChapitre1')"><li>Chapitre 1</li></a>

        <ul id="listeChapitre1" class="m_Section" style="display: none;">
        <li class="liste"><a href="#Chapitre1_Section1">Section1</a></li>
        <li class="liste"><a href="#Chapitre1_Section2">Section2</a></li>
        <li class="liste"><a href="#Chapitre1_Section3">Section3</a></li>
        </ul>

    </ul>
    <ul class="m_Chapitre" id="Chapitre_2">

    <a onclick="afficherMasquer('listeChapitre2')" ><li >Chapitre 2</li></a>
        <ul id="listeChapitre2" class="m_Section" style="display: none;">
        <li class="liste"><a href="#Chapitre2_Section1">Section1</a></li>
        <li class="liste"><a href="#Chapitre2_Section2">Section2</a></li>
        <li class="liste"><a href="#Chapitre2_Section3">Section3</a></li>
        </ul>

    </ul>
    <br>
    </div>
        <div id="Cours">
        
        <label>Chapitre 1</label> 
        <input type="text" class="Chapitre" id="Chapitre1" placeholder="Titre du Chapitre 1">
        <a class="delChap" href="#"></a>
        <br><br>
        <label>Section 1</label>
        <input type="text" class="Section" id="Chapitre1_Section1" placeholder="Titre de la Section 1">
        <br><br>
        <textarea class="sectiontxt" placeholder="Contenue de section"></textarea>

        <button class="addChap" value="">Ajouter un chapitre</button>
        <br>
        <button class="addSection" value="">Ajouter une section</button>
        <br>
            <div id="butt">
                <input type="submit" class="valider" value="Valider">
                <input type="button" class="retour" value="Retour">
            </div>
        </div>

       
</form>
</body>
</html>
