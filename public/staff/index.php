<?php require_once '../../private/initialize.php'; ?>

<?php require_admin_login(); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>

<div class="container" style="height:60vh">
    <div class="mb-5" id="main-menu">
        <h2 class="m-5">Main Menu</h2>
        <a class="btn btn-lg btn-info m-3" href="<?php echo url_for(
                                                        '/staff/content/index.php'
                                                    ); ?>">Bicycles</a>
        <a class="btn btn-lg btn-success m-3" href="<?php echo url_for(
                                                        '/staff/admins/index.php'
                                                    ); ?>">Admins</a>
        <a class="btn btn-lg btn-secondary m-3" href="<?php echo url_for(
                                                            '/staff/users/index.php'
                                                        ); ?>">Users</a>
        <a class="btn btn-lg btn-warning m-3" href="<?php echo url_for(
                                                        './../index.php'
                                                    ); ?>">Home</a>
    </div>

    <div class="text-center">
        <img height="200" src="<?php echo url_for(
                                    '/images/bicycle-icon.png'
                                ); ?>" />
    </div>
</div>

<?php include SHARED_PATH . '/staff_footer.php'; ?>