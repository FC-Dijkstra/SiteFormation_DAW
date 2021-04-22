<?php
class redirect
{
    public static function to($page = null, $error = null)
    {
        if ($page)
        {
            if ($error)
            {
                header("Location: /index.php?page=" . $page . "&error='" . $error . "'");
                exit();
            }
            else
            {
                header("Location: /index.php?page=" . $page);
                exit();
            }
        }
    }
}
