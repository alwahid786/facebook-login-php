<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php'; // Change path as needed

$fb = new \Facebook\Facebook([
    'app_id' => '477780438267332',
    'app_secret' => '7edfb911aec0c28d300b1933a7004261',
    'default_graph_version' => 'v10.0',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['user_posts', 'pages_read_engagement', 'pages_read_user_content']; // Optional permissions

$loginUrl = $helper->getLoginUrl('https://your-website.com/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Connect Facebook</a>';
