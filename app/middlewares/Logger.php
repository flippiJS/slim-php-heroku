<?php
require_once './controllers/LogController.php';
require_once 'AutentificadorJWT.php';

class Logger
{
    public static function LogOperacion($request, $response, $next)
    {
        $retorno = $next($request, $response);
        return $retorno;
    }
}