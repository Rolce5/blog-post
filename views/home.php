<?php
// include '../templates/header.php';
include __DIR__ . '/templates/header.php';
?>
<div class="container">
    <div class="my-5">
        <?php foreach ($posts as $post) : ?>
            <div class="mb-4">
            <h2 class="text-center "><a class="" href="index.php?controller=Post&action=show&id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
            <img src="<?php echo $post['image']; ?>" alt="Post Image" class="img-fluid mb-3" style="max-height: 400px; width: 100%; object-fit:cover">
            <p><?php echo strlen($post['content']) > 56 ? substr($post['content'], 0, 56) . '...' : $post['content']; ?></p>
            </div>
            <br><br><br>
        <?php endforeach; ?>
    </div>
</div>
<?php
include __DIR__ . '/templates/footer.php';
?>