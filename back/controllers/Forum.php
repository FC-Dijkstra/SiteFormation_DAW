<?php 
	require_once(__DIR__ . "./../helpers/db.php");
	require_once(__DIR__ . "./../class/message.php");
	require_once(__DIR__ . "./../class/conversation.php");
function RecupMsg($conv) //recup tous les messages a partir d'une conv
{
    return db::getInstance()->get(config::$MES_TABLE, "$conv = conversations", true);
}

function sendMessage($cid, $auteur, $contenu, $date)
{
    $conversation = conversation::load($cid);
    if ($conversation->get("locked") == 0)
    {
        $message = new message(0, $cid, $auteur, $contenu, $date);
        message::save($message);

        if (db::getInstance()->hasError())
        {
            redirect::to("messagesForum", "Erreur lors de l'envoi du message", ["id" => $cid]);
            //echo "Erreur lors de l'envoi du message";
        }
        else
        {
            redirect::to("messagesForum", null, ["id"=>$cid]);
            //echo "Message envoyé";
        }
    }
    else
    {
        redirect::to("messagesForum", "Erreur, conversation verrouillée", ["id" => $cid]);
    }
}

function createConversation($categorie, $titre)
{
    $conversation = new conversation(0, $categorie, $titre, 0);
    $res = conversation::save($conversation);
    sendMessage($res[0]['LAST_INSERT_ID()'], $_SESSION['userID'], Input::get('contenu'), date("Y-m-d H:i:s"));
    if (db::getInstance()->hasError())
    {
        redirect::to("conversations", "Erreur lors de la création de la conversation", ["id"=>$categorie]);
        //echo "Erreur lors de la création de la conversation";
    }
    else
    {
        redirect::to("conversations", null, ["id"=>$categorie]);
        //echo "Conversation crée";
    }
}

function createCategorie($categorie, $subcategorie)
{
    $titre = $categorie . "/" . $subcategorie;
    $cat = new categorie(0, $titre);
    categorie::save($cat);

    if (db::getInstance()->hasError())
    {
        redirect::to("accueilForum", "Erreur lors de la création de la catégorie");
        //echo "Erreur lors de la création de la catégorie";
    }
    else
    {
        redirect::to("accueilForum");
        //echo "Catégorie crée";
    }
}

function lockConversation($cid)
{
    $conversation = conversation::load($cid);
    $params = [
        "id" => $conversation->get("id"),
        "categorie"=>$conversation->get("categorie"),
        "titre"=>$conversation->get("titre"),
        "locked"=>1
    ];
    db::getInstance()->update(config::$CONV_TABLE, "id = $cid", $params);

    if (db::getInstance()->hasError())
    {
        redirect::to("conversations", "Erreur, impossible de verrouiller la conversation", ["id"=>$cid]);
        //echo "Erreur, impossible de verrouiller la conversation";
    }
    else
    {
        redirect::to("conversations", "Conversation verrouillée", ["id"=>$cid]);
        //echo "Conversation verrouillée";
    }
}

function deleteMessage($id, $conversation)
{
    message::delete($id);
    if (db::getInstance()->hasError())
    {
        redirect::to("messagesForum", "Erreur pendant la suppression", ["id"=>$conversation]);
        //echo "Erreur, impossible de supprimer le message";
    }
    else
    {
        redirect::to("messagesForum", "Ce message a été supprimé", ["id"=>$conversation]);
        //echo "Message supprimé";
    }
}

function removeMessage($id, $author, $conversation)
{
    $message = message::load($id);
    if ($message->get("auteur") == $author)
    {
        message::delete($id);
        if (db::getInstance()->hasError())
        {
            redirect::to("messagesForum", "Erreur, impossible de supprimer le message", ["id"=>$conversation]);
            //echo "Erreur, impossible de supprimer le message";
        }
        else
        {
            redirect::to("messagesForum", "Message supprimé", ["id"=>$conversation]);
            //echo "Message supprimé";
        }
    }
    else
    {
        redirect::to("messagesForum", "Erreur, vous n'êtes pas l'auteur de ce message", ["id"=>$conversation]);
        //echo "Erreur, impossible de supprimer le message";
    }
}
 
function RecupConv($type)
{
    $res = array();
    $categorie = categorie::getAllByType($type);
    for ($i =0; $i< count ($categorie); $i++)
    {
        $rescat = $categorie[$i]["id"];
		$res = $res + db::getInstance()->get(config::$CONV_TABLE,"categorie = $rescat", false);
    }
    return $res;
}

function RecupConvById($id)
{
    return db::getInstance()->get(config::$CONV_TABLE,"categorie = $id",false);
}

function recup1Conv($id)
{
    //return db::getInstance()->get(config::$CONV_TABLE, "id = $id", true);
    return conversation::load($id);
}

function recupAuthor($id)
{
    //return db::getInstance()->get(config::$USER_TABLE, "id = $id", true);
    return utilisateur::load($id);
}

function recupMessages($id)
{

    $uids = db::getInstance()->query("SELECT id FROM messages WHERE conversation = ? ORDER BY date ASC", [$id]);
    $output = array();
    for($i = 0; $i < count($uids); $i++)
    {
        $message = message::load($uids[$i]["id"]);
        array_push($output, $message);
    }

    return $output;
}

function getAllUtilisateurs()
{
    $uids = db::getInstance()->query("SELECT id FROM utilisateurs", [], true);
    $output = array();
    for($i = 0; $i < count($uids); $i++)
    {
        $utilisateur = utilisateur::load($uids[$i]["id"]);
        array_push($output, $utilisateur);
    }
    return $output;
}

//Recup toutes les conv dans une seul catégorie 
