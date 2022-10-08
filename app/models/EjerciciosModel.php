<?php


class EjerciciosModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_db;charset=utf8', 'root', '');
    }

    public function obtenerEjercicios(){
        $sentencia = $this->db->prepare("SELECT ejercicios.*, musculos.nombre_musculo FROM ejercicios JOIN musculos ON ejercicios.musculo_id = musculos.id;");
        $sentencia->execute();

        $ejercicios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $ejercicios;
    }
    
    public function obtenerEjercicio($id){
        $sentencia = $this->db->prepare("SELECT ejercicios.*, musculos.nombre_musculo FROM ejercicios JOIN musculos ON ejercicios.musculo_id = musculos.id WHERE id_ejer=?");
        $sentencia->execute([$id]);

        $ejercicio = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $ejercicio;
    }



}