<?php
require_once './app/controllers/HomeController.php';
require_once './app/controllers/EjerciciosController.php';
require_once './app/controllers/MusculoController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) { 
    $action = $_GET['action'];
}

$params = explode('/', $action);

$HomeController = new HomeController();
$EjerciciosController = new EjerciciosController();
$MusculosController = new MusculoController();

switch ($params[0]){
    case 'home':
        $HomeController->Mostrar();
        break;
    case 'ejercicios':
        if(empty($params[1]) || $params[1]<0){
        $EjerciciosController->MostrarEjercicios();
        }
        else if($params[2]=='editar'){
            $EjerciciosController->Editar_Ejercicio($params[1]);
        }
        else{
            $EjerciciosController->Mostrar_Ejercicio($params[1]);
        }
        break;
    case 'musculos':
        if(empty($params[1])){
            $MusculosController->Mostrar_Musculos();
        }
        else{
            $MusculosController->Mostrar_Musculo($params[1]);
        }
        break;
        case 'confirmar':
            if(!empty($params[1])){
           $EjerciciosController->ConfirmarEdicion($params[1]);
            }
        break;
    default:
    echo "PAGINA NO ENCONTRADA ERROR 404";
    break;
}