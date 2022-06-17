<?php
if($json = json_decode(file_get_contents("php://input"), true)) {
    $data = $json;
} else {
    $data = $_POST;
}

$mcload = [
    "email_address" => $data["email"],
    'merge_fields' => [
        "FNAME" => $data["fname"],
        "LNAME" => $data["lname"]
    ],
    'tags' => ["lang_" . $data["lang"]],
    "status" => "subscribed",
];

if (isset($data["optin"])) {
    array_push($mcload["tags"], "optin");
}

if (isset($data["source"]) && $data["source"] != "") {
    array_push($mcload["tags"], "src_" . $data["source"]);
}

if (isset($data["printer"])) {
    array_push($mcload["tags"], "no_printer");
    $nextStep = "2";
} else {
    $nextStep = "3";
}

try {
    $response = $client->lists->setListMember($mclistid, strtolower(md5($data["email"])), $mcload);
} catch (GuzzleHttp\Exception\ClientException $e) {
    $return = [
      "sucess" => false,
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
    "nextStep" => $nextStep,
    "formData" => $data,
    "errors" => []
];
echo json_encode($return);
exit;