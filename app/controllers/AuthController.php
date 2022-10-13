<?php
require_once './app/views/AuthView.php';
require_once './app/models/AuthModel.php';


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

    public function Verificar_Nuevo_Usuario(){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordhash = password_hash($password, PASSWORD_BCRYPT);
        }

        //$user="pepe";
        //$user = $this->model->BuscarUsuario($username);
        // TODO: hacer esto de aca abajo
        if ($this->model->BuscarUsuario($username)){
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

    public function Validar_Usuario() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->model->BuscarUsuario($username);

        if ($user && password_verify($password, $user->password)) {

            session_start();
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_USERNAME'] = $user->username;
            $_SESSION['IS_LOGGED'] = true;

            header("Location: " . BASE_URL);
        } else {
           $this->view->MostrarInicio("El usuario o la contraseña no existe.");
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }

}