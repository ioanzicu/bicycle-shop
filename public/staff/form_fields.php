<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($user)) {
    redirect_to(url_for('/staff/users/index.php'));
} ?>

<div class="form-fields">
<dl>
  <dt>First name</dt>
  <dd><input type="text" name="user[first_name]" value="<?php echo h(
      $user->get_user_first_name()
  ); ?>" /></dd>
</dl>

<dl>
  <dt>Last name</dt>
  <dd><input type="text" name="user[last_name]" value="<?php echo h(
      $user->get_user_last_name()
  ); ?>" /></dd>
</dl>

<dl>
  <dt>Email</dt>
  <dd><input type="text" name="user[email]" value="<?php echo h(
      $user->get_user_email()
  ); ?>" /></dd>
</dl>

<dl>
  <dt>Username</dt>
  <dd><input type="text" name="user[username]" value="<?php echo h(
      $user->get_user_username()
  ); ?>" /></dd>
</dl>

<dl>
  <dt>Password</dt>
  <dd><input type="password" name="user[password]" value="" /></dd>
</dl>

<dl>
  <dt>Confirm Password</dt>
  <dd><input type="password" name="user[confirm_password]" value="" /></dd>
</dl>

<dl>
  <p>Please type in field below the verification code:<br /></p>
  <img src=" ./captcha_verification_code.php" alt="Captcha" >
</dl>

<dl>
  <dt>Verification code</dt>
  <dd><input name="vcode" type="text" value="" /></dd>
</dl>
</div>