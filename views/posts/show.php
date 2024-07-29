<?php
// include '../templates/header.php';
include __DIR__ . '/../templates/header.php';
?>

<div class="container">
    <p><?php echo $post['content']; ?></p>
    <div class="mb-4">
            <h2 class="text-center"><?php echo $post['title']; ?></h2>
            <img src="<?php echo $post['image']; ?>" alt="Post Image" class="img-fluid" height="10;">
            <p><?php echo $post['content']; ?></p>
    </div>
</div>
<?php
include __DIR__ . '/../templates/footer.php';
?>