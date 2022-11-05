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
        $ejercicios = $this->model->obtenerEjercicios();
        return $this->view->response($ejercicios , 200);
    }
    public function obtenerEjercicio($params){
      $ejercicio = $this->model->obtenerEjercicio($params[":ID"]);
      if(!empty($ejercicio)) {
        return $this->view->response($ejercicio,200);
      }
      else{
        return $this->view->response("Not found",404);
      }
    }
    // TODO: hacer response en arreglos anteriormente
    
   
}