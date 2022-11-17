<?php
require_once "./api/Model/EjerciciosModel.php";
require_once "./api/View/APIView.php";
require_once "./api/Helper/AuthApiHelper.php";

class EjerciciosApiController
{
  private $model;
  private $view;
  private $AuthAPIhelper;
  private $data;

  public function __construct()
  {
    $this->model = new EjerciciosModel();
    $this->view = new APIView();
    $this->AuthAPIhelper = new AuthApiHelper();
    $this->data = file_get_contents("php://input");
  }

  public function getData()
  {
    return json_decode($this->data);
  }

  public function eliminarEjercicio($params = null)
  {
    if (isset($params[':ID']) && is_numeric($params[':ID'])) {
      $id = $params[':ID'];

      if (!$this->AuthAPIhelper->isLoggedIn()) {
        $this->view->response("No estas logeado", 401);
        return;
      }
      $ejercicio = $this->model->obtenerEjercicio($id);
      if ($ejercicio) {
        $this->model->borrarEjercicio($id);
        return $this->view->response("Se elimino el ejercicio numero " . $id . ".", 200);
      } else {
        return $this->view->response("Not found", 404);
      }
    } else {
      return $this->view->response("Bad Request", 400);
    }
  }

  public function obtenerEjercicios($params = null)
  {
    if (empty($params)) {
      $ejercicios = $this->model->obtenerEjercicios();
      return $this->view->response($ejercicios, 200);
    } else {
      if (isset($params[':ID']) && is_numeric($params[":ID"])) {
        $ejercicio = $this->model->obtenerEjercicio($params[":ID"]);
        if (!empty($ejercicio)) {
          return $this->view->response($ejercicio, 200);
        } else {
          return $this->view->response("Not found", 404);
        }
      } else {
        return $this->view->response("Bad Request", 400);
      }
    }
  }

  public function paginarEjercicios($params = null)
  {
    if (isset($_GET['primernum']) && isset($_GET['segundonum']) && (is_numeric($_GET['segundonum']) && is_numeric($_GET['primernum']))) {
      $primernum = $_GET['primernum'];
      $segundonum = $_GET['segundonum'];
      $ejercicios = $this->model->obtenertantosEjercicios($primernum, $segundonum);
      if ($ejercicios == []) {
        return $this->view->response("Not found", 404);
      } else {
        return $this->view->response($ejercicios, 200);
      }
    } else {
      $this->view->response("Bad request", 400);
    }
  }
  public function filtrarporcampos($params = null)
  {
    if (isset($_GET['nombre'])){
      $nombre = $_GET['nombre'];
      $nombre = preg_replace('([^A-Za-z])', '', $nombre);
      $nombre = "$nombre%";
    } else {
      $nombre = "%";
    }
    if (isset($_GET['musculo'])) {
      $musculo = $_GET['musculo'];
      $musculo = preg_replace('([^A-Za-z])', '', $musculo);
      $musculo = "$musculo%";
    } else {
      $musculo = "%";
    }
       if (isset($_GET['intensidad'])) {
         if (is_numeric($_GET['intensidad'])){
        $intensidad =  filter_var ($_GET['intensidad'], FILTER_SANITIZE_NUMBER_INT);
        $intensidad = "$intensidad%";
         }
         else {
           $intensidad = null;
         }
      } else {
        $intensidad = "%";
      }
    if (isset($_GET['seccion'])) {
      $seccion = $_GET['seccion'];
      $seccion = preg_replace('([^A-Za-z])', '', $seccion);
      $seccion = "$seccion%";
    } else {
      $seccion = "%";
    }
    $ejercicios = $this->model->filtrarPorCampos($nombre, $musculo, $intensidad, $seccion);
    if ($intensidad != null ){
    if (!$ejercicios == []){
    return $this->view->response($ejercicios, 200);
    }
    else{
      return $this->view->response("Not found", 404);
    }
    }
    else{
      return $this->view->response("Bad Request", 400);
    }
  }

