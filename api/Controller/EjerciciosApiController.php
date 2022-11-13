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
    

    public function obtenerEjercicios($params = null){

      if (empty($params)){
        $ejercicios = $this->model->obtenerEjercicios();
        return $this->view->response($ejercicios , 200);
      }
      else{
        
      }

    }

    public function paginarEjercicios($params = null){
      
      if(isset($params[':PAGINACION'])){
        if(isset($_GET['primernum']) && isset($_GET['segundonum']) && (is_numeric($_GET['segundonum']) && is_numeric($_GET['primernum']))){
          $primernum = $_GET['primernum'];
          $segundonum = $_GET['segundonum'];
          $ejercicios = $this->model->obtenertantosEjercicios($primernum, $segundonum);
          if($ejercicios == []){
            return $this->view->response("Not found", 404);
          }else{
            return $this->view->response($ejercicios, 200);
          }
        }
        else{
          $this->view->response("Bad request", 400);
        }
    }
  }

   public function filtrarporcampo($params = null){
     // endpoint api/ejercicios/filtro/:CAMPO?CAMPO=filtro like y porcentajes
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
              return $this->view->response("Bad Request", 400);
            }

   }
   public function filtrarporcampos($params = null){
  // TODO:preguntar sober esto  ==> /ejercicios/filtro/aaa?musculo=triceps&intensidad=iiii&seccion=aaa :D
         if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
        $nombre = "$nombre%";
      }
      else {
        $nombre = "%";
      }
      if(isset($_GET['musculo'])){
        $musculo = $_GET['musculo'];
        $musculo = "$musculo%";
      }
      else {
        $musculo = "%";
      }
      if(isset($_GET['intensidad'])){
        $intensidad = $_GET['intensidad'];
        $intensidad = "$intensidad%";
      }
      else {
        $intensidad = "%";
      }
      if(isset($_GET['seccion'])){
        $seccion = $_GET['seccion'];
        $seccion = "$seccion%";
      }
      else {
        $seccion = "%";
      }
      $campo = $params[':CAMPO'];
            if(!empty($campo)){
                   $ejercicios = $this->model-> filtrarPorCampos($nombre, $musculo, $intensidad, $seccion);
                   return $this->view->response($ejercicios, 200);
            }
    }

    public function ordenarPorCampo($params = null){
      if(isset($_GET['order']) && !(is_numeric($_GET['order']))){
        $orden = $_GET['order'];
      if ($orden == "ASC" || $orden == "asc" ){
        $orden == "ASC";
      }
      else{
        $orden == "DESC";
      }
        
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
       return $this->view->response("Bad Request", 400);
       break;
      }
     }
     else{
          return $this->view->response("Bad Request", 400);
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

    // TODO: preguntar de saltos de linea
    public function anadirEjercicio(){
      
      $data = $this->getData();
      $iteracion = 0;
      if (is_array($data)){
        foreach($data as $JSON){
          $iteracion++;
          if (!(isset($JSON->nombre_ej) && isset($JSON->musculo_id) && isset($JSON->intensidad_ej) && isset($JSON->seccion_ej) && isset($JSON->descripcion_ej))){
            $this->view->response("El elemento numero: ".$iteracion." que ha insertado no se ha podido agragar.", 400);
          }
          else{

          $id = $this->model->agregarEjercicio($JSON->nombre_ej, $JSON->musculo_id, $JSON->intensidad_ej, $JSON->seccion_ej, $JSON->descripcion_ej);
      
          $nuevoejercicio = $this->model->obtenerEjercicio($id);
          if ($nuevoejercicio){
            $this->view->response($nuevoejercicio, 200);
          }
          else{
            $this->view->response("El ejercicio numero:".$JSON." no se pudo incluir a la base de datos", 400);
          }
        }
        }

        
      }
      else{
      $id = $this->model->agregarEjercicio($data->nombre_ej, $data->musculo_id, $data->intensidad_ej, $data->seccion_ej, $data->descripcion_ej);
      
      $nuevoejercicio = $this->model->obtenerEjercicio($id);
      if ($nuevoejercicio){
          $this->view->response($nuevoejercicio, 200);
      }
      else{
          $this->view->response("La tarea no fue creada", 500);
      }
    }
    }

    public function editarEjercicio($params = null){
      
      $id = $params[':ID'];
      $data = $this->getData();
      if (is_array($data)){
        $this->view->response("Bad request", 400);
      }
      else{
        if (!(isset($data->nombre_ej) && isset($data->musculo_id) && isset($data->intensidad_ej) && isset($data->seccion_ej) && isset($data->descripcion_ej))){
          $this->view->response("Tiene al menos de un elemento que no está seteado", 400);
        }
        else{
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

    }
   
    
   
}