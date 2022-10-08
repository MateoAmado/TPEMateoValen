<?php


class EjerciciosModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_db;charset=utf8', 'root', '');
    }

    public function obtenerEjercicios(){
        $sentencia = $this->db->prepare("SELECT * FROM ejercicios");
        $sentencia->execute();

        $ejercicios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $ejercicios;
    }

    public function obtenerEjerciciosCateg(){
        $sentencia = $this->db->prepare("SELECT * FROM ejercicios AS ejer, musculos AS mu WHERE ejer.musculo_id = mu.id;");
        $sentencia->execute();

        $ejercicios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $ejercicios;
    }
    
    public function obtenerEjercicio($id){
        $sentencia = $this->db->prepare("SELECT * FROM `ejercicios` WHERE id=?");
        $sentencia->execute([$id]);

        $ejercicio = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $ejercicio;
    }



}