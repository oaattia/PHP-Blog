<?php require_once VIEW_PATH . '/commons/header.php'; ?>
<body>
<?php require_once VIEW_PATH . '/commons/menu.php' ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-12">

            <!-- Blog Post -->
            <h1>Login</h1>

            <div class="alert alert-info">
                <strong>Username:</strong> admin@admin.com <br>
                <strong>Password:</strong> admin
            </div>
            
            <br>
            <form action="/admin/postLogin" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>
        
    </div>
    <!-- /.row -->

    <hr>
    
<?php require_once VIEW_PATH . '/commons/footer.php'?>