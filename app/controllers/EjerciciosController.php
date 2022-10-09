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
        $this->view->MostrarEjercicios($ejercicios);
    }

    public function Mostrar_Ejercicio($id){
       $ejercicio = $this->model->obtenerEjercicio($id);
       $this->view->MostrarEjercicio($ejercicio);
    }

    public function Editar_Ejercicio($id){
        $ejercicio = $this->model->obtenerEjercicio($id);
        $this->view->EditarEjercicio($ejercicio);
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
    

}
