<?php
if (!session_id()) {
    session_start();
}

$config = [
    'fb' =>  [
        "id" => "445400916350759",
        "secret" => "39aac51f87c902b42666017570cd10b6",
        "version" => "v2.10",
        "permissions" => ["email"],
        "callback_url" => "https://127.0.0.1/bicycle-shop/public/staff/fb-callback.php"
    ]
];


$fb = new \Facebook\Facebook([
    'app_id' => $config['fb']['id'],
    'app_secret' => $config['fb']['secret'],
    'default_graph_version' => $config['fb']['version']
]);

// Get a facebook authentication access token entity
$handler = $fb->getRedirectLoginHelper();
// set state key in the get array
$_SESSION['FBRLH_state'] = $_GET['state'];

// Prepare callback login URL with permissions
$callback_url = $handler->getLoginUrl($config['fb']['callback_url'], $config['fb']['permissions']);