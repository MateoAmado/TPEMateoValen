<?php


class EjerciciosModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_db;charset=utf8', 'root', '');
    }

    function obtenerEjercicios(){
        $query = $this->db->prepare("SELECT * FROM ejercicios");
        $query->execute();

        $ejercicios = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $ejercicios;
    }

}