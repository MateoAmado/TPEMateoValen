<?php
class AuthModel{
     private $db;

     public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_db;charset=utf8', 'root', '');
      }

      public function CargarUsuario($username, $passwordhash){
             $sentencia = $this->db->prepare("INSERT INTO `usuarios`(`id_usuario`, `nombre_usuario`, `password`, `rol_usuario`) VALUES (?,?,?,?)");
             $sentencia->execute([$this->db->lastInsertId(), $username, $passwordhash, "publico"]);

      }

      public function BuscarUsuario($username){
            $sentencia = $this->db->prepare("SELECT * FROM `usuarios` WHERE nombre_usuario=?");
            $sentencia->execute([$username]);

            $arreglo = $sentencia->fetch(PDO::FETCH_OBJ);
              
            if(!empty($arreglo)){
              return true;
            }
            else{
              return false;
            }
            //$username = $sentencia->fetch(PDO::FETCH_OBJ);
            //return $username;

      }
}