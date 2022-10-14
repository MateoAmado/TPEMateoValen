<?php
require_once 'libs\smarty\libs\Smarty.class.php';

class EjerciciosView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function MostrarEjercicios($ejercicios, $musculos){
        //$this->smarty->assign('count', count($ejercicios));
         $this->smarty->assign('musculos', $musculos);
        $this->smarty->assign('ejercicios', $ejercicios);
        $this->smarty->display('tablaejercicios.tpl');
    }

      function MostrarEjercicio($ejercicio){
        $this->smarty->assign('ejercicio', $ejercicio);
        $this->smarty->display('ejercicio.tpl');
    }
    
     function EditarEjercicio($ejercicio, $musculos){
        $this->smarty->assign('musculos',$musculos);
        $this->smarty->assign('ejercicio', $ejercicio);
        $this->smarty->display('editarejer.tpl');
     }
     function EliminarEjercicioView($ejercicio){
        $this->smarty->assign('ejercicio', $ejercicio);
        $this->smarty->display('eliminarejer.tpl');
     }
    function EjercicioNuevoForm($musculos){
        $this->smarty->assign('musculos', $musculos);
        $this->smarty->display('agregarform.tpl');
     }
     function Confirmar($texto){
        $this->smarty->assign('texto', $texto);
        $this->smarty->display('confirmar.tpl');
     }

}