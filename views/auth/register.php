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
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex align-items-center vh-100 py-5">
        <div class=" col-md-6 mx-auto border shadow p-4">
            <h2 class="text-center">SignUp</h2>
            <form method="POST" action="index.php?controller=Register&action=register">
                <!-- <input type="hidden" name="type" value="register"> -->
                <div class="mb-3">
                    <label for="first_name">First Name:</label>
                    <input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo $first_name ?? ''; ?>">
                    <?php if (!empty($errors['first_name'])) : ?>
                        <small class="text-danger"><?php echo $errors['first_name']; ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="last_name">Last Name:</label>
                    <input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo $last_name ?? ''; ?>">
                    <?php if (!empty($errors['last_name'])) : ?>
                        <small class="text-danger"><?php echo $errors['last_name']; ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" name="email" value="<?php echo $email ?? ''; ?>">
                    <?php if (!empty($errors['email'])) : ?>
                        <small class="text-danger"><?php echo $errors['email']; ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="phone">Phone:</label>
                    <input class="form-control" type="tel" id="phone" name="phone" value="<?php echo $phone ?? ''; ?>">
                    <?php if (!empty($errors['phone'])) : ?>
                        <small class="text-danger"><?php echo $errors['phone']; ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" id="password" name="password">
                    <?php if (!empty($errors['password'])) : ?>
                        <small class="text-danger"><?php echo $errors['password']; ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="confirm_password">Confirm Password:</label>
                    <input class="form-control" type="password" id="confirm_password" name="confirm_password">
                    <?php if (!empty($errors['confirm_password'])) : ?>
                        <small class="text-danger"><?php echo $errors['confirm_password']; ?></small>
                    <?php endif; ?>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill">Register</button>
                </div>
                <div class="mb-3">
                    <div class="form-text text-center">Already have an account. <a href="index.php?controller=Login&action=showLoginForm">Login</a></div>
                </div>
                <?php if (!empty($errorMessage)) : ?>
                    <small class="text-danger"><?php echo $errorMessage; ?></small>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>

</html>