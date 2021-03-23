<?php
require_once '../models/Usuario.php';

class UsuarioController extends Usuario
{
    public function CargarUno($request, $response)
    {
        $parametros = $request->getParsedBody();

        $usuario = $parametros['usuario'];
        $clave = $parametros['clave'];

        // Creamos el usuario
        $usr = new Usuario();
        $usr->usuario = $usuario;
        $usr->clave = $clave;
        $usr->crearUsuario();

        return $response->withJson(array("mensaje" => "Usuario creado con exito"));;
    }

    public function TraerUno($request, $response, $args)
    {
        // Buscamos usuario por nombre
        $usr = $args['usuario'];
        $usuario = Usuario::obtenerUsuario($usr);
        $respuesta = $response->withJson($usuario, 200);
        return $respuesta;
    }
}