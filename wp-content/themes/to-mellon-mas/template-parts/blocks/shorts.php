<?php
$iconSVG = file_get_contents( __DIR__ . '/../elements/img/icon.svg' );
?>

<div class="tmm-shorts-wrapper bg-accent relative my-36" id="argu">
    <div class="smcont z-10 relative py-12 text-white text-center">
        <h2 class="text-6xl mb-4 text-white"><?= the_field("title") ?></h2>
        <div class="text-xl font-semibold mb-6"><?= the_field("content") ?></div>
        <?php
        $toogles = get_field("toggles");
        $i = 0;
        $numtoggles = count($toogles);
        foreach($toogles as $toggle) :
        ?>
            <div class="tmm-details-wrapper<?= ($i < $numtoggles) ? " mb-2" : "" ?>">
                <?php get_template_part( "template-parts/elements/toggle", "", $toggle); ?>
            </div>
        <?php
        $i++;
        endforeach;
        ?>
    </div>

    <?php
    get_template_part( "template-parts/elements/spaghetti");
    ?>
</div>