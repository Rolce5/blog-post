<?php 
class User {
    // Database connection
    private $db;
    public function __construct($db){
        $this->db = $db;
    }

    public function register($first_name, $last_name, $email, $phone, $password){
        $stmt = $this->db->prepare("INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?,?,?,?,?)");

        // Bind the parameter and execute the query
        $success = $stmt->execute([$first_name, $last_name, $email, $phone, $password]);

        // return true if the query was successful, false otherwise
        return $success;

    }

    public function getUser($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");

        // Bind the parameter and execute the query
        $stmt->execute([$email]);

        // Fetch the user record
        $user = $stmt->fetch();

        if($user && password_verify($password, $user['password'])) {
            // user found and passwors matches
            return $user;
        } else {
            // User not found or password doesn't match
            return false;
        }
    }
}