<?php

require_once "libs/Router.php";
require_once "api/Controller/EjerciciosApiController.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('ejercicios', 'GET', 'EjerciciosApiController', 'obtenerEjercicios');
$router->addRoute('ejercicios', 'POST', 'EjerciciosApiController', 'añadirEjercicio');
$router->addRoute('ejercicios/:ID', 'GET', 'EjerciciosApiController', 'obtenerEjercicio');



// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
