<?php
// include '../templates/header.php';
include __DIR__ . '/../templates/header.php';
?>
<div class="container">
    <div class="my-5">
        <div class="d-flex justify-content-end">
            <a href="index.php?controller=Post&action=create" class="btn btn-primary mb-2">Create Post</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; foreach ($posts as $post) : ?>
                        <tr>
                            <td><?php echo $post['id'] ?></td>
                            <td><?php echo $post['title'] ?></td>
                            <td><?php echo $post['content'] ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="index.php?controller=Post&action=edit&id=<?php echo $post['id']; ?>" class="me-2"><button class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></button></a>
                                    <a href="index.php?controller=Post&action=destroy&id=<?php echo $post['id']; ?>"><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include __DIR__ . '/../templates/footer.php';
?>