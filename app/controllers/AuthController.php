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

    public function mostrarFormRegistro(){
        $this->view->mostrarFormularioRegistro();
    }

    public function verificarNuevoUsuario(){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordhash = password_hash($password, PASSWORD_BCRYPT);
        }

        $user = $this->model->buscarUsuario($username);
        if ($username == $user->user){
            $error = "Este ususario ya existe";
            $this->view->mostrarFormularioRegistro($error);
        }
        else{
            $this->model->cargarUsuario($username, $passwordhash);
            header("Location: " . BASE_URL);
        }
    }

    public function mostrarInicio(){
        $this->view->mostrarViewInicio();
    }

    public function validarUsuario() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->model->buscarUsuario($username);

        if ($user && password_verify($password, $user->password)) {

            session_start();
            $_SESSION['user'] = $user->id_usuario;
            $_SESSION['username'] = $user->nombre_usuario;
            $_SESSION['rol'] = $user->rol_usuario;
            $_SESSION['is_logged'] = true;

            header("Location: " . BASE_URL);
            die();
        } else {
           $this->view->mostrarViewInicio("El usuario o la contraseña no existe.");
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