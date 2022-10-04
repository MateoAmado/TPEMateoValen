<?php

class MusculoView{
    
    function MostrarMusculos($musculos){
      
        require_once './templates/header.php'; 
        echo "<p> </p>";
        echo "<p> </p>";
        echo "<p> </p>";
        var_dump($musculos);
        require_once './templates/footer.php';

    }

}