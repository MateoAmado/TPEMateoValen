<?php
require_once 'libs\smarty\libs\Smarty.class.php';

class EjerciciosView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function mostrarViewEjercicios($ejercicios, $musculos, $id_elegido = null){
        $this->smarty->assign('musculos', $musculos);
        $this->smarty->assign('ejercicios', $ejercicios);
        $this->smarty->assign('elegido', $id_elegido);
        $this->smarty->display('tablaejercicios.tpl');
    }

      function mostrarViewEjercicio($ejercicio){
        $this->smarty->assign('ejercicio', $ejercicio);
        $this->smarty->display('ejercicio.tpl');
    }
    
     function editarFormulario($ejercicio, $musculos){
        $this->smarty->assign('musculos',$musculos);
        $this->smarty->assign('ejercicio', $ejercicio);
        $this->smarty->display('editarejer.tpl');
     }
     function eliminarEjercicioView($ejercicio){
        $this->smarty->assign('ejercicio', $ejercicio);
        $this->smarty->display('eliminarejer.tpl');
     }
    function ejercicioNuevoForm($musculos){
        $this->smarty->assign('musculos', $musculos);
        $this->smarty->display('agregarform.tpl');
     }
     function confirmar($texto){
        $this->smarty->assign('texto', $texto);
        $this->smarty->display('confirmar.tpl');
     }
     function mostrarHome($ejercicios){
        $this->smarty->assign('ejercicios', $ejercicios);
        $this->smarty->display('home.tpl');
    }

}