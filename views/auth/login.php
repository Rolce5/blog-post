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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex align-items-center vh-100 py-5">
        <div class=" col-md-5 mx-auto border shadow p-4">
            <h2 class="text-center">Login</h2><br>
            <form method="POST" action="index.php?controller=Login&action=login">
                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input class="form-control" type="text" id="email" name="email" value="<?php echo $email ?? ''; ?>">
                    <?php if(isset($error)) : ?>
                    <small class="text-danger"><?php echo $error; ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-2">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <div class="mb-3 float-end form-text"><a href="./reset-password.php">Forgotten Password?</a></div>
                <div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill">Login</button>
                </div>
            </form>
            <div class="form-text text-center mt-2">Don't have an account. <a href="index.php?controller=Register&action=showRegisterForm">Register</a></div>
        </div>
    </div>
</body>
</html>