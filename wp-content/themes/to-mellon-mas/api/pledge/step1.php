<?php
if($json = json_decode(file_get_contents("php://input"), true)) {
    $data = $json;
} else {
    $data = $_POST;
}

$listdata = $contactApi->getList("email:" . $data["email"]);

$contactdata = [
    "email" => $data["email"],
    'firstname' => $data['fname'],
    'lastname' => $data['lname'],
    "form_uuid" => $data["uuid"],
    'tags' => ["lang_" . $data["lang"]],
];

if (isset($data["optin"])) {
    array_push($contactdata["tags"], "optin");
}

if (isset($data["source"]) && $data["source"] != "") {
    array_push($contactdata["tags"], "src_" . $data["source"]);
}

if (isset($data["printer"])) {
    array_push($contactdata["tags"], "no_printer");
}


if ($listdata["total"] > 0) {
    $contactApi->edit(array_values($listdata["contacts"])[0]['id'], $contactdata);
    $data["mauID"] = array_values($listdata["contacts"])[0]['id'];
} else {
    $response = $contactApi->create($contactdata);
    $contact  = $response[$contactApi->itemName()];
    $data["mauID"] = $contact["id"];
}

$return = [
    "success" => true,
    "nextStep" => 2,
    "formData" => $data,
    "errors" => []
];
echo json_encode($return);
exit;