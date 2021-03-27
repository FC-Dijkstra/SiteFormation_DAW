# QCM

Les QCM sont divisés en deux fichiers XML:

* questions.xml
* reponses.xml

Informations contenues dans questions.xml:

* Identifiant du QCM
* Cours correspondant aux questions
* Difficulté
* Un ensemble de questions
  * Identifiant de la question
  * Enonce de la question
  * Un ensemble de reponses possibles pour l'utilisateur
    * Identifiant de la reponse
    * valeur de la réponse.

Lorsqu'un utilisateur demande à faire un QCM, on vérifie d'abord si le cooldown est bon. Si ce n'est pas le cas, message d'erreur.
On appele le controlleur QCM qui va retourner le QCM au format JSON.
L'objet JSON est parsé puis intégré dans la page ?
Ou alors récupération par la vue ?

Bref.

Les questions que l'utilisateur a saisi sont mises dans un objet JS corresponant à questions.json.

Le JSON est envoyé au serveur.

quand le serveur va recevoir le JSON, il va le convertir en objet PHP.
il va charger le fichier de réponses correspondant au questionnaire, le convertir en objet PHP puis va comparer les deux objets, en attribuant les points correctement.
Une fois que la note est obtenue, elle est ajoutée à la base de données.
