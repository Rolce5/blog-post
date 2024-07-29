<?php 
class PostController {
    private function isLoggedIn(){
        session_start();
        if(!isset($_SESSION['user'])){
            header('Location: index.php?controller=Login&action=showLoginForm');
            exit();
        }
    }

    public function index($db){
        // Retrieve the authenticated user's ID from the session
        session_start();
                
        // Check if 'user' key exists in the session
        if(isset($_SESSION['user'])){
            $userId = $_SESSION['user']['id']; // Assuming user ID is stored in 'id' field

            $postModel = new Post($db);
            $posts = $postModel->getUserPost($userId);
            require 'views/posts/index.php';
        } else {
            header('Location: index.php?controller=Login&action=showLoginForm');
        }
        
    }

    public function create(){
        $this->isLoggedIn();
        require 'views/posts/create.php';
    }

    public function store($db){
        $this->isLoggedIn();
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            // Extract form data
            $title = $_POST['title'];
            $content = $_POST['content'];
            
            // validate form data
            if(empty($_POST["title"])){
                $errors['title'] = 'title is required';
            }

            if(empty($_POST["content"])){
                $errors['content'] = 'content is required';
            }

            // Retrieve the authenticated user's ID from the session
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userId = $_SESSION['user']['id']; // Assuming user ID is stored in 'id' field

            // If no errors, proceed to create the post
            if (empty($errors)) {

                // Create a new Post instance
                $post = new Post($db);

                // store data in the database
                $success = $post->createPost($userId, $title, $content);

                if($success) {
                    // Redirect to the index page 
                    header("Location: index.php?controller=Post&action=index");
                } else {
                    // Handle database insertion failure
                    echo "Error storing post data in the database";
                }
            } else {
                // if there are any errors displays the form with errors 
                require 'views/posts/create.php';
            }
        }
    }
    
    public function show($db, $id){
        $this->isLoggedIn();
        $postModel = new Post($db);
        $post = $postModel->getPostById($id);

        require 'views/posts/show.php';
    }
    
    public function edit($db, $id){
        $this->isLoggedIn();
        $postModel = new Post($db);
        $post = $postModel->getPostById($id);

        require 'views/posts/edit.php';
    }

    public function update($db){
        $this->isLoggedIn();
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            // Extract form data
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            
            // validate form data
            if(empty($_POST["title"])){
                $errors['title'] = 'title is required';
            }

            if(empty($_POST["content"])){
                $errors['content'] = 'content is required';
            }

            // If no errors, proceed to create the post
            if (empty($errors)) {
                // Create a new Post instance
                $post = new Post($db);
                // update the post in the database
                $success = $post->updatePost($id, $title, $content);
                // die('12');
                if($success) {
                    // Redirect to the index page 
                    header("Location: index.php?controller=Post&action=index");
                } else {
                    // Handle atabase insertion failure
                    echo "Error updating the post in the database";
                }
            } else {
                // if there are any errors displays the form with errors 
                require 'views/posts/edit.php';
            }
        }
    }
    
    public function destroy($db, $id){
        $this->isLoggedIn();
        $postModel = new Post($db);
        $post = $postModel->deletePost($id);

        header("Location: index.php?controller=Post&action=index");
    }
    
}