<?php
require_once './app/views/HomeView.php';


class HomeController {
    private $model;
    private $view;

    public function __construct() {
        // $this->model = new HomeModel();
        $this->view = new HomeView();
    }

    function Mostrar(){
        $this->view->MostrarHome();
    }
}