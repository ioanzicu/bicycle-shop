<?php

require_once('../../../private/initialize.php');

require_user_login();

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['user'];
  $user = new User($args);
  // DISABLE CAPTCAH VERIFICATION
  $user->set_captcha("admin_can_do_everithing!");
  // SAVE
  $result = $user->save();

  if($result === true) {
    $new_id = $user->get_user_id();
    // AVOID CAPTHCA VERIFICATION
    $cookie->message('The user was created successfully.');
    redirect_to(url_for('/staff/users/show.php?id=' . $new_id));
  } else {
    // show errors

  }

} else {
  // display the form
  $user = new User;
}

?>

<?php $page_title = 'Create User'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/users/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle new">
    <h1>Create User</h1>

    <?php echo display_errors($user->get_errors()); ?>

    <form action="<?php echo url_for('/staff/users/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create User" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
