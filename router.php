<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('LOGIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/login');
define('LOGOUT', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/logout');
define('EJERCICIOS', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/ejercicios');
define('MUSCULOS', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/musculos');


require_once './app/controllers/EjerciciosController.php';
require_once './app/controllers/MusculoController.php';
require_once './app/controllers/AuthController.php';

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$EjerciciosController = new EjerciciosController();
$MusculosController = new MusculoController();
$AuthController = new AuthController();

switch ($params[0]) {
    case 'home':
        $EjerciciosController->mostrarRandom();
        break;
    case 'registrarse':
        $AuthController->mostrarFormRegistro();
        break;
    case 'confirmarregistro':
        $AuthController->verificarNuevoUsuario();
        break;
    case 'logearse':
        $AuthController->mostrarInicio();
        break;
    case 'validar':
        $AuthController->validarUsuario();
        break;
    case 'deslogearse':
        $AuthController->logout();
        break;
    case 'ejercicios':
        if (empty($params[1]) || !isset($params[1])) {
            $EjerciciosController->mostrarEjercicios();
        } else {
            switch ($params[1]) {
                case 'agregar':
                    if (!empty($params[2]) && isset($params[2]) && $params[2] == 'confirmar') {
                        $EjerciciosController->confirmarAgregar();
                    } else if (empty($params[2]) || !isset($params[2])) {
                        $EjerciciosController->obtenerEjercicioNuevo();
                    } else {
                        echo "PAGINA NO ENCONTRADA ERROR 404";
                    }
                    break;
                case 'filtro':
                    $EjerciciosController->mostrarFiltro();
                    break;
                case ($params[1] > 0):
                    if (!isset($params[2]) || empty($params[2])) {
                        if (is_numeric($params[1])) {
                            $EjerciciosController->mostrarEjercicio($params[1]);
                        } else {
                            echo "PAGINA NO ENCONTRADA ERROR 404";
                        }
                    } else {
                        switch ($params[2]) {
                            case 'editar':
                                if (!empty($params[3]) && $params[3] == "confirmar") {
                                    $EjerciciosController->confirmarEdicion($params[1]);
                                } else {
                                    $EjerciciosController->editarEjercicio($params[1]);
                                }
                                break;
                            case 'eliminar':
                                if (!empty($params[3]) && $params[3] == "confirmar") {
                                    $EjerciciosController->confirmarEliminar($params[1]);
                                } else {
                                    $EjerciciosController->eliminarEjercicio($params[1]);
                                }
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
        if (empty($params[1]) || !isset($params[1])) {
            $MusculosController->mostrarMusculos();
        } else {
            switch ($params[1]) {
                case 'agregar':
                    if (!empty($params[2]) && isset($params[2]) && $params[2] == 'confirmar') {
                        $MusculosController->confirmarAgregar();
                    } else if (empty($params[2]) || !isset($params[2])) {
                        $MusculosController->agregarMusculo();
                    } else {
                        echo "PAGINA NO ENCONTRADA ERROR 404";
                    }
                    break;
                case ($params[1] > 0):
                    if (empty($params[2]) || !isset($params[2])) {
                        if (is_numeric($params[1])) {
                            $MusculosController->mostrarMusculo($params[1]);
                        } else {
                            echo "PAGINA NO ENCONTRADA ERROR 404";
                        }
                    } else {
                        switch ($params[2]){
                            case 'editar':
                                if (!empty($params[3]) && $params[3] == "confirmar") {
                                    $MusculosController->confirmarEdicion($params[1]);
                                } else {
                                    $MusculosController->editarMusculo($params[1]);
                                }
                                break;
                            case 'eliminar':
                                if (!empty($params[3]) && $params[3] == "confirmar") {
                                    $MusculosController->confirmarEliminacion($params[1]);
                                } else {
                                    $MusculosController->eliminarMusculo($params[1]);
                                }
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
    default:
        echo "PAGINA NO ENCONTRADA ERROR 404";
        break;
}
