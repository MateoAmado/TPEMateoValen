<?php
require_once 'libs\smarty\libs\Smarty.class.php';

class EjerciciosView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function MostrarEjercicios($ejercicios){
        $this->smarty->assign('count', count($ejercicios)); 
        $this->smarty->assign('ejercicios', $ejercicios);
        $this->smarty->display('tablaejercicios.tpl');
    }

      function MostrarEjercicio($ejercicio){
        $this->smarty->assign('ejercicio', $ejercicio);
        $this->smarty->display('ejercicio.tpl');
    }

}