<?php
if($json = json_decode(file_get_contents("php://input"), true)) {
    $data = $json;
} else {
    $data = $_POST;
}
$_ENV["i18n"] = json_decode(file_get_contents(__DIR__ . "/../i18n/" . $data["lang"] . ".json"), true);

if (isset($_COOKIE["mtm_consent"])) {
    $mtm->doTrackEvent("CtA Action", "Newsletter", $data["uuid"]);
}

$listdata = $contactApi->getList("email:" . $data["email"]);

$contactdata = [
    "email" => $data["email"],
    'firstname' => $data['fname'],
    'lastname' => $data['lname'],
    "form_uuid" => "Newsletter: " . $data["uuid"],
    'tags' => ["lang_" . $data["lang"], "newsletter"],
];

if (isset($data["optin"])) {
    array_push($contactdata["tags"], "optin");
}

if ($listdata["total"] > 0) {
    $contactApi->edit(array_values($listdata["contacts"])[0]['id'], $contactdata);
} else {
    $response = $contactApi->create($contactdata);
    $contact  = $response[$contactApi->itemName()];
    $data["mauID"] = $contact["id"];
}

$return = [
    "success" => true,
    "message" => $_ENV['i18n']['misc']['subscriptionThx'],
    "errors" => []
];
echo json_encode($return);
exit;