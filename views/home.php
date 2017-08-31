<?php require_once VIEW_PATH.'/commons/header.php'; ?>
    <body>
<?php require_once VIEW_PATH.'/commons/menu.php' ?>
<div class="container">
    <div class="col-md-12">
        <?php require_once VIEW_PATH.'/commons/message.php' ?>
    </div>
    <div class="col-md-12">

        <?php if (!empty($data)): ?>
            <?php foreach ($data as $item): ?>

                <h1>
                    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>
                        <a href=<?php echo "/post/show?post_id=" . $item->id ?>><?php echo $item->title ?></a>
                    <?php else: ?>
                        <?php echo $item->title ?>
                    <?php endif; ?>
                </h1>
                <p><?php echo $item->content ?></p>
                <div>
                    <span class="badge"><?php echo $item->created_at ?></span>
                    <div class="pull-right">
                    <span class="label label-default">Author: <?php echo ucfirst($item->name) ?></span>
                </div>
                <hr>

                <?php endforeach; ?>
            <?php else: ?>
                <h1>No data found, Sorry :(</h1>
            <?php endif; ?>
        </div>
    </div>


<?php require_once VIEW_PATH.'/commons/footer.php' ?>