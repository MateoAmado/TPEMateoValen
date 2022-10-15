<?php
require_once './app/views/EjerciciosView.php';
require_once './app/models/EjerciciosModel.php';
require_once './app/helpers/AuthHelper.php';


class EjerciciosController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new EjerciciosModel();
        $this->view = new EjerciciosView();
        
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
    }

    public function mostrarEjercicios() {
        $ejercicios = $this->model->obtenerEjercicios();
        $musculos = $this->model->obtenermusculos();
        $this->view->mostrarViewEjercicios($ejercicios, $musculos);
    }

    public function mostrarEjercicio($id){
       $ejercicio = $this->model->obtenerEjercicio($id);
       if (!empty($ejercicio)){
       $this->view->mostrarViewEjercicio($ejercicio);
       }
       else {
        header("Location: " . EJERCICIOS);
       }
    }

    public function editarEjercicio($id){
        if($_SESSION['rol']=="admin"){
        $ejercicio = $this->model->obtenerEjercicio($id);
        if (!empty($ejercicio)){
            $musculos = $this->model->obtenermusculos();
            $this->view->editarFormulario($ejercicio, $musculos);
            }
            else {
             header("Location: " . EJERCICIOS);
            }
        }else{
            header("Location: " . EJERCICIOS);
        }
    }

    public function confirmarEdicion($id){
        if($_SESSION['rol']=="admin"){
        if (isset($_POST['nombre_ejercicio']) && !empty($_POST['nombre_ejercicio']) &&
            isset($_POST['nombre_musculo']) && !empty($_POST['nombre_musculo']) &&
            isset($_POST['Intensidad']) && !empty($_POST['Intensidad']) &&
            isset($_POST['seccion']) && !empty($_POST['seccion']) &&
            isset($_POST['descripcion']) && !empty($_POST['descripcion'])){
        $nombre_ej = $_POST['nombre_ejercicio'];
        $id = (int) $id;
        $musculo = $_POST['nombre_musculo'];
        $musculo = (int) $musculo;
        $intensidad = $_POST['Intensidad'];
        $intensidad = (int) $intensidad;
        $seccion = $_POST['seccion'];
        $descripcion = $_POST['descripcion'];

        $this->model->modificarEjercicio($id, $nombre_ej, $musculo, $intensidad, $seccion, $descripcion);
         $this->view->confirmar("Se ha editado el ejercicio con exito");
        }
        else {
            $this->view->confirmar("No se ha podido editar el ejercicio, chequea bien los valores e intenta de nuevo");
        }
     }else{
        header("Location: " . EJERCICIOS);
     }
    }

    public function eliminarEjercicio($id){
        if($_SESSION['rol']=="admin"){
        $ejercicio = $this->model->obtenerEjercicio($id);
        if (!empty($ejercicio)){
            $this->view->eliminarEjercicioView($ejercicio);
            }
            else {
             header("Location: " . EJERCICIOS);
            }
        }else{
            header("Location: " . EJERCICIOS);
        }
    }

    public function confirmarEliminar($id){
        if($_SESSION['rol']=="admin"){
        $ejercicio = $this->model->obtenerEjercicio($id);
        if (!empty($ejercicio)){
        $this->model->borrarEjercicio($id);
        $this->view->confirmar("Se ha eliminado el ejercicio de la lista de ejercicios");
        }
        else{
            $this->view->confirmar("Se ha prodicido un error");
        }
     }else{
        header("Location: " . EJERCICIOS);
    }
    }

    public function obtenerEjercicioNuevo(){
        if($_SESSION['rol']=="admin"){
       $musculos = $this->model->obtenermusculos();
        $this->view->ejercicioNuevoForm($musculos);
        }
        else{
            header("Location: " . EJERCICIOS);
        }
    }

    public function confirmarAgregar(){
        if($_SESSION['rol']=="admin"){
         if (isset($_POST['nombre_ejercicio']) && !empty($_POST['nombre_ejercicio']) &&
            isset($_POST['nombre_musculo']) && !empty($_POST['nombre_musculo']) &&
            isset($_POST['Intensidad']) && !empty($_POST['Intensidad']) &&
            isset($_POST['seccion']) && !empty($_POST['seccion']) &&
            isset($_POST['descripcion']) && !empty($_POST['descripcion'])){
        $nombre_ej = $_POST['nombre_ejercicio'];
        $musculo = $_POST['nombre_musculo'];
        $musculo = (int) $musculo;
        $intensidad = $_POST['Intensidad'];
        $intensidad = (int) $intensidad;
        $seccion = $_POST['seccion'];
        $descripcion = $_POST['descripcion'];

        $this->model->agregarEjercicio($nombre_ej, $musculo, $intensidad, $seccion, $descripcion);
        $this->view->confirmar("Se agregó el ejercicio");
        }
        else{
            $this->view->confirmar("운동을 추가할 수 없습니다. 값을 확인하고 다시 시도하십시오.");
        } 
     }else{
        header("Location: " . EJERCICIOS);
     }  
    }

    public function mostrarFiltro(){
        $musculo = $_POST['nombre_musculo'];
        $musculo = (int) $musculo;
        $musculos = $this->model->obtenermusculos();
        $ejercicios = $this->model->filtrarEjercicios($musculo);
        $this->view->mostrarViewEjercicios($ejercicios, $musculos, $musculo);
    }

}
