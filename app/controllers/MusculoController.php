<?php 
require_once "./app/models/MusculoModel.php";
require_once "./app/views/MusculoView.php";

class MusculoController{
    private $model;
    private $view;

    public function __construct(){
       $this->model = new MusculoModel();
       $this->view = new MusculoView();
    }

   public function Mostrar_Musculos(){
      $musculos = $this->model->obtenerMusculos();
      $this->view->MostrarMusculos($musculos);
    }

    public function Mostrar_Musculo($id){
      $musculo = $this->model->obtenerMusculo($id);
      $this->view->MostrarMusculo($musculo);
    }

    public function Editar_Musculo($id){
      $musculo = $this->model->obtenerMusculo($id);
      $this->view->MostrarFormulario($musculo);
    }

    public function Confirmar_Edicion($id){
      $nombre_musculo = $_POST['nombre'];
      $division_musculo = $_POST['division'];
      $id = (int) $id;

      $this->model->EditarMusculo($id, $nombre_musculo, $division_musculo);
      $this->view->Confirmacion();
    }

    public function Eliminar_Musculo($id){
        $musculo = $this->model->obtenerMusculo($id);
        $this->view->VerificarEliminacion($musculo);
    }

    public function Confirmar_Eliminacion($id){
      $this->model->EliminarMusculo($id);
      $this->view->Confirmacion();
    }

    public function Agregar_Musculo(){
       $this->view->MostrarAgregar();
    }

    public function ConfirmarAgregar(){
        $nombre_musculo = $_POST['nombre'];
        $division_musculo = $_POST['division'];
        $this->model->AgregarMusculo($nombre_musculo, $division_musculo);
        $this->view->Confirmar();
//isset(ej: $musculo)
    }
}