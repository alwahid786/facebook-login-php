<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php'; // Change path as needed

if (!isset($_SESSION['fb_access_token'])) {
    header('Location: index.php');
    exit;
}

$fb = new \Facebook\Facebook([
    'app_id' => '477780438267332',
    'app_secret' => '7edfb911aec0c28d300b1933a7004261',
    'default_graph_version' => 'v10.0',
]);

$accessToken = $_SESSION['fb_access_token'];

$url = $_POST['url'];
// Extract the ID from the URL
$id = basename(parse_url($url, PHP_URL_PATH));

try {
    $response = $fb->get("/$id/posts?limit=10", $accessToken);
    $posts = $response->getDecodedBody();

    foreach ($posts['data'] as $post) {
        echo "<p>{$post['message']}</p>";
    }
} catch (\Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
