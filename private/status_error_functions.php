<?php

function require_admin_login()
{
    //FOR ADMIN
    global $session;
    if (!$session->is_logged_in()) {
        redirect_to(url_for('/staff/login.php'));
    } else {
        // Do nothing, let the rest of the page proceed
    }
}

function require_user_login()
{
    // FOR USERS
    global $cookie;
    if (!$cookie->is_logged_in()) {
        redirect_to(url_for('/staff/login.php'));
    } else {
        // Do nothing, let the rest of the page proceed
    }
}

function display_errors($errors = array())
{
    $output = '';
    if (!empty($errors)) {
        $output .= "<div class=\"errors center-text\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

function display_session_message()
{
    global $session;
    $msg = $session->message();
    if (isset($msg) && $msg != '') {
        $session->clear_message();
        return '<div class="center-text" id="message">' . h($msg) . '</div>';
    }
}

function display_cookie_message()
{
    global $cookie;
    $msg = $cookie->message();
    if (isset($msg) && $msg != '') {
        $cookie->clear_message();
        return '<div class="center-text" id="message">' . h($msg) . '</div>';
    }
}

?>