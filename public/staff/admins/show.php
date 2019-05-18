<?php require_once('../../../private/initialize.php'); ?>
<?php require_admin_login(); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0
$id = (int) test_input($id);
if(!$admin = Admin::find_by_id($id)){
  redirect_to('./../../not_found.php');
  error_404();
} else {
?>

<?php $page_title = 'Show Admin: ' . h($admin->full_name()); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin show">

    <h1>Admin: <?php echo h($admin->full_name()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>First name</dt>
        <dd><?php echo h($admin->get_admin_first_name()); ?></dd>
      </dl>
      <dl>
        <dt>Last name</dt>
        <dd><?php echo h($admin->get_admin_last_name()); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($admin->get_admin_email()); ?></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($admin->get_admin_username()); ?></dd>
      </dl>
    </div>

  </div>

</div>

<?php
}
?>
