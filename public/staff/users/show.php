<?php require_once '../../../private/initialize.php'; ?>
<?php require_admin_login(); ?>

<?php
$id = $_GET['id'] ?? 1; // PHP > 7.0
if (!($user = User::find_by_id($id))) {
    redirect_to('./../../not_found.php');
    error_404();
} else {
     ?>

<?php $page_title = 'Show User: ' . h($user->full_name()); ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for(
      '/staff/users/index.php'
  ); ?>">&laquo; Back to List</a>

  <div class="admin show">

    <h1>User: <?php echo h($user->full_name()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>First name</dt>
        <dd><?php echo h($user->get_user_first_name()); ?></dd>
      </dl>
      <dl>
        <dt>Last name</dt>
        <dd><?php echo h($user->get_user_last_name()); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($user->get_user_email()); ?></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($user->get_user_username()); ?></dd>
      </dl>
      <dl>
        <dt>Created At</dt>
        <dd><?php echo h($user->get_user_created_at()); ?></dd>
      </dl>
    </div>

  </div>

</div>

<?php
}
 ?>
