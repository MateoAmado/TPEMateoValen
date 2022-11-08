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

    public function paginarEjercicios($params = null){
      if(isset($params[':PAGINACION'])){
        if(isset($_GET['primernum']) && isset($_GET['segundonum'])){
          $primernum = $_GET['primernum'];
          $segundonum = $_GET['segundonum'];
          $ejercicios = $this->model->obtenertantosEjercicios($primernum, $segundonum);
          return $this->view->response($ejercicios, 200);
        }
        else{
          $this->view->response("Bad request", 400);
        }
    }
  }

    public function filtrarPorMusculo($params = null){
      if(isset($_GET['order'])){
        $orden = $_GET['order'];

      switch ($params[":FILTRO"]){
        case "pecho":
          $ejerciciosPecho = $this->model->filtrarEjerciciosorden(1, $orden);
          return $this->view->response($ejerciciosPecho,200);
        break;
        case "espalda":
          $ejerciciosEspalda = $this->model->filtrarEjerciciosorden(2, $orden);
          return $this->view->response($ejerciciosEspalda,200);
        break;
        case "piernas":
          $ejerciciosPierna = $this->model->filtrarEjerciciosorden(3, $orden);
          return $this->view->response($ejerciciosPierna,200);
        break;
        case "biceps":
          $ejerciciosBicep = $this->model->filtrarEjerciciosorden(4, $orden);
          return $this->view->response($ejerciciosBicep,200);
        break;
        case "triceps":
          $ejerciciosTricep = $this->model->filtrarEjerciciosorden(5, $orden);
          return $this->view->response($ejerciciosTricep,200);
        break;
        case "hombros":
          $ejerciciosHombros = $this->model->filtrarEjerciciosorden(6, $orden);
          return $this->view->response($ejerciciosHombros,200);
        break;
      default: 
       return $this->view->response("Not Found", 404);
      }
    }
    else{
    switch ($params[":FILTRO"]){
      case "pecho":
        $ejerciciosPecho = $this->model->filtrarEjercicios(1);
        return $this->view->response($ejerciciosPecho,200);
      break;
      case "espalda":
        $ejerciciosEspalda = $this->model->filtrarEjercicios(2);
        return $this->view->response($ejerciciosEspalda,200);
      break;
      case "piernas":
        $ejerciciosPierna = $this->model->filtrarEjercicios(3);
        return $this->view->response($ejerciciosPierna,200);
      break;
      case "biceps":
        $ejerciciosBicep = $this->model->filtrarEjercicios(4);
        return $this->view->response($ejerciciosBicep,200);
      break;
      case "triceps":
        $ejerciciosTricep = $this->model->filtrarEjercicios(5);
        return $this->view->response($ejerciciosTricep,200);
      break;
      case "hombros":
        $ejerciciosHombros = $this->model->filtrarEjercicios(6);
        return $this->view->response($ejerciciosHombros,200);
      break;
    default: 
     return $this->view->response("Not Found", 404);
    }
  }
    }

    public function obtenerEjercicio($params = null){
      $ejercicio = $this->model->obtenerEjercicio($params[":ID"]);
      if(!empty($ejercicio)) {
        $ejercicio = $this->model->obtenerEjercicio($params[":ID"]);
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

    public function editarEjercicio($params = null){
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