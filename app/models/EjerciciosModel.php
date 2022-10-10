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

    public function ModificarEjercicio($id, $nombre_ej, $musculo, $intensidad, $seccion, $descripcion){
        
        
         $sentencia = $this->db->prepare("UPDATE `ejercicios` SET `nombre_ej`='$nombre_ej',`musculo_id`='$musculo',`intensidad_ej`='$intensidad',`seccion_ej`='$seccion',`descripcion_ej`='$descripcion' WHERE id_ejer=?");
         $sentencia->execute([$id]);

    }

    public function EliminarEjercicio($id){
        $sentencia = $this->db->prepare('DELETE FROM `ejercicios` WHERE id_ejer=?');
        $sentencia->execute([$id]);

    }

    public function AgregarEjercicio($nombre_ej, $musculo_id, $intensidad, $seccion, $descripcion){
        $sentencia = $this->db->prepare('INSERT INTO ejercicios(id_ejer, nombre_ej, musculo_id, intensidad_ej, seccion_ej, descripcion_ej) VALUES(?,?,?,?,?,?)');
        $sentencia->execute([$this->db->lastInsertId(), $nombre_ej, $musculo_id, $intensidad, $seccion, $descripcion]);
        
    }



}