<?php 
require_once "./app/models/MusculoModel.php";
require_once "./app/views/MusculoView.php";
require_once './app/helpers/AuthHelper.php';

class MusculoController{
    private $model;
    private $view;

    public function __construct(){
       $this->model = new MusculoModel();
       $this->view = new MusculoView();

      $authHelper = new AuthHelper();
      $authHelper->checkLoggedIn();
    }

   public function mostrarMusculos(){
      $musculos = $this->model->obtenerMusculos();
      $this->view->mostrarViewMusculos($musculos);
    }

    public function mostrarMusculo($id){
      $musculo = $this->model->obtenerMusculo($id);
      if (!empty($musculo)){
        $this->view->mostrarViewMusculo($musculo);
      }
      else{
        header("Location: " . MUSCULOS);
      }
    }

    public function editarMusculo($id){
      if($_SESSION['rol']=="admin"){
      $musculo = $this->model->obtenerMusculo($id);
      if (!empty($musculo)){
      $this->view->mostrarFormulario($musculo);
      }
      else{
        header("Location: " . MUSCULOS);
      }
    }else{
      header("Location: " . MUSCULOS);
    }
  }

    public function confirmarEdicion($id){
      if($_SESSION['rol']=="admin"){
      if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
          isset($_POST['division']) && !empty($_POST['division'])){
      $nombre_musculo = $_POST['nombre'];
      $division_musculo = $_POST['division'];
      $id = (int) $id;

      $this->model->actualizarMusculo($id, $nombre_musculo, $division_musculo);
      $this->view->confirmacion("Este musculo se edito de forma correcta");
      }
      else{
        $this->view->confirmacion("Este musculo no se pudo editar");
          }
      }else{
        header("Location: " . MUSCULOS);
      }
    }

    public function eliminarMusculo($id){
      if($_SESSION['rol']=="admin"){
        $musculo = $this->model->obtenerMusculo($id);
        if (!empty($musculo)){
        $this->view->verificarEliminacion($musculo);
      }
      else {
        header("Location: " . MUSCULOS);
      }
    }else{
      header("Location: " . MUSCULOS);
    }
  }

    public function confirmarEliminacion($id){
      if($_SESSION['rol']=="admin"){
      $musculo = $this->model->obtenerMusculo($id);
      $ejercicios = $this->model->obtenerejercicios($id);
      if (!empty($musculo)){
        if(!empty($ejercicios)){
          $this->view->confirmacion("No se puede eliminar el musculo, debido a que existen estos ejercicios:", $ejercicios);
        }
        else{
          $this->model->borrarMusculo($id);
          $this->view->confirmacion("Se ha eliminado el musculo");
        }
      }
      else{
        $this->view->confirmacion("Se ha producido un error, intente nuevamente");
      }
    }else{
      header("Location: " . MUSCULOS);
    }
  }

    public function agregarMusculo(){
      if($_SESSION['rol']=="admin"){
       $this->view->mostrarAgregar();
      }
      else{
        header("Location: " . MUSCULOS);
      }
    }

    public function confirmarAgregar(){
      if($_SESSION['rol']=="admin"){
      if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
          isset($_POST['division']) && !empty($_POST['division'])){
        $nombre_musculo = $_POST['nombre'];
        $division_musculo = $_POST['division'];
        $this->model->insertarMusculo($nombre_musculo, $division_musculo);
        $this->view->confirmacion("se agrego el musculo correctamente");
        }
        else{
          $this->view->confirmacion("No se pudo añadir este musculo a la lista de categorias, chequea los datos e intenta nuevamente");
        }
      }else{
        header("Location: " . MUSCULOS);
      }
        

    }
}