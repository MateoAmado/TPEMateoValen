<?php
 // TODO: hacer response en arreglos anteriormente 
 // TODO: añadir en documentacion el paso de parametros
  require_once "./api/Model/EjerciciosModel.php";
  require_once "./api/View/APIView.php";

 class EjerciciosApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
      $this->model = new EjerciciosModel();
      $this->view = new APIView();
      $this->data = file_get_contents("php://input");
    }

    public function getData(){
      return json_decode($this->data);
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

    public function anadirEjercicio(){
      $data = $this->getData();

      $id = $this->model->agregarEjercicio($data->nombre_ej, $data->musculo_id, $data->intensidad_ej, $data->seccion_ej, $data->descripcion_ej);
      
      $nuevoejercicio = $this->model->obtenerEjercicio($id);
      if ($nuevoejercicio){
          $this->view->response($nuevoejercicio, 200);
      }
      else{
          $this->view->response("La tarea no fue creada", 500);
      }
      //$this->model->agregarEjercicio();
    }

    public function editarEjercicio($params){
      $id = $params[':ID'];
      $data = $this->getData();
      
      $ejercicioaeditar = $this->model->obtenerEjercicio($id);
      if($ejercicioaeditar){
        $this->model->modificarEjercicio($id, $data->nombre_ej, $data->musculo_id, $data->intensidad_ej, $data->seccion_ej, $data->descripcion_ej);
        $ejercicioeditado = $this->model->obtenerEjercicio($id);
        $this->view->response($ejercicioeditado, 200);
      }
      else{
           $this->view->response("El ejercicio con el id:".$id." no existe papa", 404);
      }
            

    }
   
    
   
}