<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    if($admin = Admin::find_by_username($username)) {

      // test if admin found and password is correct
      if($admin != false && $admin->verify_password($password)) {
        // Mark admin as logged in
        $session->login($admin);
        redirect_to(url_for('/staff/index.php'));
      } else {
        // username not found or password does not match
        $errors[] = "Log in was unsuccessful.";
      }
    } else {
      // test if user found and password is correct
      $user = User::find_by_username($username);
      // test if admin found and password is correct
      if($user != false && $user->verify_password($password)) {
        // Mark admin as logged in
        $cookie->login($user);
        redirect_to(url_for('/staff/users/user_account.php'));
      } else {
        // username not found or password does not match
        $errors[] = "Log in was unsuccessful.";
      }
    }
  }
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<!-- Prevent the user to logout clicking back button on the browser,
without deleting the session or cookie -->
<script type="text/javascript">
  function backButtonOverride() {
    setTimeout("backButtonOverrideBody()", 1);
  }
  function backButtonOverrideBody() {
    try {
      history.forward();
    } catch (e) {}
    setTimeout("backButtonOverrideBody()",50);
  }
</script>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form>
  <br />
  <a href="./../index.php">Home</a>
  <br />
  <br />
  <a href="./logout.php">Logout</a>
  <br />
  <br />
  <a href="./registration.php">Registration</a>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
