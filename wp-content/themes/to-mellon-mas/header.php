<!DOCTYPE html>
<?php
$rootclasses = "";
$designSystem = " tmm-ds" . rand(1,3);
$rootclasses .= $designSystem;

if (is_front_page()) {
    $rootclasses .= " tmm-frontpage";
}

?>
<html <?php language_attributes(); ?> class="<?= $rootclasses ?>" data-design-system="<?= $designSystem ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    wp_head();
    ?>
</head>
<nav id="tmm-nav-wrapper">
    <?php
    get_template_part( "template-parts/elements/navbar");
    ?>
</nav>
<?php
get_template_part( "template-parts/elements/mobilemenu");
?>
<body>

    <div id="main-content">