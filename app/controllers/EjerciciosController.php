<?php
require_once './app/views/EjerciciosView.php';
require_once './app/models/EjerciciosModel.php';


class EjerciciosController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new EjerciciosModel();
        $this->view = new EjerciciosView();
    }

    public function MostrarEjercicios() {
        $ejercicios = $this->model->obtenerEjercicios();
        $musculos = $this->model->obtenermusculos();
        $this->view->MostrarEjercicios($ejercicios, $musculos);
    }

    public function Mostrar_Ejercicio($id){
       $ejercicio = $this->model->obtenerEjercicio($id);
       $this->view->MostrarEjercicio($ejercicio);
    }

    public function Editar_Ejercicio($id){
        $ejercicio = $this->model->obtenerEjercicio($id);
        $musculos = $this->model->obtenermusculos();
        $this->view->EditarEjercicio($ejercicio, $musculos);
    }

    public function ConfirmarEdicion($id){
        $nombre_ej = $_POST['nombre_ejercicio'];
        $id = (int) $id;
        $musculo = $_POST['nombre_musculo'];
        $musculo = (int) $musculo;
        $intensidad = $_POST['Intensidad'];
        $intensidad = (int) $intensidad;
        $seccion = $_POST['seccion'];
        $descripcion = $_POST['descripcion'];

         $this->model->ModificarEjercicio($id, $nombre_ej, $musculo, $intensidad, $seccion, $descripcion);
         $this->view->Confirmar();
    }

    public function Eliminar_Ejercicio($id){
        $ejercicio = $this->model->obtenerEjercicio($id);
        $this->view->EliminarEjercicioView($ejercicio);

    }

    public function ConfirmarEliminar($id){
        $this->model->EliminarEjercicio($id);
    }

    public function Obtener_Ejercicio_Nuevo(){
       $musculos = $this->model->obtenermusculos();
        $this->view->EjercicioNuevoForm($musculos);
    }

    public function ConfirmarAgregar(){
        $nombre_ej = $_POST['nombre_ejercicio'];
        $musculo = $_POST['nombre_musculo'];
        $musculo = (int) $musculo;
        $intensidad = $_POST['Intensidad'];
        $intensidad = (int) $intensidad;
        $seccion = $_POST['seccion'];
        $descripcion = $_POST['descripcion'];


        $this->model->AgregarEjercicio($nombre_ej, $musculo, $intensidad, $seccion, $descripcion);
         $this->view->Confirmar();
    }

    public function MostrarFiltro(){
        $musculo = $_GET['nombre_musculo'];
        $musculo = (int) $musculo;
        $musculos = $this->model->obtenermusculos();
        $ejercicios = $this->model->FiltrarEjercicios($musculo);
        $this->view->MostrarEjercicios($ejercicios, $musculos);
    }

}
