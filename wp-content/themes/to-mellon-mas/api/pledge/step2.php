<?php
if($json = json_decode(file_get_contents("php://input"), true)) {
    $data = setupFormdata($json);
} else {
    $data = setupFormdata($_POST);
}

$mcload = [
    "email_address" => $data["email"],
    'merge_fields' => [
        "NOSIGNS" => $data["noSigns"],
        "ZIP" => $data["zip"],
    ],
    'tags' => [],
    "status" => "subscribed",
];

if ($data["noSigns"] > 10) {
    array_push($mcload["tags"], "Supersammler*in");
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

if (isset($data["printer"])) {
    $nextStep = 3;
} else {
    $nextStep = 4;
}

$return = [
    "success" => true,
    "nextStep" => $nextStep,
    "formData" => $data,
    "errors" => []
];
echo json_encode($return);
exit;