  public function ordenarPorCampo($params = null)
  {
    if (isset($_GET['order']) && !(is_numeric($_GET['order']))) {
      $orden = $_GET['order'];
      if ($orden == "ASC" || $orden == "asc") {
        $orden == "ASC";
      } else {
        $orden == "DESC";
      }

      switch ($params[":CAMPO"]) {
        case "nombre":
          $ejercicios = $this->model->ordenarEjercicios("ejercicios.nombre_ej", $orden);
          return $this->view->response($ejercicios, 200);
          break;
        case "musculo":
          $ejercicios = $this->model->ordenarEjercicios("musculos.nombre_musculo", $orden);
          return $this->view->response($ejercicios, 200);
          break;
        case "intensidad":
          $ejercicios = $this->model->ordenarEjercicios("ejercicios.intensidad_ej", $orden);
          return $this->view->response($ejercicios, 200);
          break;
        case "seccion":
          $ejercicios = $this->model->ordenarEjercicios("ejercicios.seccion_ej", $orden);
          return $this->view->response($ejercicios, 200);
          break;
        case "descripcion":
          $ejercicios = $this->model->ordenarEjercicios("ejercicios.descripcion_ej", $orden);
          return $this->view->response($ejercicios, 200);
          break;
        default:
          return $this->view->response("Bad Request", 400);
          break;
      }
    } else {
      return $this->view->response("Bad Request", 400);
    }
  }

  public function anadirEjercicio()
  {
    if (!$this->AuthAPIhelper->isLoggedIn()) {
      $this->view->response("No estas logeado", 401);
      return;
    }
    $data = $this->getData();
    $iteracion = 0;
    $respuesta = [];

    if (is_array($data)) { 
      //si es un arreglo por cada elemento se itera el foreach.
      foreach ($data as $JSON) {
        $iteracion++;
        if (isset($JSON->nombre_ej) && isset($JSON->musculo_id) && is_numeric($JSON->musculo_id) && $JSON->musculo_id<=6 && $JSON->musculo_id>=1 && isset($JSON->intensidad_ej) && is_numeric($JSON->intensidad_ej) && $JSON->intensidad_ej>=1 && $JSON->intensidad_ej<=3 && isset($JSON->seccion_ej) && isset($JSON->descripcion_ej)) {
          $id = $this->model->agregarEjercicio($JSON->nombre_ej, $JSON->musculo_id, $JSON->intensidad_ej, $JSON->seccion_ej, $JSON->descripcion_ej);
          $nuevoejercicio = $this->model->obtenerEjercicio($id);
          $respuesta[$iteracion] = json_encode($nuevoejercicio);
        } 
      }
      if(count($respuesta) == count($data)){
            $this->view->response("Los elementos se agregaron correctamente", 200);
      }
      else{
        $this->view->response("Ocurrio un error al agregar los elementos(chequear datos).", 400);
      }
    } else //entra al else si solo se quiere agregar un ejercicio.
     {
      $id = $this->model->agregarEjercicio($data->nombre_ej, $data->musculo_id, $data->intensidad_ej, $data->seccion_ej, $data->descripcion_ej);
      $nuevoejercicio = $this->model->obtenerEjercicio($id);
      if ($nuevoejercicio) {
        $this->view->response($nuevoejercicio, 200);
      } else {
        $this->view->response("La tarea no fue creada", 500);
      }
    }
  }

  public function editarEjercicio($params = null)
  {

    $id = $params[':ID'];
    if (!$this->AuthAPIhelper->isLoggedIn()) {
      $this->view->response("No estas logeado", 401);
      return;
    }

    $data = $this->getData();
    if (is_array($data)) {
      $this->view->response("Bad request", 400);
    } else {
      if (!(isset($data->nombre_ej) && isset($data->musculo_id) && !is_numeric($data->musculo_id) && $data->musculo_id>=6 && $data->musculo_id<=1 && isset($data->intensidad_ej) && !is_numeric($data->intensidad_ej) && $data->intensidad_ej<=1 && $data->intensidad_ej>=3 && isset($data->seccion_ej) && isset($data->descripcion_ej))) {
        $this->view->response("Verificar Datos", 400);
      } else {
        $ejercicioaeditar = $this->model->obtenerEjercicio($id);
        if ($ejercicioaeditar) {
          $this->model->modificarEjercicio($id, $data->nombre_ej, $data->musculo_id, $data->intensidad_ej, $data->seccion_ej, $data->descripcion_ej);
          $ejercicioeditado = $this->model->obtenerEjercicio($id);
          $this->view->response($ejercicioeditado, 200);
        } else {
          $this->view->response("El ejercicio con el id:" . $id . " no existe papa", 404);
        }
      }
    }
  }
}
