<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <ul id="menu">
    <li><a href="<?php echo url_for('/content.php'); ?>">View Our Inventory</a></li>
    <li><a href="<?php echo url_for('/about.php'); ?>">About Us</a></li>
     <!-- ADMIN MENU BUTTON -->
	<?php if (isset($_SESSION['username'])): ?>
		<li><a href="<?php echo url_for('/staff/index.php'); ?>">Admin Menu</a></li>
		<li><a href="<?php echo url_for('/staff/logout.php'); ?>">Log Out</a></li>
    <!-- USER ACCOUNT BUTTON -->
    <?php elseif (isset($_COOKIE['username'])): ?>
		<li><a href="<?php echo url_for('/staff/users/user_account.php'); ?>">User Account</a></li>
		<li><a href="<?php echo url_for('/staff/logout.php'); ?>">Log Out</a></li>
	<!-- LOG IN BUTTON -->
    <?php else: ?>
    	<li><a href="<?php echo url_for('/staff/login.php'); ?>">Log In</a></li>
    <?php endif ?>

  </ul>
</div>

<?php $super_hero_image = 'main.jpg'; ?>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
