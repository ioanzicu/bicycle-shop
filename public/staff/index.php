<?php require_once '../../private/initialize.php'; ?>

<?php require_admin_login(); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>

<div id="content">
    <div id="main-menu">
        <h2>Main Menu</h2>
        <ul class="outer">
            <a href="<?php echo url_for(
                  '/staff/content/index.php'
                ); ?>">
                <li class="inner">Bicycles</li>
            </a>
            <a href="<?php echo url_for(
                  '/staff/admins/index.php'
                ); ?>">
                <li class="inner">Admins</li>
            </a>
            <a href="<?php echo url_for(
                  '/staff/users/index.php'
                ); ?>">
                <li class="inner">Users</li>
            </a>
            <a href="<?php echo url_for(
                  './../index.php'
                ); ?>">
                <li class="inner">Home</li>
            </a>
        </ul>
    </div>

</div>

<?php include SHARED_PATH . '/staff_footer.php'; ?>