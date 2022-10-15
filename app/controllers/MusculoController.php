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
      if (session_status() != PHP_SESSION_ACTIVE){
        session_start();
      };
    }

   public function Mostrar_Musculos(){
      $musculos = $this->model->obtenerMusculos();
      $this->view->MostrarMusculos($musculos);
    }

    public function Mostrar_Musculo($id){
      $musculo = $this->model->obtenerMusculo($id);
      if (!empty($musculo)){
        $this->view->MostrarMusculo($musculo);
      }
      else{
        header("Location: " . MUSCULOS);
      }
    }

    public function Editar_Musculo($id){
      $musculo = $this->model->obtenerMusculo($id);
      if (!empty($musculo)){
      $this->view->MostrarFormulario($musculo);
      }
      else{
        header("Location: " . MUSCULOS);
      }
    }

    public function Confirmar_Edicion($id){
      if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
          isset($_POST['division']) && !empty($_POST['division'])){
      $nombre_musculo = $_POST['nombre'];
      $division_musculo = $_POST['division'];
      $id = (int) $id;

      $this->model->EditarMusculo($id, $nombre_musculo, $division_musculo);
      $this->view->Confirmacion("Este musculo se edito de forma correcta");
      }
      else{
        $this->view->Confirmacion("Este musculo no se pudo editar");
          }
    }

    public function Eliminar_Musculo($id){
        $musculo = $this->model->obtenerMusculo($id);
        if (!empty($musculo)){
        $this->view->VerificarEliminacion($musculo);
      }
      else {
        header("Location: " . MUSCULOS);
      }
    }

    public function Confirmar_Eliminacion($id){
      $musculo = $this->model->obtenerMusculo($id);
      $ejercicios = $this->model->obtenerejercicios($id);
      if (!empty($musculo)){
        if(!empty($ejercicios)){
          $this->view->Confirmacion("No se puede eliminar el musculo, debido a que existen estos ejercicios:", $ejercicios);
        }
        else{
          $this->model->EliminarMusculo($id);
          $this->view->Confirmacion("Se ha eliminado el musculo");
        }
      }
      else{
        $this->view->Confirmacion("Se ha producido un error, intente nuevamente");
      }
    }

    public function Agregar_Musculo(){
       $this->view->MostrarAgregar();
    }

    public function ConfirmarAgregar(){
      if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
          isset($_POST['division']) && !empty($_POST['division'])){
        $nombre_musculo = $_POST['nombre'];
        $division_musculo = $_POST['division'];
        $this->model->AgregarMusculo($nombre_musculo, $division_musculo);
        $this->view->Confirmacion("se agrego el musculo correctamente");
        }
        else{
          $this->view->Confirmacion("No se pudo añadir este musculo a la lista de categorias, chequea los datos e intenta nuevamente");
        }
        

    }
}