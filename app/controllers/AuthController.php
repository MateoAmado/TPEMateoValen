<?php
require_once './app/views/AuthView.php';
require_once './app/models/AuthModel.php';
require_once './app/helpers/AuthHelper.php';


class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new AuthModel();
        $this->view = new AuthView();
    }

    public function Mostrar_FormRegistro(){
        $this->view->MostrarFormRegistro();
    }

    public function verificarNuevoUsuario(){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordhash = password_hash($password, PASSWORD_BCRYPT);
        }

        $user = $this->model->BuscarUsuario($username);
        if ($username == $user->user){
            $error = "Este ususario ya existe";
            $this->view->MostrarFormRegistro($error);
        }
        else{
            $this->model->CargarUsuario($username, $passwordhash);
            header("Location: " . BASE_URL);
        }
    }

    public function Mostrar_Inicio(){
        $this->view->MostrarInicio();
    }

    public function validarUsuario() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->model->BuscarUsuario($username);

        if ($user && password_verify($password, $user->password)) {

            session_start();
            $_SESSION['user'] = $user->id_usuario;
            $_SESSION['username'] = $user->nombre_usuario;
            $_SESSION['is_logged'] = true;

            header("Location: " . BASE_URL);
            die();
        } else {
           $this->view->MostrarInicio("El usuario o la contraseña no existe.");
        }
    }

    public function logout() {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();};
        session_destroy();
        header("Location: " . BASE_URL);
        die();
    }

}