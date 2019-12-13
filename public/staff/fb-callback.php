<?php
require_once '../../private/initialize.php';
require_once '../../private/fb-setup.php';

ob_start();

try {
    $userAccessToken = $handler->getAccessToken();

    if (!$userAccessToken) {
        if ($handler->getError()) {
            // Unauthorized
            header('HTTP/1.0 401 Unauthorized');
            $errors = "Errors " . $handler->getError() . " Reason: " . $handler->getErrorReason()
                . " Desc: " . $handler->getErrorDescription();
        } else {
            // Syntax errors in the query
            header('HTTP/1.0 400 Bad Request');
            $errors = "Something when wrong";
        }
    } else if ($userAccessToken) {
        //get oauth client to manage user access token
        $oauth = $fb->getOAuth2Client();
        $tokenMetadata = $oauth->debugToken($userAccessToken);

        //validate api id and access token expiration
        $tokenMetadata->validateAppId($config['fb']['id']);
        $tokenMetadata->validateExpiration();

        // Make the token long lived
        if (!$userAccessToken->isLongLived()) {
            $userAccessToken = $oauth->getLongLivedAccessToken($userAccessToken);
        }

        // LOGIN or SIGN UP
        // get user information with the token
        $response = $fb->get('/me?fields=id,email,name,picture.width(300).height(300)', (string) $userAccessToken);
        // get data from the response
        $user = $response->getGraphUser();

        // check db if the user exist
        // Create db connection
        $connection = db_connect();
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // get user email
        $user->getEmail() != "" ? $email = $user->getEmail() : $email = "xxxx";
        // id
        $id = $user->getId();
        // fullname
        $fullname = $user->getName();
        // avatar
        $avatar = $user->getPicture();

        // prepare query
        $sql = "SELECT id, email, username FROM users WHERE email='" . $email . "';";
        // query users table
        $result = $connection->query($sql);
        // if no users with such email
        if (mysqli_num_rows($result) > 0) {
            // user already exist, just Log In
            echo 'the user is already in the db';

            var_dump($result);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                // Set cookie with user data
                if ($row["email"] === $email) {
                    $db_index = $row["id"];
                    $username = $row["username"];
                }
            }

            $new_user = User::find_by_username($username);
            $cookie->login($new_user);
            // set avatar
            setcookie('avatar', $avatar->getUrl(), time() + 3600 * 24 * 30, '/');

            // If there are errors, redirect to the index page
            if (isset($_COOKIE['errors'])) unset($_COOKIE['errors']);
            header('Location: /bicycle-shop/public/index.php');
        } else {
            // New User, add to database then redirect
            $insertQuery  = "INSERT INTO users (first_name, last_name, email, username, avatar, provider, provider_id, hashed_password, created_at) ";
            $insertQuery .= "VALUES ('" . $fullname . "' , '" . $fullname . "', '" . $email . "', '" . $fullname . "', '" . $avatar->getUrl() . "', 'Facebook', '" . $id . "', 'XXXXXXXXXxxxxxxxXXXXXXXXXX', '" . date("Y/m/d") . "');";

            if ($connection->query($insertQuery) === TRUE) {
                $last_id = $connection->insert_id;
                echo "New record created";

                // fing new user in the database
                $new_user = User::find_by_username($fullname);
                // login
                $cookie->login($new_user);
                // Set cookie with user data
                setcookie('avatar', $avatar->getUrl(), time() + 3600 * 24 * 30, '/');

                if (isset($_COOKIE['errors'])) unset($_COOKIE['errors']);
                header('Location: /bicycle-shop/public/index.php');
            } else {
                echo "Something went wrong. Check the syntax of the query, allowed ranges or type of data.";
            }
        }

        // Close connection
        $connection->close();
    } else {
        setcookie('errors', 'You did not authorize');
        header('Location: /bicycle-shop/public/index.php');
    }
} catch (\Facebook\Exceptions\FacebookResponseException $ex) {
    $errors = "Facebook graph returned an error: " . $ex->getMessage();
} catch (\Facebook\Exceptions\FacebookSDKException $ex) {
    $errors = "Facebook SDK returned an error: " . $ex->getMessage();
} catch (PDOException $ex) {
    $errors = "PDO Error: " . $ex->getMessage();
}

if ($errors != '') {
    setcookie('errors',  $errors);
    header('Location: /bicycle-shop/public/index.php');
}