<?php
require __DIR__ . '/../vendor/autoload.php';
use Pecee\SimpleRouter\SimpleRouter as Router;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

global $client;

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

Router::start();

?>