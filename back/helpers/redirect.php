<?php
class redirect
{
    public static function to($location = null)
    {
        if ($location)
        {
            header("Location:" . $location);
            exit();
        }
    }
}
