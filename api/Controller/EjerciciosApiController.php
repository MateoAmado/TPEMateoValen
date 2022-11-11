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

   public function filtrarporcampo($params = null){
     // endpoint api/ejercicios/filtro/:CAMPO?=filtro like y porcentajes
            $campo = $params[':CAMPO'];
            if(!empty($campo)){
               $filtro = $_GET['filtro'];
               if(!empty($filtro)){
                   $filtro = "$filtro%" ;
                   $ejercicios = $this->model->filtrarEjercicios($filtro);
                   return $this->view->response($ejercicios, 200);
                   //return $this->view->response($filtro ,200);
               }
               else{
                   return $this->view->response("Bad Request", 400);
               }
            }else{

            }

   }
  // TODO:preguntar sober esto  ==> /ejercicios/filtro/aaa?musculo=triceps&intensidad=iiii&seccion=aaa :D
  /*       if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
      }
      else {
        $nombre = null;
      }
      if(isset($_GET['musculo'])){
        $musculo = $_GET['musculo'];
      }
      else {
        $musculo = null;
      }
      if(isset($_GET['intensidad'])){
        $intensidad = $_GET['intensidad'];
      }
      else {
        $intensidad = null;
      }
      if(isset($_GET['seccion'])){
        $seccion = $_GET['seccion'];
      }
      else {
        $seccion = null;
      }
       */

    public function ordenarPorCampo($params = null){  
      if(isset($_GET['order'])){
        $orden = $_GET['order'];

      switch ($params[":CAMPO"]){
        case "nombre":
          $ejercicios = $this->model->ordenarEjercicios("ejercicios.nombre_ej", $orden);
          return $this->view->response($ejercicios,200);
        break;
        case "musculo":
          $ejercicios = $this->model->ordenarEjercicios("musculos.nombre_musculo", $orden);
          return $this->view->response($ejercicios,200);
        break;
        case "intensidad":
          $ejercicios = $this->model->ordenarEjercicios("ejercicios.intensidad_ej", $orden);
          return $this->view->response($ejercicios,200);
        break;
        case "seccion":
          $ejercicios = $this->model->ordenarEjercicios("ejercicios.seccion_ej", $orden);
          return $this->view->response($ejercicios,200);
        break;
        case "descripcion":
          $ejercicios = $this->model->ordenarEjercicios("ejercicios.descripcion_ej", $orden);
          return $this->view->response($ejercicios,200);
        break;
      default: 
       return $this->view->response("Not Found", 404);
       break;
      }
     }
     else{
          return $this->view->response("Not Found", 404);
     }
    }

    public function obtenerEjercicio($params = null){
      $ejercicio = $this->model->obtenerEjercicio($params[":ID"]);
      if (is_numeric($params[":ID"])){
      if(!empty($ejercicio)) {
        $ejercicio = $this->model->obtenerEjercicio($params[":ID"]);
      }
      else{
        return $this->view->response("Not found",404);
      }
    }
    else{
      return $this->view->response("Bad Request",400);
    }
    }

    public function anadirEjercicio(){
      $data = $this->getData();
      // TODO: hacer que lea en caso de arreglo
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