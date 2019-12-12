<?php

// Require facebook app id from deparate file
$fb_credentials = require_once '../credentials.php';

return [
    'fb' =>  [
        "id" => $fb_credentials['id'],
        "secret" => $fb_credentials['secret'],
        "version" => "2.10",
        "permissions" => ["email"],
        "callback_url" => "http://127.0.0.1/bicycle-shop/public/facebook-login/fb-callback.php"
    ]
];