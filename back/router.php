<?php

require("controllers/QCM.php");

if (isset($_POST['action']))
{
    if ($_POST['action'] == "getQCM")
    {
        getQCM(htmlspecialchars($_POST["qcmID"]));
    }
}
