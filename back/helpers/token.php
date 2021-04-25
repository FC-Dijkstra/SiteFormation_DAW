<?php

class Token
{
    public static function generate()
    {
        return $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    }

    public static function check($token)
    {
        if (isset($_SESSION["csrf_token"]) && $token === $_SESSION["csrf_token"])
        {
            return true;
        }
        return false;
    }

    public static function get()
    {
        return $_SESSION["csrf_token"];
    }
}
