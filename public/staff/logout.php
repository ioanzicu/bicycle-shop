<?php
require_once('../../private/initialize.php');

// Log out the admin
$session->logout();
unset($session);
// log out the user
$cookie->logout();
unset($cookie);

redirect_to(url_for('/staff/login.php'));

?>
