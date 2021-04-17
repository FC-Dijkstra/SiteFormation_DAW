<?php

// change les warnings en erreur.
set_error_handler(function($severity, $message, $file, $line)
{
    throw new ErrorException($message, $severity, $severity, $file, $line);
});