<?php
require_once 'libs\smarty\libs\Smarty.class.php';

class MusculoView{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function MostrarMusculos($musculos){
        $this->smarty->assign('count', count($musculos)); 
        $this->smarty->assign('musculos', $musculos);
        $this->smarty->display('tablamusculos.tpl');
    }

    function MostrarMusculo($musculo){
        $this->smarty->assign('musculo', $musculo);
        $this->smarty->display('musculo.tpl');
    }

    function MostrarFormulario($musculo){
        $this->smarty->assign('musculo', $musculo);
        $this->smarty->display('musculoform.tpl');
    }
    function VerificarEliminacion($musculo){
        $this->smarty->assign('musculo',$musculo);
        $this->smarty->display('verificareliminacion.tpl');
    }
    function MostrarAgregar(){
        $this->smarty->display('agregarmusculo.tpl');
    }

    function Confirmacion($texto = null, $ejercicios = null){
        $this->smarty->assign('texto', $texto);
        $this->smarty->assign('ejercicios', $ejercicios);
        $this->smarty->display('confirmar.tpl');
    }

}