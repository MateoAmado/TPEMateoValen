<?php
require_once 'libs\smarty\libs\Smarty.class.php';

class HomeView{
    
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); 
    }

    function mostrarHome($ejercicios){
        $this->smarty->assign('ejercicios', $ejercicios);
        $this->smarty->display('home.tpl');
    }
    

}