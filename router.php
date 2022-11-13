<?php

// TODO: chequear datos por la inyeccion SQL
// TODO: preguntar por que respon de 200 cuando o entra en ningun lado
require_once "libs/Router.php";
require_once "api/Controller/EjerciciosApiController.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('ejercicios', 'GET', 'EjerciciosApiController', 'obtenerEjercicios');
$router->addRoute('ejercicios/ordenar/:CAMPO', 'GET', 'EjerciciosApiController', 'ordenarPorCampo');
$router->addRoute('ejercicios/filtro/:CAMPO', 'GET', 'EjerciciosApiController', 'filtrarporcampos');
$router->addRoute('ejercicios/', 'POST', 'EjerciciosApiController', 'anadirEjercicio');
$router->addRoute('ejercicios/paginacion/:PAGINACION', 'GET', 'EjerciciosApiController', 'paginarEjercicios');
$router->addRoute('ejercicios/:ID', 'GET', 'EjerciciosApiController', 'obtenerEjercicio');
$router->addRoute('ejercicios/:ID', 'PUT', 'EjerciciosApiController', 'editarEjercicio');
$router->addRoute('ejercicios/:ID', 'DELETE','EjerciciosApiController', 'eliminarEjercicio');



// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
