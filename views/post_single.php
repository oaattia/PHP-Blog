<?php require_once VIEW_PATH . '/commons/header.php'; ?>
<body>
<?php require_once VIEW_PATH . '/commons/menu.php' ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-12">

            <?php if(isset($data[0]) && !empty($data)): ?>

            <h1><?php echo $data[0]->title ?></h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#"><?php echo $data[0]->name ?></a>
            </p>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $data[0]->created_at ?></p>
            <hr>

            <!-- Post Content -->
            <p class="lead"><?php echo $data[0]->content ?></p>

            <hr>

            <!-- Blog Comments -->

            <div class="well">
                <?php require_once VIEW_PATH . '/commons/message.php' ?>
                <h4>Leave a Comment:</h4>
                <form role="form" action="/comment/save" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $data[0]->id ?>">
                    <div class="form-group">
                        <textarea class="form-control" name="text" rows="3" placeholder="Add your comment here"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <?php if(isset($data[1]) && !empty($data[1])): ?>

                    <?php foreach ($data['1'] as $comment ): ?>
            <!-- Comment -->
                <div class="media">

                    <div class="media-body">
                        <h4 class="media-heading">
                            <small><?php echo $comment->created_at ?> <br> <b>by</b> <?php echo $comment->name ?></small>
                        </h4>
                        <?php echo $comment->text ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php else: ?>
                <div class="media">
                    <div class="media-body">
                        No comments found
                    </div>
                </div>
            <?php endif; ?>

            <?php endif; ?>

        </div>

    </div>
    <!-- /.row -->

    <hr>

<?php require_once VIEW_PATH . '/commons/footer.php'?>