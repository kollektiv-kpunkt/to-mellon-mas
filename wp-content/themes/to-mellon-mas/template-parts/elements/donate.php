<?php
$iconSVG = file_get_contents( __DIR__ . '/../elements/img/icon.svg' );
?>

<div class="tmm-donate-wrapper bg-accent relative mt-36">
    <div class="smcont z-10 relative py-12 text-white text-center">
        <h2 class="text-6xl mb-4 text-white"><?= $_ENV['i18n']['fragments']['donate-title'] ?></h2>
        <div class="text-xl font-semibold mb-6"><?= $_ENV['i18n']['fragments']['donate-content'] ?></div>
        <div class="tmm-donate-boxes flex flex-wrap gap-4" data-donate-type="amount">
            <?php
            $boxes = array (20,50,100,"custom");
            $i = 0;
            foreach($boxes as $box) :
                if ($box == "custom"):
                    ?>
                    <div class="tmm-donate-box flex tmm-graph<?= ($i == 1) ? " tmm-donate-box-selected" : "" ?>">
                        <input type="number" class="tmm-donate-box-custom"/>
                        <span class="tmm-donate-box-currency">CHF</span>
                    </div>
                    <?php
                    continue;
                endif;
            ?>
                <div class="tmm-donate-box flex tmm-graph<?= ($i == 1) ? " tmm-donate-box-selected" : "" ?>">
                    <span class="tmm-donate-box-amount" data-amount="<?= $box ?>"><?= $box ?></span>
                    <span class="tmm-donate-box-currency">CHF</span>
                </div>
            <?php
            $i++;
            endforeach;
            ?>
            <button class="tmm-donate-submit tmm-button tmm-button-neg tmm-button-next w-full"><?= $_ENV['i18n']['misc']['submitdonate'] ?></button>
        </div>
    </div>

    <?php
    get_template_part( "template-parts/elements/spaghetti");
    ?>
</div>