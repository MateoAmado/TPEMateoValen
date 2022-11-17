<?php
require_once "libs/Router.php";
require_once "api/Controller/EjerciciosApiController.php";
require_once "api/Controller/AuthApiController.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// crea el router
$router = new Router();

// define la tabla de ruteo
//$router->setDefaultRoute('EjerciciosApiController', 'obtenerEjercicios');
$router->addRoute('ejercicios', 'GET', 'EjerciciosApiController', 'obtenerEjercicios');
$router->addRoute('ejercicios/ordenar/:CAMPO', 'GET', 'EjerciciosApiController', 'ordenarPorCampo');
$router->addRoute('ejercicios/filtro', 'GET', 'EjerciciosApiController', 'filtrarporcampos');
$router->addRoute('ejercicios', 'POST', 'EjerciciosApiController', 'anadirEjercicio');
$router->addRoute('ejercicios/paginacion', 'GET', 'EjerciciosApiController', 'paginarEjercicios');
$router->addRoute('ejercicios/:ID', 'GET', 'EjerciciosApiController', 'obtenerEjercicios');
$router->addRoute('ejercicios/:ID', 'PUT', 'EjerciciosApiController', 'editarEjercicio');
$router->addRoute('ejercicios/:ID', 'DELETE','EjerciciosApiController', 'eliminarEjercicio');
$router->addRoute('auth/token', 'GET', 'AuthApiController', 'getToken');



// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
