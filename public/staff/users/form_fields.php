<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($user)) {
  redirect_to(url_for('/staff/admins/index.php'));
} ?>

<div class="form-group row">
    <label for="inputFirstName" class="col-sm-2 col-form-label">First Name:</label>
    <div class="col-sm-10">
        <input type="text" name="user[first_name]" class="form-control" id="inputFirstName" value="<?php echo h(
                                                                                                  $user->get_user_first_name()
                                                                                                ); ?>" />
    </div>
</div>

<div class="form-group row">
    <label for="inputLastName" class="col-sm-2 col-form-label">Last Name:</label>
    <div class="col-sm-10">
        <input type="text" name="user[last_name]" class="form-control" value="<?php echo h(
                                                                            $user->get_user_last_name()
                                                                          ); ?>" />
    </div>
</div>

<div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
        <input type="text" name="user[email]" class="form-control" id="inputEmail" value="<?php echo h(
                                                                                        $user->get_user_email()
                                                                                      ); ?>" />
    </div>
</div>


<div class="form-group row">
    <label for="inputUsername" class="col-sm-2 col-form-label">Username:</label>
    <div class="col-sm-10">
        <input type="text" name="user[username]" class="form-control" id="inputUsername" value="<?php echo h(
                                                                                              $user->get_user_username()
                                                                                            ); ?>" />
        <span><strong>Atention!!!:</strong> If you will change the <b>username</b>, the
            modification
            will work just after
            next login.</span>
    </div>
</div>


<div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password:</label>
    <div class="col-sm-10">
        <input type="password" name="user[password]" class="form-control" id="inputPasword" value="" />
    </div>
</div>

<div class="form-group row">
    <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password:</label>
    <div class="col-sm-10">
        <input type="password" name="user[confirm_password]" class="form-control" id="inputConfirmPasword" value="" />
    </div>
</div>

<!-- <dl>
    <p>Please type in field below the verification code:<br /></p>
    <img src="../captcha_verification_code.php" alt="Captcha">
</dl>

<div class="form-group row">
    <label for="inputCaptcha" class="col-sm-2 col-form-label">Verification Code:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputCaptcha" name="user[vcode]" value="" />
    </div>
</div> -->