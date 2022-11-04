<?php
  require_once "./api/Model/EjerciciosModel.php";
  require_once "./api/View/APIView.php";

 class EjerciciosApiController {
    private $model;
    private $view;

    public function __construct() {
      $this->model = new EjerciciosModel();
      $this->view = new APIView();
    }
    
    public function obtenerEjercicios(){  
        $coco = ["nombre"=>"Valentin", "nombre2"=>"Mateo"];
        $ejercicios = $this->model->obtenerEjercicios();
       
        return $this->view->response($ejercicios , 200);
    }
}