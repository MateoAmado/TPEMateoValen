<?php

class AuthHelper {
    function checkLoggedIn() {
        session_start();
         if (!isset($_SESSION['user'])) {
           header("Location:" .LOGIN);
           die();
        }
    }
}