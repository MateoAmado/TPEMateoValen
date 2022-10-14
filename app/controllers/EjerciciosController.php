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
        // $authHelper->checkLoggedIn();
    }

    public function MostrarEjercicios() {
        $ejercicios = $this->model->obtenerEjercicios();
        $musculos = $this->model->obtenermusculos();
        $this->view->MostrarEjercicios($ejercicios, $musculos);
    }

    public function Mostrar_Ejercicio($id){
       $ejercicio = $this->model->obtenerEjercicio($id);
       if (!empty($ejercicio)){
       $this->view->MostrarEjercicio($ejercicio);
       }
       else {
        header("Location: " . EJERCICIOS);
       }
    }

    public function Editar_Ejercicio($id){
        $ejercicio = $this->model->obtenerEjercicio($id);
        if (!empty($ejercicio)){
            $musculos = $this->model->obtenermusculos();
            $this->view->EditarEjercicio($ejercicio, $musculos);
            }
            else {
             header("Location: " . EJERCICIOS);
            }
    }

    public function ConfirmarEdicion($id){
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

        $this->model->ModificarEjercicio($id, $nombre_ej, $musculo, $intensidad, $seccion, $descripcion);
         $this->view->Confirmar("Se ha editado el ejercicio con exito");
        }
        else {
            $this->view->Confirmar("No se ha podido editar el ejercicio, chequea bien los valores e intenta de nuevo");
        }
    }

    public function Eliminar_Ejercicio($id){
        $ejercicio = $this->model->obtenerEjercicio($id);
        if (!empty($ejercicio)){
            $this->view->EliminarEjercicioView($ejercicio);
            }
            else {
             header("Location: " . EJERCICIOS);
            }
    }

    public function ConfirmarEliminar($id){
        $ejercicio = $this->model->obtenerEjercicio($id);
        if (!empty($ejercicio)){
        $this->model->EliminarEjercicio($id);
        $this->view->Confirmar("Se ha eliminado el ejercicio de la lista de ejercicios");
        }
        else{
            $this->view->Confirmar("Se ha prodicido un error");
        }
    }

    public function Obtener_Ejercicio_Nuevo(){
       $musculos = $this->model->obtenermusculos();
        $this->view->EjercicioNuevoForm($musculos);
    }

    public function ConfirmarAgregar(){
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

        $this->model->AgregarEjercicio($nombre_ej, $musculo, $intensidad, $seccion, $descripcion);
        $this->view->Confirmar("Se agregó el ejercicio");
        }
        else{
            $this->view->Confirmar("운동을 추가할 수 없습니다. 값을 확인하고 다시 시도하십시오.");
        }   
    }

    public function MostrarFiltro(){
        $musculo = $_POST['nombre_musculo'];
        $musculo = (int) $musculo;
        $musculos = $this->model->obtenermusculos();
        $ejercicios = $this->model->FiltrarEjercicios($musculo);
        $this->view->MostrarEjercicios($ejercicios, $musculos);
    }

}
