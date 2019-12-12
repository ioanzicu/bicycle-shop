<?php

$fb = new \Facebook\Facebook([
    'app_id' => $config['fb']['id'],
    'app_secret' => $config['fb']['secret'],
    'default_graph_version' => $config['fb']['version']
]);

// Get a facebook authentication access token entity
$handler = $fb->getRedirectLoginHelper();
$callback_url = $config['fb']['callback_url'];
$permissions = $config['fb']['permissions'];

// Prepare callback login URL with permissions
$callback_url = $handler->getLoginUrl($callback_url, $permissions);