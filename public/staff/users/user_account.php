<?php require_once('../../../private/initialize.php'); ?>

<?php require_user_login(); ?>
<?php $page_title = 'User Account'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<?php
$id = $_COOKIE['user_id'];
if(!$user = User::find_by_id($id)){
  redirect_to('./../../not_found.php');
  error_404();
} else {
?>

<div id="content">
	<div id="main-menu">
	    <h2>Hello <?php echo $cookie->get_username(); ?>!!!</h2>
	    	<?php $page_title = 'Show User: ' . h($user->full_name()); ?>

			<div id="content">

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
              <a href="<?php echo url_for('/staff/users/content/index.php'); ?>">Bicycles</a>
				</div>
			</div>
			<a href="./user_edit.php">Edit</a>
			<br>
			<a href="<?php echo url_for('./../index.php'); ?>">Home</a>
		</div>
	</div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
<?php
}
?>
