<?php

class EjerciciosView {

    function MostrarEjercicios($ejercicios){

        require_once './templates/header.tpl'; 
        echo "<p> </p>";
        var_dump($ejercicios);
        require_once './templates/footer.tpl';

    }

    function MostrarEjercicio($ejercicio){

        require_once './templates/header.tpl'; 
        echo "<p> </p>";
        var_dump($ejercicio);
        require_once './templates/footer.tpl';
    }

}