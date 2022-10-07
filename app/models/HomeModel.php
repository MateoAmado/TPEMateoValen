<?php
class HomeModel{
     private $db;

     public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_db;charset=utf8', 'root', '');

     }

     public function obtenerejerciciosrandom(){
        $sentencia = $this->db->prepare("SELECT ejercicios.*, musculos.nombre_musculo FROM ejercicios JOIN musculos ON ejercicios.musculo_id = musculos.id ORDER BY RAND() LIMIT 6;");
        $sentencia->execute();

        $ejercicios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $ejercicios;
        //"SELECT * FROM ejercicios ORDER BY RAND() LIMIT 6;"
     }
}