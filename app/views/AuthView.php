<?php
require_once 'libs\smarty\libs\Smarty.class.php';

class AuthView{
    
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); 
    }

    public function MostrarFormRegistro($error=null){    
        if (isset($error)){
            $this->smarty->assign('error', $error);
        }
        $this->smarty->display('registrarse.tpl');
    }
    public function MostrarInicio(){
        $this->smarty->display('login.tpl');
    }

}
