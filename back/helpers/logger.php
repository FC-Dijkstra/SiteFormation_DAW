<?php

class logger
{
    public static string $logDir = __DIR__ . "/../data/logs/";

    public static function log(string $message)
    {
        $origin = debug_backtrace()[1]['class'] . "::" . debug_backtrace()[1]['function'] . "()[" . debug_backtrace()[1]['line'] . "]";
        $date = date("d-m-Y h:i:s");
        logger::generateLatest();

        $file = fopen(logger::$logDir . "latest.log", "a+");
        fwrite($file, $date . " - " . $origin . " - " . $message . "\n");
        fclose($file);
    }

    public static function generateLatest()
    {
        $fileTime = filemtime(logger::$logDir . "latest.log");
        $fileDate = date("d", $fileTime);
        $currDate = date("d");

        if ($fileDate != $currDate)
        {
            $newName = date("d-m-Y", $fileTime);
            rename(logger::$logDir . "latest.log", logger::$logDir . $newName . ".log");
            fopen(logger::$logDir . "latest.log", "w");
        }
    }
}
