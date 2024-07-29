<?php
class HomeController {
    public function index($db){
        $postModel = new Post($db);
        $posts = $postModel->getAllPost();
        require 'views/home.php';
    }
}