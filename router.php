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
        else if($params[1]=="filtro"){
         $EjerciciosController->MostrarFiltro();
        }
        else if(!empty($params[2])){
            if ($params[2] == "editar"){
                if (!empty($params[3]) && $params[3]=="confirmar"){
                    $EjerciciosController->ConfirmarEdicion($params[1]);
                }
                else{
                    $EjerciciosController->Editar_Ejercicio($params[1]);
                }
            }
            else if ($params[2] == "eliminar"){
                if (!empty($params[3]) && $params[3]=="confirmar"){
                    $EjerciciosController->ConfirmarEliminar($params[1]);
                 }
                else{
                $EjerciciosController->Eliminar_Ejercicio($params[1]);
                }
            }
            else {
              if($params[2] == "confirmar"){
                 $EjerciciosController->ConfirmarAgregar();
                }
            }
        }
        else{
            if (($params[1])== "agregar"){
            $EjerciciosController->Obtener_Ejercicio_Nuevo();
            }
             else{
            $EjerciciosController->Mostrar_Ejercicio($params[1]);
            } 
        }
        break;
    case 'musculos':
        if(empty($params[1])){
            $MusculosController->Mostrar_Musculos();
        }
        else if(!empty($params[1]) && $params[1]=="agregar"){
           $MusculosController->Agregar_Musculo();
           if(!empty($params[2]) && $params[2]=="confirmar"){
            $MusculosController->ConfirmarAgregar();
           }
        }
        else if(!empty($params[2])){
            if($params[2]=="editar"){
                $MusculosController->Editar_Musculo($params[1]);
                if(!empty($params[3]) && $params[3]=="confirmar"){
                    $MusculosController->Confirmar_Edicion($params[1]);
                }
            }
            else if($params[2]=="eliminar"){
                $MusculosController->Eliminar_Musculo($params[1]);
                if(!empty($params[3]) && $params[3]=="confirmar"){
                    $MusculosController->Confirmar_Eliminacion($params[1]);
                }
            }
        }
        else{
            $MusculosController->Mostrar_Musculo($params[1]);
        }
        break;
/*         case 'confirmar':
            if(!empty($params[1])){
           $EjerciciosController->ConfirmarEdicion($params[1]);
            } */
        break;
    default:
    echo "PAGINA NO ENCONTRADA ERROR 404";
    break;
}