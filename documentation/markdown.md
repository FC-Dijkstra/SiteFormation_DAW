# RAPPELS MARKDOWN

paragraphe = sauter une ligne

ligne de séparation = -----------

citation = texte précédé de >

> ceci est une citation
>> ceci est une réponse à une citation

-----------------

pour italique: texte entouré de _*_ ou de *_*

> _ce texte est en italique_ . *celui la aussi*

-----------------

pour gras: texte entouré de 2 __*__ ou 2 **_**

> __ce texte est en gras__ **celui la aussi**

-----------------

pour un titre de niveau n : texte précédé de n #

> # Titre de niveau 1
>
> ## Titre de niveau 2
>
> ### titre de niveau 3
>
> #### titre de niveau 4

-----------------

une liste à puce est faite avec un objet par ligne et * en préfixe (l'espace est important). On peut aussi les imbriquer.

* pain
* viande
  * poisson
    * cordons bleus

une liste ordonnée est faite avec un objet par ligne précédé de sa position. On peut aussi les imbriquer.

1. le 1er objet
2. le 2e objet
    1. le 1er objet du 2e

On peut aussi insérer du code en le tabulant une fois.

    int main()
    {
        printf("Hello World\n");
        return 0;
    }

On peut également le mettre en ligne en l'entourant avec l'accent du 7

la fonction `printf()`permet d'afficher des trucs en C

On peut include des liens: le texte du lien est entre crochets suivi de l'adresse entre parenthèses.

> [le texte affiché](https://google.com)
