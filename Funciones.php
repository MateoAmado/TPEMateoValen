<?php 
  function getEjercicios(){
    $db = new PDO('mysql:host=localhost;'
    .'dbname=tpe_db;charset=utf8'
    , 'root', '');
    
    $sentencia = $db->prepare( "SELECT * FROM ejercicios");
    $sentencia->execute();
    $ejercicios = $sentencia->fetchAll(PDO::FETCH_OBJ);

    return $ejercicios;

  }
  $tabla_ej = getEjercicios();
 
  /*echo "<ul>";
  foreach($tabla_ej as $ejercicio){
        echo "<li>" . $ejercicio->nombre_ej. "</li>";
        echo "<li>" . $ejercicio->musculo_ej. "</li>";
        echo "<li>" . $ejercicio->intensidad_ej. "</li>";
        echo "<li>" . $ejercicio->seccion_ej. "</li>";
  }
  echo "</ul>";
  */

?>


