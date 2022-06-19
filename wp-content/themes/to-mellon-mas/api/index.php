<?php
require __DIR__ . '/../vendor/autoload.php';
use Pecee\SimpleRouter\SimpleRouter as Router;
use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

function setupFormdata($data) {
    foreach(json_decode($data["formData"]) as $key => $value) {
        $data[$key] = $value;
    }
    unset($data["formData"]);
    return $data;
}

$settings = [
    'userName'   => $_ENV["MAUUSER"],
    'password'   => $_ENV["MAUPW"],
];

$initAuth = new ApiAuth();
$auth     = $initAuth->newAuth($settings, 'BasicAuth');
$api        = new MauticApi();
global $contactApi;
$contactApi = $api->newApi('contacts', $auth, $_ENV["MAUURL"]);

Router::post('/api/v1/pledge/step1', function() {
    global $contactApi;
    include(__DIR__ . '/pledge/step1.php');
});

Router::post('/api/v1/pledge/step2', function() {
    global $contactApi;
    include(__DIR__ . '/pledge/step2.php');
});

Router::post('/api/v1/pledge/step3', function() {
    global $contactApi;
    include(__DIR__ . '/pledge/step3.php');
});

Router::post('/api/v1/newsletter', function() {
    global $contactApi;
    include(__DIR__ . '/newsletter.php');
});

Router::start();

?>