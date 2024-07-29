<?php
include __DIR__ . '/templates/header.php';
?>
<div class="container d-flex align-items-center vh-100 py-5">
    <div class="col-md-4 mx-auto border shadow p-4">
        <p>First Name: <br><span class="text-muted"><?php echo $user["first_name"] ?></span></p>
        <p>Last Name: <br><span class="text-muted"><?php echo $user["last_name"] ?></span></p>
        <p>Email: <br><span class="text-muted"><?php echo $user["email"] ?></span></p>
        <p>Phone: <br><span class="text-muted"><?php echo $user["phone"] ?></span></p>
        <p>Register At: <br><span class="text-muted"><?php echo $user["created_at"] ?></span></p>
    </div>
</div>
<?php
include __DIR__ . '/templates/footer.php';
?>