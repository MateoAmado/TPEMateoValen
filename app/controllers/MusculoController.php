<?php 
require_once "./app/models/MusculoModel.php";
require_once "./app/views/MusculoView.php";

class MusculoController{
    private $model;
    private $view;

    public function __construct(){
       $this->model = new MusculoModel();
       $this->view = new MusculoView();
    }

   public function MostrarMusculo(){
      $musculos = $this->model->obtenerMusculos();
      $this->view->MostrarMusculos($musculos);

    }
}