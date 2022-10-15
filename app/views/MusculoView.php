<?php
require_once 'libs\smarty\libs\Smarty.class.php';

class MusculoView{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function mostrarViewMusculos($musculos){
        $this->smarty->assign('count', count($musculos)); 
        $this->smarty->assign('musculos', $musculos);
        $this->smarty->display('tablamusculos.tpl');
    }

    function mostrarViewMusculo($musculo){
        $this->smarty->assign('musculo', $musculo);
        $this->smarty->display('musculo.tpl');
    }

    function mostrarFormulario($musculo){
        $this->smarty->assign('musculo', $musculo);
        $this->smarty->display('musculoform.tpl');
    }
    function verificarEliminacion($musculo){
        $this->smarty->assign('musculo',$musculo);
        $this->smarty->display('verificareliminacion.tpl');
    }
    function mostrarAgregar(){
        $this->smarty->display('agregarmusculo.tpl');
    }

    function confirmacion($texto = null, $ejercicios = null){
        $this->smarty->assign('texto', $texto);
        $this->smarty->assign('ejercicios', $ejercicios);
        $this->smarty->display('confirmar.tpl');
    }

}