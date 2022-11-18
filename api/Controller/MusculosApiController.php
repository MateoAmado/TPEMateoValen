<?php
require_once "./api/Model/MusculoModel.php";
require_once "./api/View/APIView.php";
require_once "./api/Helper/AuthApiHelper.php";

class MusculosApiController
{
  private $model;
  private $view;
  private $AuthAPIhelper;
  private $data;

  public function __construct()
  {
    $this->model = new MusculoModel();
    $this->view = new APIView();
    $this->AuthAPIhelper = new AuthApiHelper();
    $this->data = file_get_contents("php://input");
  }

  public function getData()
  {
    return json_decode($this->data);
  }

  public function eliminarMusculo($params = null)
  {
    if (isset($params[':ID']) && is_numeric($params[':ID'])) {
      $id = $params[':ID'];

      if (!$this->AuthAPIhelper->isLoggedIn()) {
        $this->view->response("No estas logeado", 401);
        return;
      }
      $musculo = $this->model->obtenerMusculo($id);
      if ($musculo){ 
        $this->model->borrarMusculo($id);
        $confirmarmusculo = $this->model->obtenerMusculo($id);
        if(empty($confirmarmusculo)){
          return $this->view->response("Se elimino el musculo numero " . $id . ".", 200);
        }
        else{
          return $this->view->response("No se pudo eliminar el musculo debido a que existen ejercicios asociados a el.", 500);
        }
      } else {
        return $this->view->response("Not found", 404);
      }
    } else {
      return $this->view->response("Bad Request", 400);
    }
  }

   public function obtenerMusculos($params = null)
  {
    if (empty($params)) {
      $musculos = $this->model->obtenerMusculos();
      return $this->view->response($musculos, 200);
    } else {
      if (isset($params[':ID']) && is_numeric($params[":ID"])) {
        $musculo = $this->model->obtenerMusculo($params[":ID"]);
        if (!empty($musculo)) {
          return $this->view->response($musculo, 200);
        } else {
          return $this->view->response("Not found", 404);
        }
      } else {
        return $this->view->response("Bad Request", 400);
      }
    }
  }

  

   public function paginarMusculos($params = null)
  {
    if (isset($_GET['primernum']) && isset($_GET['segundonum']) && (is_numeric($_GET['segundonum']) && is_numeric($_GET['primernum']))) {
      $primernum = $_GET['primernum'];
      $segundonum = $_GET['segundonum'];
      $musculos = $this->model->obtenertantosMusculos($primernum, $segundonum);
      if ($musculos == []) {
        return $this->view->response("Not found", 404);
      } else {
        return $this->view->response($musculos, 200);
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
    if (isset($_GET['division'])) {
      $division = $_GET['division'];
      $division = preg_replace('([^A-Za-z])', '', $division);
      $division = "$division%";
    } else {
      $division = "%";
    }
    $musculos = $this->model->filtrarPorCampos($nombre, $division);
    if (!$musculos == []){
    return $this->view->response($musculos, 200);
    }
    else{
      return $this->view->response("Not found", 404);
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
        case "id":
          $musculos = $this->model->ordenarMusculos("musculos.id", $orden);
          return $this->view->response($musculos, 200);
          break;
        case "nombre":
          $musculos = $this->model->ordenarMusculos("musculos.nombre_musculo", $orden);
          return $this->view->response($musculos, 200);
          break;
        case "division":
          $musculos = $this->model->ordenarMusculos("musculos.division_musculo", $orden);
          return $this->view->response($musculos, 200);
          break;
        default:
          return $this->view->response("Bad Request", 400);
          break;
      }
    } else {
      return $this->view->response("Bad Request", 400);
    }
  }

   public function anadirMusculo()
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
        if (isset($JSON->nombre_musculo) && isset($JSON->division_musculo)) {
          $id = $this->model->insertarMusculo($JSON->nombre_musculo, $JSON->division_musculo);
          $nuevomusculo = $this->model->obtenerMusculo($id);
          $respuesta[$iteracion] = json_encode($nuevomusculo);
        } 
      }
      if(count($respuesta) == count($data)){
            $this->view->response("Todos los elementos se agregaron correctamente", 200);
      }
      else{
        $this->view->response("Ocurrio un error al agregar algunos de los elementos(chequear datos).", 400);
      }
    } else //entra al else si solo se quiere agregar un musculo.
     {
      if(isset($data->nombre_musculo) && isset($data->division_musculo) && !empty($data->nombre_musculo) && !empty($data->division_musculo)){
      $id = $this->model->insertarMusculo($data->nombre_musculo, $data->division_musculo);
      $nuevomusculo = $this->model->obtenerMusculo($id);
      if ($nuevomusculo) {
        $this->view->response($nuevomusculo, 200);
      } else {
        $this->view->response("La tarea no fue creada", 500);
      }
    }
    else{
      $this->view->response("Verificar Datos", 400);
    }
    }
  }

  public function editarMusculo($params = null)
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
      if (!(isset($data->nombre_musculo) && isset($data->division_musculo))) {
        $this->view->response("Verificar Datos", 400);
      } else {
        $musculoaeditar = $this->model->obtenerMusculo($id);
        if ($musculoaeditar) {
          $this->model->actualizarMusculo($id, $data->nombre_musculo, $data->division_musculo);
          $musculoeditado = $this->model->obtenerMusculo($id);
          $this->view->response($musculoeditado, 200);
        } else {
          $this->view->response("El musculo con el id:" . $id . " no existe papa", 404);
        }
      }
    }
  } 
}