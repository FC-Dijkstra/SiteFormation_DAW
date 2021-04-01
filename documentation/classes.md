class user:
    - string nom;
    - string prenom;
    - string email;
    - string theme;

class admin extends user

class message:
    - string contenu
    - user auteur
    - date Date

class abonnement:
    - user user;
    - cours[] cours;

class cours:
    - string nom;
    - string difficulte;
    - user auteur;
    - file fichier

class conversation:
    - string titre;
    - categorie cat;

class categorie:
    - string titre;

class evaluation:
    - cours 