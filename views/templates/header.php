<?php
// Check if a session is not already active before starting a new one
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="position-relative vh-100">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse float-right" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?action=index">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (!isset($_SESSION['user'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=Register&action=showRegisterForm">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=Login&action=showLoginForm">Login</a>
                    </li>
                    <?php
                } else { // Show other links when the user is authenticated
                ?>
                    <a href="index.php?controller=Post&action=index" class="btn btn-outline"><i class="bi bi-gear"></i> Manage Post</a>
                    <a href="index.php?controller=Profile&action=getProfile" class="btn btn-outline"><i class="bi bi-person-circle"></i> Profile</a>
                    <a href="index.php?controller=Login&action=logout" class="btn btn-outline"><i class="bi bi-door-closed"></i> Logout</a>
                    <?php
                        }
                        ?>
                </ul>
            </div>
        </div>
    </nav> 

