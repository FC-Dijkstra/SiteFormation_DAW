<?php

class Input
{
    public static function exists(string $type = "POST"): bool
    {
        if ($type == "POST")
        {
            return (!empty($_POST)) ? true : false;
        }
        elseif ($type == "GET")
        {
            return (!empty($_GET)) ? true : false;
        }
        else
        {
            return false;
        }
    }

    public static function get(string $param): string
    {
        if (isset($_POST[$param]))
        {
            return $_POST[$param];
        }
        elseif (isset($_GET[$param]))
        {
            return $_GET[$param];
        }
        else
        {
            return "";
        }
    }
}
