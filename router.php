<?php
require_once './app/controllers/HomeController.php';
require_once './app/controllers/EjerciciosController.php';
require_once './app/controllers/MusculoController.php';
require_once './app/controllers/AuthController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) { 
    $action = $_GET['action'];
}

$params = explode('/', $action);

$HomeController = new HomeController();
$EjerciciosController = new EjerciciosController();
$MusculosController = new MusculoController();
$AuthController = new AuthController();

switch ($params[0]){
    case 'home':
        $HomeController->Mostrar();
        break;
    case 'register':
        $AuthController->Mostrar_FormRegistro();
        break;
    case 'confirmarregistro':
        $AuthController->Verificar_Nuevo_Usuario();
        break;
    case 'login':
        $AuthController->Mostrar_Inicio();
        break;
    case 'validar':
        $AuthController->Validar_Usuario();
        break;
    case 'ejercicios':
        if (empty($params[1]) || !isset($params[1])){
            $EjerciciosController->MostrarEjercicios();
        }
        else{
            switch ($params[1]){
                case 'agregar':
                    if (!empty($params[2]) && isset($params[2]) && $params[2] == 'confirmar'){
                        $EjerciciosController->ConfirmarAgregar();}
                    else if(empty($params[2]) || !isset($params[2])){
                        $EjerciciosController->Obtener_Ejercicio_Nuevo();
                    }
                    else{
                        echo "PAGINA NO ENCONTRADA ERROR 404";
                    }
                    break;
                case 'filtro':
                    $EjerciciosController->MostrarFiltro();
                    break;    
                case ($params[1]>0):
                    if (empty($params[2]) || !isset($params[2])){
                        $EjerciciosController->Mostrar_Ejercicio($params[1]);
                    }
                    else{
                        switch ($params[2]){
                            case 'editar':
                                if (!empty($params[3]) && $params[3]=="confirmar"){
                                    $EjerciciosController->ConfirmarEdicion($params[1]);
                                 }
                                else{
                                $EjerciciosController->Editar_Ejercicio($params[1]);}
                                break;
                            case 'eliminar':
                                if (!empty($params[3]) && $params[3]=="confirmar"){
                                    $EjerciciosController->ConfirmarEliminar($params[1]);
                                }
                                else{
                                $EjerciciosController->Eliminar_Ejercicio($params[1]);}
                                break;
                            default:
                            echo "PAGINA NO ENCONTRADA ERROR 404";
                            break;
                        }

                    }
                break;
                default:
                echo "PAGINA NO ENCONTRADA ERROR 404";
                break;
                }
        }
        break;
    case 'musculos':
        if (empty($params[1]) || !isset($params[1])){
            $MusculosController->Mostrar_Musculos();
        }
        else{
            switch ($params[1]){
                    case 'agregar':
                        if (!empty($params[2]) && isset($params[2]) && $params[2] == 'confirmar'){
                            $MusculosController->ConfirmarAgregar();}
                        else if(empty($params[2]) || !isset($params[2])){
                            $MusculosController->Agregar_Musculo();
                        }
                        else{
                            echo "PAGINA NO ENCONTRADA ERROR 404";
                        }
                        break;
                    case ($params[1]>0):
                        if (empty($params[2]) || !isset($params[2])){
                            $MusculosController->Mostrar_Musculo($params[1]);
                        }
                        else{
                            switch ($params[2]){
                                case 'editar':
                                    if (!empty($params[3]) && $params[3]=="confirmar"){
                                        $MusculosController->Confirmar_Edicion($params[1]);
                                    }
                                    else{
                                        $MusculosController->Editar_Musculo($params[1]);}
                                    break;
                                case 'eliminar':
                                    if (!empty($params[3]) && $params[3]=="confirmar" ){
                                        $MusculosController->Confirmar_Eliminacion($params[1]);
                                    }
                                    else{
                                        $MusculosController->Eliminar_Musculo($params[1]);}
                                    break;
                                default:
                                echo "PAGINA NO ENCONTRADA ERROR 404";
                                break;
                                }
                        }
            default:
            echo "PAGINA NO ENCONTRADA ERROR 404";
            break;
            }
        }
    break;
    default:
    echo "PAGINA NO ENCONTRADA ERROR 404";
    break;
}