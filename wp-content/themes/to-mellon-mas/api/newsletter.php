<?php
if($json = json_decode(file_get_contents("php://input"), true)) {
    $data = $json;
} else {
    $data = $_POST;
}
$_ENV["i18n"] = json_decode(file_get_contents(__DIR__ . "/../i18n/" . $data["lang"] . ".json"), true);

$mcload = [
    "email_address" => $data["email"],
    'merge_fields' => [
        "FNAME" => $data["fname"],
        "LNAME" => $data["lname"],
    ],
    'tags' => [],
    "status" => "subscribed",
];

if (isset($data["optin"])) {
    array_push($mcload["tags"], "optin");
}

try {
    $response = $client->lists->setListMember($mclistid, strtolower(md5($data["email"])), $mcload);
} catch (GuzzleHttp\Exception\ClientException $e) {
    $return = [
      "sucess" => false,
      "message" => "Something went wrong, please try again later.",
      "content" => $e->getResponse()->getBody()->getContents(),
      "errors" => [$e->getMessage()]
    ];
    echo json_encode($return);
    exit;
}

if (!$response) {
    echo(json_encode(["success" => false]));
    exit;
}

try {
    $response = $client->lists->createListMemberNote(
        $mclistid,
        strtolower(md5($data["email"])),
        [
            "note" => "Form submission: " . $data["uuid"]
        ]
    );
} catch (GuzzleHttp\Exception\ClientException $e) {
    $return = [
      "sucess" => false,
      "message" => "Something went wrong, please try again later.",
      "content" => $e->getResponse()->getBody()->getContents(),
      "errors" => [$e->getMessage()]
    ];
    echo json_encode($return);
    exit;
}

if (!$response) {
    echo(json_encode(["success" => false]));
    exit;
}

$return = [
    "success" => true,
    "message" => $_ENV['i18n']['misc']['subscriptionThx'],
    "errors" => []
];
echo json_encode($return);
exit;