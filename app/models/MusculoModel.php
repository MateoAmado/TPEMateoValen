<?php

class MusculoModel{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_db;charset=utf8', 'root', '');
    }

    public function obtenerMusculos(){
        $sentencia = $this->db->prepare("SELECT * FROM musculos");
        $sentencia->execute();

        $musculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $musculos;
    }

}