<?php
require_once './app/views/EjerciciosView.php';
require_once './app/models/EjerciciosModel.php';


class EjerciciosController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new EjerciciosModel();
        $this->view = new EjerciciosView();
    }

    public function MostrarEjercicios() {
        $ejercicios = $this->model->obtenerEjercicios();
        $this->view->MostrarEjercicios($ejercicios);
    }

    public function MostrarEjercicio($id){
       $ejercicio = $this->model->obtenerEjercicio($id);
       $this->view->MostrarEjercicio($ejercicio);
    }
    

}
