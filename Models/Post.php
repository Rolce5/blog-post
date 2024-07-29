<?php 
class Post {
    //Database connection
    private $db;
    public function __construct($db){
        $this->db = $db;
    }

    // Get all posts
    public function getAllPost(){
        $stmt = $this->db->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all posts od the authenticated user 
    public function getUserPost($userId){
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a single post
    public function getPostById($id){
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new post 
    public function createPost($userId, $title, $content){
        $stmt = $this->db->prepare("INSERT INTO posts (user_id, title, content) VALUES (?,?,?)");

        // Bind the parameters and execute the query
        $success = $stmt->execute([$userId, $title, $content]);

        // return true if the query was successful, false otherwise
        return $success;
    }

    // Update existing post 
    public function updatePost($id, $title, $content){
        $stmt = $this->db->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");

        // Bind the parameters and execute the query
        $success = $stmt->execute([$title, $content, $id]);

        // return true if the query was successful, false otherwise
        return $success;
    }

    public function deletePost($id){
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");

        // Bind the parameters ans execute the query
        $success = $stmt->execute([$id]);

        // return true if the query was successful, false otherwise
        return $success;
    }

}