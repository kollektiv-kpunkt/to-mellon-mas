<?php
require __DIR__ . '/../vendor/autoload.php';
use Pecee\SimpleRouter\SimpleRouter as Router;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

function setupFormdata($data) {
    foreach(json_decode($data["formData"]) as $key => $value) {
        $data[$key] = $value;
    }
    unset($data["formData"]);
    return $data;
}

Router::post('/api/v1/pledge/step1', function() {
    $mcapi = $_ENV["MCAPI"];
    $mclistid = $_ENV["MCLISTID"];
    $mcserver = $_ENV["MCSERVERPREFIX"];
    $client = new \MailchimpMarketing\ApiClient();
    $client->setConfig([
        'apiKey' => $mcapi,
        'server' => $mcserver
    ]);

    include(__DIR__ . '/pledge/step1.php');
});

Router::post('/api/v1/pledge/step2', function() {
    $mcapi = $_ENV["MCAPI"];
    $mclistid = $_ENV["MCLISTID"];
    $mcserver = $_ENV["MCSERVERPREFIX"];
    $client = new \MailchimpMarketing\ApiClient();
    $client->setConfig([
        'apiKey' => $mcapi,
        'server' => $mcserver
    ]);

    include(__DIR__ . '/pledge/step2.php');
});

Router::post('/api/v1/pledge/step3', function() {
    $mcapi = $_ENV["MCAPI"];
    $mclistid = $_ENV["MCLISTID"];
    $mcserver = $_ENV["MCSERVERPREFIX"];
    $client = new \MailchimpMarketing\ApiClient();
    $client->setConfig([
        'apiKey' => $mcapi,
        'server' => $mcserver
    ]);

    include(__DIR__ . '/pledge/step3.php');
});

Router::post('/api/v1/newsletter', function() {
    $mcapi = $_ENV["MCAPI"];
    $mclistid = $_ENV["MCLISTID"];
    $mcserver = $_ENV["MCSERVERPREFIX"];
    $client = new \MailchimpMarketing\ApiClient();
    $client->setConfig([
        'apiKey' => $mcapi,
        'server' => $mcserver
    ]);

    include(__DIR__ . '/newsletter.php');
});

Router::start();

?>