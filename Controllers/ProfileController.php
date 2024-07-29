<?php 
class ProfileController {

    public function getProfile(){
        session_start();
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];

            require 'views/profile.php';
        } else {
            header('Location: index.php?controller=Login&action=showLoginForm');
        }
    }
}