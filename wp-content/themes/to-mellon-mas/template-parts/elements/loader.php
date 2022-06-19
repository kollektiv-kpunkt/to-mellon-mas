<?php
$iconSVG = file_get_contents( __DIR__ . '/../elements/img/icon.svg' );
?>

<div class="tmm-loader" style="position: fixed; top: 0; left: 0; height:100%; width: 100%; background-color: var(--accent); z-index: 100000000">
    <div class="tmm-loader-content relative z-10 py-10 flex h-full" style="opacity: 0;">
            <?= $iconSVG ?>
    </div>
    <?php
    get_template_part( "template-parts/elements/spaghetti");
    ?>
</div>