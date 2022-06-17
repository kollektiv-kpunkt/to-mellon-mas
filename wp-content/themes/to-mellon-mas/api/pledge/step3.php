<?php
if($json = json_decode(file_get_contents("php://input"), true)) {
    $data = setupFormdata($json);
} else {
    $data = setupFormdata($_POST);
}

$mcload = [
    "email_address" => $data["email"],
    'merge_fields' => [
        "ADDRESS" => [
            "addr1" => $data["street"],
            "city" => $data["city"],
            "state" => $data["canton"],
            "zip" => $data["zip"],
            "country" => "CH",
        ]
    ],
    'tags' => [],
    "status" => "subscribed",
];

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

$return = [
    "success" => true,
    "nextStep" => 4,
    "formData" => $data,
    "errors" => []
];
echo json_encode($return);
exit;