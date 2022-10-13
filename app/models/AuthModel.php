<?php
class AuthModel{
     private $db;

     public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_db;charset=utf8', 'root', '');
      }
}