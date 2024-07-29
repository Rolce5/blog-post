<?php
class RegisterController {

    private function isLoggedIn($currentPage){
        session_start();
        if(isset($_SESSION['user'])){
            header("Location: $currentPage");
            exit();
        }
    }

    public function showRegisterForm(){
        $currentPage = $_SERVER['REQUEST_URI'];
        $this->isLoggedIn($currentPage);
        require 'views/auth/register.php';
    }

    public function register($db){
        $errors = [];


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // validate form data
            if(empty($_POST['first_name'])){
                $errors['first_name'] = 'first name is required';
            } elseif (strlen($_POST['first_name']) > 64) {
                $errors['first_name'] = 'First name must not exceed 64 characters';
            }

            if(empty($_POST['last_name'])){
                $errors['last_name'] = 'Last name is required';
            } elseif (strlen($_POST['last_name']) > 64) {
                $errors['last_name'] = 'Last name must not exceed 64 characters';
            }

            if(empty($_POST['email'])){
                $errors['email'] = 'Email is required';
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Please enter a valid email';
            }

            if(empty($_POST['phone'])){
                $errors['phone'] = 'Phone number is required';
            } elseif (!preg_match("/^[0-9]*$/", $_POST['phone'])){
                $errors['phone'] = 'Please enter a valid phone number';
            }

            if(empty($_POST['password'])){
                $errors['password'] = 'Password is required';
            } else if(strlen($_POST['password']) < 6){
                $errors['password'] = 'Password must be atleast 6 characters';
            } else if($_POST['password'] != $_POST['confirm_password']){
                $errors['confirm_password'] = "Confirmation password don't match with password";
            }

            // Extract form data
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // if no error proceed with registration
            if(empty($errors)) {
                // create new user instance
                $user = new User($db);

                // store data in database
                $success = $user->register($first_name, $last_name, $email, $phone, $password);

                if($success){
                    // Redirect to the login page
                    header("Location: index.php?controller=Login&action=showLoginForm");
                } else {
                    // Handle database insertion failure
                    echo "Error storing user data in the database";
                }
            } else {
                // if there are any errors displays the form with errors 
                require 'views/auth/register.php';
            }
        }
    }
}