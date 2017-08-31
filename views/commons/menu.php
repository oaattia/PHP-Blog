<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Blog</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/">Home</a>
                </li>
                <?php if (isset($_SESSION['is_logged_in']) && !$_SESSION['is_logged_in']): ?>
                <li>
                    <a href="/admin/login">Login</a>
                </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>
                <li>
                    <a href="/post/create">Add Entry</a>
                </li>
                <?php endif; ?>
        
                <li>
                    <a href="/contact/send">Contact Us</a>
                </li>

                <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>
                    <li>
                        <a href="/admin/logout">Logout</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
