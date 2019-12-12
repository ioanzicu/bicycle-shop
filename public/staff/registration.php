<?php

require_once '../../private/initialize.php';

if (is_post_request()) {
  // Create record using post parameters
  $args = $_POST['user'];
  $user = new User($args);
  // SET CAPTCHA VALUE
  $user->set_captcha($_POST['vcode']);
  // SESSION START
  // session_start();
  // COMPARE USER CAPTCHA AND USER INPUT
  $result = strcasecmp($_SESSION['vcode'], $_POST['vcode']);
  if ($result === 0) {
    // CONTINUE THE SCRIPT
  } else {
    // SET WHEN THE CAPTCHA DOESN'T MATCH
    $user->set_verify_captcha();
  }

  // SAVE NEW USER
  $result = $user->save();
  // CREATE COOKIE
  if ($result === true) {
    $new_id = $user->get_user_id();
    $cookie->message('The user was created successfully.');
    redirect_to(url_for('/staff/users/user_account.php'));
  } else {
    // show errors
  }
} else {
  // display the form
  $user = new User();
}
?>

<?php $page_title = 'Create User'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>

<div class="container">

    <a class="submit btn btn-primary" href="<?php echo url_for(
                                            './staff/login.php'
                                          ); ?>">&laquo; Back to Login</a>

    <h1 class="center-text mt-3">Registration</h1>
    <div class="bicycle new border round m-5 p-5">
        <?php echo display_errors($user->get_errors()); ?>

        <form class="text-center" action="<?php echo url_for(
                                        './staff/registration.php'
                                      ); ?>" method="post">

            <?php include './form_fields.php'; ?>

            <input class="submit btn btn-primary" type="submit" name="submit" value="Create User" />
        </form>
    </div>

</div>

<!-- UNSET THE CAPTHA SEESION -->

<?php include SHARED_PATH . '/staff_footer.php'; ?>