<?php require_once VIEW_PATH.'/commons/header.php'; ?>
    <body>
<?php require_once VIEW_PATH.'/commons/menu.php' ?>
    <!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-12">

            <!-- Blog Post -->
            <?php include VIEW_PATH.'/commons/message.php' ?>
            <!-- Title -->
            <h1>Create Post</h1>

            <form action="/post/save" method="post">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" rows="5" name="content" required></textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>

    </div>
    <!-- /.row -->

    <hr>

<?php require_once VIEW_PATH.'/commons/footer.php' ?>