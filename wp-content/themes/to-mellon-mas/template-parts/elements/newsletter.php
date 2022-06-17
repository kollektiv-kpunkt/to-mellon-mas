<?php
$formid = rand(1,99999);
?>
<div class="tmm-newsletter-wrapper my-36">
    <div class="tmm-newsletter-inner tmm-2col tmm-2cpol-largegap mdcont">
        <div class="tmm-newsletter-content my-auto py-8">
            <h2 class="text-6xl mb-4"><?= $_ENV['i18n']['fragments']['newsletter-title'] ?></h2>
            <div class="text-xl font-semibold mb-6">
                <p><?= $_ENV['i18n']['fragments']['newsletter-content'] ?></p>
            </div>
            <form action="#" class="tmm-api-form mt-6" data-type="message" data-endpoint="newsletter">
                <div class="tmm-response-alert border-4 border-accent-120 bg-accent-30 text-accent-120 my-4 leading-none p-2 rounded" hidden>
                    <span class="tmm-response-message tmm-graph text-xl"></span>
                </div>
                <div class="tmm-form-wrapper">
                    <div class="tmm-form-group">
                        <label for="fname-<?=$formid?>"><?= $_ENV['i18n']['misc']['fname'] ?></label>
                        <input type="text" name="fname" id="fname-<?=$formid?>" class="tmm-form-input" required>
                    </div>
                    <div class="tmm-form-group">
                        <label for="lname-<?=$formid?>"><?= $_ENV['i18n']['misc']['lname'] ?></label>
                        <input type="text" name="lname" id="lname-<?=$formid?>" class="tmm-form-input" required>
                    </div>
                    <div class="tmm-form-group tmm-form-group-fullwidth">
                        <label for="email-<?=$formid?>"><?= $_ENV['i18n']['misc']['email'] ?></label>
                        <input type="email" name="email" id="email-<?=$formid?>" class="tmm-form-input" required>
                    </div>
                    <div class="tmm-form-group tmm-form-group-checkbox tmm-form-group-fullwidth">
                        <input type="checkbox" name="optin" id="optin-<?=$formid?>" class="tmm-form-input" checked>
                        <label for="optin-<?=$formid?>"><?= $_ENV['i18n']['misc']['optin'] ?></label>
                    </div>
                    <input type="hidden" name="lang" value="<?= pll_current_language("slug") ?>">
                    <button type="submit" class="tmm-button tmm-button-next"><?= $_ENV['i18n']['misc']['submit2'] ?></button>
                </div>
            </form>
        </div>
        <div class="tmm-newsletter-image-wrapper my-auto">
            <div class="tmm-newsletter-image-inner">
                <img src="<?= get_template_directory_uri() ?>/template-parts/elements/img/<?= rand(1,5) ?>-newsletter.jpg">
                <div class="tmm-newsletter-image-blind tmm-newsletter-image-saturation"></div>
                <div class="tmm-newsletter-image-blind tmm-newsletter-image-overlay"></div>
                <?php
                get_template_part( "template-parts/elements/spaghetti");
                ?>
            </div>
        </div>
    </div>
</div>