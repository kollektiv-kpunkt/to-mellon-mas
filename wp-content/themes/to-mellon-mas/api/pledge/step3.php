<?php
if($json = json_decode(file_get_contents("php://input"), true)) {
    $data = setupFormdata($json);
} else {
    $data = setupFormdata($_POST);
}

$contactdata = [
    'address1' => $data['street'],
    'city' => $data['city'],
    "state" => $data['canton'],
    'country' => "Switzerland",
];

$response = $contactApi->edit($data['mauID'], $contactdata);

$return = [
    "success" => true,
    "nextStep" => 4,
    "formData" => $data,
    "errors" => []
];
echo json_encode($return);
exit;