<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/front/CSS/header.css" type="text/css">
        <title>Web School</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="/front/JS/Sombre.js"></script>
    <?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/back/helpers/token.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/back/helpers/Input.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/back/controllers/compte.php");
    session_start();
    token::generate();

    if (isset($_SESSION["userID"]))
    {
        include_once($_SERVER["DOCUMENT_ROOT"] . "/front/Include/header_connected.php");
    }
    else
    {
        include_once($_SERVER["DOCUMENT_ROOT"] . "/front/Include/header_base.php");
    }

    if (Input::exists())
    {
        switch(Input::get("page"))
        {
            case "accueil":
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/accueil.php");
                break;

            case "profil":
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Utilisateur/profil.php");
                break;

            case "connexion":
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Utilisateur/connexion.php");
                break;

            case "inscription":
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Utilisateur/inscription.php");
                break;

            case "cours":
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Cours.php");
                break;

            case "coursApplication":
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Cours/application.php");
                break;

            case "structureCours":
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Cours/structureCours.php");
                break;

            case "coursWeb":
                include ($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Cours/web.php");
                break;

            case "postuler":
                include ($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/postuler.php");
                break;

            case "quiSommesNous":
                include ($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/nous.php");
                break;

            case "nousContacter":
                include ($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/contact.php");
                break;

            case "accueilQCM":
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Quizz/accueil_qcm.php");
                break;

            case "QCM":
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Quizz/qcm.php");
                break;

            case "accueilForum":    //TODO: voir pour les params
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Forum/index.php");
                break;

            case "messagesForum":   //TODO: voir pour les params
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Forum/messages.php");
                break;

            case "conversations":     //TODO: voir pour les params
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Forum/conversations.php");
                break;

            case "profilAdmin":     //TODO: voir pour les params
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Admin/profilAdmin.php");
                break;

            case "gererUser":   //TODO: voir pour les params
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Admin/gererUser.php");
                break;

            case "ajoutCours":  //TODO: voir pour les params
                include($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Admin/ajoutCours.php");
                break;
        }
        if (isset($_GET["error"]))
        {
            echo "<script> alert(\"" . urldecode($_GET["error"]) . "\"); </script>";
        }
    }
    else
    {
        include ($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/accueil.php");
    }

    include_once($_SERVER["DOCUMENT_ROOT"] . "/front/Include/footer.php");
    ?>

</html>
