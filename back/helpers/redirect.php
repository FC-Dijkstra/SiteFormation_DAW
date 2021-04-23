<?php
class redirect
{
    public static function to($page = null, $error = null, $params = null)
    {
        if ($page)
        {
            $urlstring = "Location: /index.php?page=" .$page;
            if ($error)
            {
                $urlstring .= "&error=" . urlencode($error);

            }

            if ($params)
            {
                foreach($params as $key => $value)
                {
                    $urlstring .= "&" . $key . "=" . $value;
                }
            }

            header($urlstring);
        }
    }
}
