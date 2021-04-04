# Comportements suppression DB

* delete utilisateur -> delete admin 
* delete utilisateur -> delete abonnement
* delete cours -> delete abonnement
* delete utilisateur -> set null cours(auteur)
* delete categorie -> delete cours
* delete utilisateur -> delete resultat
* delete evaluation -> delete resultat
* delete evaluation -> delete fichierEvaluation
* delete fichierevaluation -> RESTRICT
* delete cours -> delete evaluation
* delete conversation -> delete message
* delete utilisateur -> delete message
* delete categorie -> delete conversation
* delete cours -> delete fichiercours

## Bloquer tous les autres DELETE au niveau PHP ou sql si on trouve