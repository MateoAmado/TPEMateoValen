<?php
require_once './app/controllers/HomeController.php';
require_once './app/controllers/EjerciciosController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'Home'; 
if (!empty($_GET['action'])) { 
    $action = $_GET['action'];
}

$params = explode('/', $action);

$HomeController = new HomeController();
$EjerciciosController = new EjerciciosController();

switch ($params[0]){
    default:
    //    $HomeController->showHome();
    $EjerciciosController->MostrarEjercicios();
    break;
}