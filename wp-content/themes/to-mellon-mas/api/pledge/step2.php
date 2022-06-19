<?php
if($json = json_decode(file_get_contents("php://input"), true)) {
    $data = setupFormdata($json);
} else {
    $data = setupFormdata($_POST);
}

if (isset($_COOKIE["mtm_consent"])) {
    $mtm->doTrackEvent("Pledge", "Step 2", $data["uuid"]);
}

$contactdata = [
    'nosigns' => $data['noSigns'],
    'zipcode' => $data['zip'],
    "form_uuid" => $data["uuid"],
    'tags' => ["pledge_project21"],
];

if ($data["noSigns"] > 10) {
    array_push($contactdata["tags"], "Supersammler*in Porject21");
}

if (isset($data["printer"])) {
    $nextStep = 3;
} else {
    $nextStep = 4;
}

$contactApi->edit($data['mauID'], $contactdata);

$return = [
    "success" => true,
    "nextStep" => $nextStep,
    "formData" => $data,
    "errors" => []
];
echo json_encode($return);
exit;