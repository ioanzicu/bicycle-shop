<?php

class Cookie
{
    private $user_id;
    private $username;
    private $last_login;

    private const MAX_LOGIN_AGE = 60 * 60 * 24; // 1 day

    public function __construct()
    {
        $this->check_stored_login();
    }

    public function get_username()
    {
        return $this->username;
    }

    public function login($user)
    {
        if ($user) {
            $this->user_id = $user->get_user_id();
            setcookie("user_id", $this->user_id, 0, "/");
            $this->username = $user->get_user_username();
            setcookie("username", $this->username, 0, "/");
            $this->last_login = time();
            setcookie("last_login", $this->last_login, 0, "/");
        }
        return true;
    }

    public function is_logged_in()
    {
        // return isset($this->admin_id);
        return isset($this->user_id) && $this->last_login_is_recent();
    }

    public function logout()
    {
        setcookie("user_id", "", time() - 1, "/");
        setcookie("username", "", time() - 1, "/");
        setcookie("last_login", "", time() - 1, "/");
        unset($this->user_id);
        unset($this->username);
        unset($this->last_login);
        return true;
    }

    private function check_stored_login()
    {
        if (isset($_COOKIE['user_id'])) {
            $this->user_id = $_COOKIE['user_id'];
            $this->username = $_COOKIE['username'];
            $this->last_login = $_COOKIE['last_login'];
        }
    }

    private function last_login_is_recent()
    {
        if (!isset($this->last_login)) {
            return false;
        } elseif ($this->last_login + self::MAX_LOGIN_AGE < time()) {
            return false;
        } else {
            return true;
        }
    }

    public function message($msg = "")
    {
        if (!empty($msg)) {
            // Then this is a "set" message
            setcookie("message", $msg, 0, "/");
            return true;
        } else {
            // Then this is a "get" message
            return $_COOKIE['message'] ?? '';
        }
    }

    public function clear_message()
    {
        setcookie("message", "", time() - 1, "/");
    }
}

?>