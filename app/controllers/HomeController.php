<?php
require_once './app/views/HomeView.php';
require_once './app/models/HomeModel.php';
// require_once './app/helpers/AuthHelper.php';


class HomeController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new HomeModel();
        $this->view = new HomeView();
    }

    function mostrar(){
        $ejercicios = $this->model->obtenerEjerciciosRandom();
        $this->view->mostrarHome($ejercicios);
    }

}