<?php

class EjerciciosView {

    function MostrarEjercicios($ejercicios){

        require_once './templates/header.php'; 
        echo "<p> </p>";
        var_dump($ejercicios);
        require_once './templates/footer.php';

    }

}