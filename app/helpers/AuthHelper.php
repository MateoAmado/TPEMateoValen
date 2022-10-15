<?php

class AuthHelper {
    function checkLoggedIn() {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
          };
    }
    
     function checkAdmin(){
        if($_SESSION['rol']=="admin"){
            return true;
        }
        else{
            return false;
        }
    } 
}