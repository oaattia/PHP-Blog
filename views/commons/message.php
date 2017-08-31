<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-success">
        <button class="close" data-close="alert"></button>
        <span><?php echo @$_SESSION['message'];
            unset($_SESSION['message']) ?></span>
    </div>
<?php endif; ?>