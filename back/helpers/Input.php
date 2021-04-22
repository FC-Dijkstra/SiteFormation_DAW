<?php

class Input
{
    public static function exists(): bool
    {
        if (!empty($_POST))
        {
            return true;
        }
        else if (!empty($_GET))
        {
            return true;
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
