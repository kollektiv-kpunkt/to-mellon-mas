<?php
$iconSVG = file_get_contents( __DIR__ . '/../elements/img/icon.svg' );
$formid = rand(1,99999);
?>
<div class="tmm-heroine-wrapper pt-28 pb-14 bg-accent relative">
    <div class="mdcont z-10 relative tmm-2col tmm-2col-largegap">
        <div class="tmm-heroine-icon my-auto"><?= $iconSVG ?></div>
        <div class="tmm-heroine-content text-white my-auto text-center">
            <h1 class="text-7xl mb-4"><?= the_field("title") ?></h1>
            <div class="text-xl font-semibold"><?= the_field("content") ?></div>
            <form action="#" class="tmm-api-form mt-6" data-type="multistep" data-namespace="pledge" data-step="1" data-endpoint="pledge/step1">
                <div class="tmm-form-wrapper tmm-form-white">
                    <div class="tmm-form-group">
                        <label for="fname-<?=$formid?>"><?= $_ENV['i18n']['misc']['fname'] ?></label>
                        <input type="text" name="fname" id="fname-<?=$formid?>" class="tmm-form-input" required>
                    </div>
                    <div class="tmm-form-group">
                        <label for="lname-<?=$formid?>"><?= $_ENV['i18n']['misc']['lname'] ?></label>
                        <input type="text" name="lname" id="lname-<?=$formid?>" class="tmm-form-input" required>
                    </div>
                    <div class="tmm-form-group">
                        <label for="email-<?=$formid?>"><?= $_ENV['i18n']['misc']['email'] ?></label>
                        <input type="email" name="email" id="email-<?=$formid?>" class="tmm-form-input" required>
                    </div>
                    <div class="tmm-form-group">
                        <label for="zip-<?=$formid?>"><?= $_ENV['i18n']['misc']['zip'] ?></label>
                        <input type="text" name="zip" id="zip-<?=$formid?>" class="tmm-form-input" required>
                    </div>
                    <div class="tmm-form-group tmm-form-group-checkbox tmm-form-group-fullwidth">
                        <input type="checkbox" name="printer" id="printer-<?=$formid?>" class="tmm-form-input">
                        <label for="printer-<?=$formid?>"><?= $_ENV['i18n']['misc']['printer'] ?></label>
                    </div>
                    <div class="tmm-form-group tmm-form-group-checkbox tmm-form-group-fullwidth">
                        <input type="checkbox" name="optin" id="optin-<?=$formid?>" class="tmm-form-input" checked>
                        <label for="optin-<?=$formid?>"><?= $_ENV['i18n']['misc']['optin'] ?></label>
                    </div>
                    <input type="hidden" name="lang" value="<?= pll_current_language("slug") ?>">
                    <input type="hidden" name="source" value="<?= (isset($_GET["src"])) ? $_GET["src"] : ""?>">
                    <button type="submit" class="tmm-button tmm-button-neg tmm-button-next"><?= $_ENV['i18n']['misc']['submit1'] ?></button>
                </div>
            </form>
        </div>
    </div>
    <?php
    get_template_part( "template-parts/elements/spaghetti");
    ?>
</div>