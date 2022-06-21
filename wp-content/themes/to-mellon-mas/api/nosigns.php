<?php
include(__DIR__ . "/../../../../wp-load.php");
if (!is_user_logged_in()) {
    header("Location: " . get_bloginfo("url") . "/wp-login.php?redirect_to=" . get_bloginfo( "url" ) . "/api/v1/nosigns");
}
$contacts = $contactApi->getList("tag:pledge_project21", "", 10000000);

$numSigns = 0;
$numContacts = count($contacts["contacts"]);

foreach ($contacts["contacts"] as $key => $contact) {
    $numSigns += $contact["fields"]["core"]["nosigns"]["value"];
}
?>

<p><b>Anzahl Unterstützer*innen:</b> <?php echo($numContacts); ?></p>
<p><b>Anzahl Unterschriften:</b> <?php echo($numSigns); ?></p>
