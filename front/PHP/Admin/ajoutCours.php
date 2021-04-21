<!DOCTYPE html>
<html lang="fr" >
<link rel="stylesheet" href="/front/CSS/Admin/ajoutCours.css" type="text/css"/>
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
            </ul>
        </ul>
        <br>
    </div>

        <div id="Cours">

            <div class="Chapitre">
                <label>Chapitre 1</label> 
                <input type="text" placeholder="Titre du Chapitre 1">
                <input type="button" class="delChap" value="X" href="#">
                
                <br><br>
                
                <div class="LesSections">

                    <div class="Section">
                        <label>Section 1</label>
                        <input type="text" id="Chapitre1_Section1" placeholder="Titre de la Section 1">
                        <input type="button" class="delChap" value="X" href="#">
                        <br><br>
                        <textarea class="sectiontxt" id="sectiontxt1" placeholder="Contenue de section"></textarea>
                    </div>
                    
                </div>

                <button class="addSection" onclick="addSection(1)">Ajouter une section</button>

            </div>
        </div>

        <button class="addChap" onclick="addChap()">Ajouter un chapitre</button>
        <br>
       
        <br>
            <div id="butt">
                <input type="submit" class="valider" value="Valider">
                <input type="button" class="retour" value="Retour">
            </div>

       
</form>
</body>
<script type="text/javascript" src="../../JS/Admin/ajoutCours.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>