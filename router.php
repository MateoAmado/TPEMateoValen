<?php
require_once './app/controllers/HomeController.php';
require_once './app/controllers/EjerciciosController.php';
require_once './app/controllers/MusculoController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'Home'; 
if (!empty($_GET['action'])) { 
    $action = $_GET['action'];
}

$params = explode('/', $action);

$HomeController = new HomeController();
$EjerciciosController = new EjerciciosController();
$MusculosController = new MusculoController();

switch ($params[0]){
    case 'Home':
        $HomeController->Mostrar();
        break;
    case 'Ejercicios':
        if(empty($params[1]) || $params[1]<0){
        $EjerciciosController->MostrarEjercicios();
        }
        else{
            $EjerciciosController->MostrarEjercicio($params[1]);
        }
        break;
    case 'Musculos':
         $MusculosController->MostrarMusculo();
        break;
    default:
    echo "PAGINA NO ENCONTRADA ERROR 404";
    break;
}