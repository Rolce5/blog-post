<?php 
class LoginController {

    public function showLoginForm(){
        require 'views/auth/login.php';
    }

    public function login($db){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST['email'];
            $password = $_POST['password'];

            // call the login method in the model to validate the credentioals
            $user = new User($db);

            // die($user);

            // store data in database
            $success = $user->getUser($email, $password);
            // die($success['email']);

            if($success) {
                // Starts the session and stores the session information
                session_start();
                $_SESSION['user'] = $success;
                
                header("Location: index.php?controller=Post&action=index");
                // die('12');
                exit();
            } else {
                $error = 'Invalid Credentials';
                require 'views/auth/login.php';
            }
        } else {
            header("Location: index.php?controller=Login&action=showLoginForm");
            exit();
        }
    }

    public function logout($db) {
        session_start();

        // Unset all session variables
        $_SESSION = array();

        // Destroy all session
        session_destroy();

        header('Location: index.php');
        exit();
    }
}