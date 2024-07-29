<?php
// include '../templates/header.php';
include __DIR__ . '/../templates/header.php';
?>

<div class="container d-flex vh-100 align-items-center">
    <div class="col-md-6 mx-auto border shadow p-4">
    <h2 class="text-center">Update Post</h2>
        <form action="index.php?controller=Post&action=update" method="post" >
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($title) ? $title : $post['title']; ?>">
                <?php if(isset($errors['title'])) : ?>
                    <small class="text-danger"><?php echo $errors['title']; ?></small>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="content">content</label>
                <textarea type="text" class="form-control" rows="10" id="content" name="content" ><?php echo isset($content) ? $content : $post['content']; ?></textarea>
                <?php if(isset($errors['content'])) : ?>
                    <small class="text-danger"><?php echo $errors['content']; ?></small>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<?php
include __DIR__ . '/../templates/footer.php';
?>