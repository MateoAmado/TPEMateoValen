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

    public function obtenerMusculo($id){
        $sentencia = $this->db->prepare("SELECT * FROM `musculos` WHERE id=?");
        $sentencia->execute([$id]);

        $musculo = $sentencia->fetch(PDO::FETCH_OBJ);
        return $musculo;
    }
}