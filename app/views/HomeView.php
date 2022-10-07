<?php
require_once 'libs\smarty\libs\Smarty.class.php';

class HomeView{
    
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function MostrarHome($ejercicios) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($ejercicios)); 
        $this->smarty->assign('ejercicios', $ejercicios);

        // mostrar el tpl
        $this->smarty->display('home.tpl');
    }
    

}