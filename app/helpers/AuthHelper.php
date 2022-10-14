<?php

class AuthHelper {

    protected function checkLoggedIn() {
        session_start();
         if (isset($_SESSION['user']) ) {
            
        }
    } 
}
