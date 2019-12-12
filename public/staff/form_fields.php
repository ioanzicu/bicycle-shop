<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($user)) {
    redirect_to(url_for('/staff/users/index.php'));
} ?>

<div class="form-group row">
    <label for="inputFirstName" class="col-sm-2 col-form-label">First Name:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputFirstName" name="user[first_name]" value="<?php echo h(
                                                                                                        $user->get_user_first_name()
                                                                                                    ); ?>" />
    </div>
</div>
<div class="form-group row">
    <label for="inputLastName" class="col-sm-2 col-form-label">Last Name:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputLastName" name="user[last_name]" value="<?php echo h(
                                                                                                        $user->get_user_last_name()
                                                                                                    ); ?>" />
    </div>
</div>

<div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail" name="user[email]" value="<?php echo h(
                                                                                                $user->get_user_email()
                                                                                            ); ?>" />
    </div>
</div>

<div class="form-group row">
    <label for="inputUsername" class="col-sm-2 col-form-label">Username:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputUsername" name="user[username]" value="<?php echo h(
                                                                                                    $user->get_user_username()
                                                                                                ); ?>" />
    </div>
</div>

<div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password:</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword" name="user[password]" value="" />
    </div>
</div>

<div class="form-group row">
    <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password:</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="inputConfirmPassword" name="user[confirm_password]" value="" />
    </div>
</div>

<dl>
    <p>Please type in field below the verification code:<br /></p>
    <img src="./captcha_verification_code.php" alt="Captcha">
</dl>

<div class="form-group row">
    <label for="inputCaptcha" class="col-sm-2 col-form-label">Verification Code:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputCaptcha" name="vcode" value="" />
    </div>
</div>