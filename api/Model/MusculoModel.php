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

    public function actualizarMusculo($id, $nombre_musculo, $division_musculo){
        $sentencia = $this->db->prepare("UPDATE `musculos` SET `nombre_musculo`='$nombre_musculo',`division_musculo`='$division_musculo' WHERE id=?");
        $sentencia->execute([$id]);
    }
    
    public function borrarMusculo($id){
        try{
        $sentencia = $this->db->prepare('DELETE FROM `musculos` WHERE id=?');
        $sentencia->execute([$id]);
        }
        catch(Exception $e){
            $error = $e->getMessage();
            return $error;
        }
    }

    public function filtrarPorCampos($nombre, $division){
        $sentencia = $this->db->prepare('SELECT * FROM musculos WHERE nombre_musculo LIKE "'.$nombre.'"   AND division_musculo LIKE "'.$division.'"');
        $sentencia->execute();
       
        $musculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $musculos;
     }
    
    public function insertarMusculo($nombre_musculo, $division_musculo){
        $sentencia = $this->db->prepare('INSERT INTO musculos(id, nombre_musculo, division_musculo) VALUES(?,?,?)');
        $sentencia->execute([$this->db->lastInsertId(), $nombre_musculo, $division_musculo]);

        return $this->db->lastInsertId();
    }

    public function obtenertantosMusculos($primernum, $segundonum){
        $sentencia = $this->db->prepare('SELECT * FROM musculos WHERE id BETWEEN '.$primernum.' AND '.$segundonum.'');
        $sentencia->execute();
       
        $musculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $musculos;
     }

     public function ordenarMusculos($columna, $orden=null){
        $sentencia = $this->db->prepare('SELECT * FROM musculos ORDER BY '.$columna.' '.$orden.'');
        $sentencia->execute();

        $musculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $musculos;
    }

}
