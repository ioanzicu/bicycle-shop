<?php
require_once '../../private/initialize.php';

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if (is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if (is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if (empty($errors)) {
    if ($admin = Admin::find_by_username($username)) {
      // test if admin found and password is correct
      if ($admin != false && $admin->verify_password($password)) {
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
      if ($user != false && $user->verify_password($password)) {
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
<?php include SHARED_PATH . '/staff_header.php'; ?>

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
    setTimeout("backButtonOverrideBody()", 50);
}
</script>

<div class="container align-center mb-5">
    <h1 class="text-center mt-1">Log In
    </h1>
    <br />
    <?php echo display_errors($errors); ?>
    <form action="login.php" method="post" class="border rounded p-4">
        <div class="form-group col-6 mx-auto text-center">
            <label for="usernameInput">Username:</label>
            <input type="text" class="form-control" name="username" id="usernameInput" value="<?php echo h(
                                                                                          $username
                                                                                        ); ?>" />
            <br />
            <label for="passwordInput">Password:</label>
            <input type="password" class="form-control" name="password" value="" id="passwordInput" />
            <br />
            <input class="submit btn btn-primary" type="submit" name="submit" value="Submit" />
        </div>
        <hr class="mb-5" />
        <div class="row justify-content-around mb-2">
            <div class="col-4">
                <a class="btn btn-secondary form-control" href=" ./../index.php">Home</a>
            </div>
            <div class="col-4">
                <a class="btn btn-secondary form-control" href="./registration.php">Registration</a>
            </div>
        </div>
    </form>
</div>

<?php include SHARED_PATH . '/staff_footer.php'; ?>