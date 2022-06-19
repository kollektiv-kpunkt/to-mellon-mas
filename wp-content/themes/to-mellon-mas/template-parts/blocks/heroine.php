<?php
$iconSVG = file_get_contents( __DIR__ . '/../elements/img/icon.svg' );
$formid = rand(1,99999);
?>
<div id="mitmachen" class="tmm-heroine-outer">
    <div class="tmm-heroine-wrapper pt-28 pb-14 bg-accent relative">
        <div class="mdcont z-10 relative tmm-2col tmm-2col-largegap">
            <div class="tmm-heroine-icon my-auto"><?= $iconSVG ?></div>
            <div class="tmm-heroine-content text-white my-auto text-center">
                <h1 class="text-7xl mb-4"><?= the_field("title") ?></h1>
                <div class="text-xl font-semibold"><?= the_field("content") ?></div>
                <form action="#" class="tmm-api-form mt-6" data-type="multistep" data-namespace="pledge-<?= $formid ?>" data-step="1" data-endpoint="pledge/step1" data-overlay="overlay-<?= $formid ?>">
                    <div class="tmm-form-wrapper tmm-form-white">
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
                <form action="#" class="tmm-api-form mt-6" data-type="multistep" data-namespace="pledge-<?= $formid ?>" data-step="2" data-endpoint="pledge/step2" data-overlay="overlay-<?= $formid ?>" hidden>
                    <div class="tmm-form-wrapper tmm-form-white">
                        <p><tmm-negative><?= $_ENV['i18n']['misc']['supportthx'] ?></tmm-negative></p>
                        <div class="tmm-form-group">
                            <label for="noSigns-<?=$formid?>"><?= $_ENV['i18n']['misc']['noSigns'] ?></label>
                            <input type="text" name="noSigns" id="noSigns-<?=$formid?>" value="10" class="tmm-form-input" required>
                        </div>
                        <div class="tmm-form-group">
                            <label for="zip-<?=$formid?>"><?= $_ENV['i18n']['misc']['zip'] ?></label>
                            <input type="text" name="zip" id="zip-<?=$formid?>" class="tmm-form-input" required>
                        </div>
                        <input type="hidden" name="formData">
                        <button type="submit" class="tmm-button tmm-button-neg tmm-button-next"><?= $_ENV['i18n']['misc']['submit2'] ?></button>
                    </div>
                </form>
                <form action="#" class="tmm-api-form mt-6" data-type="multistep" data-namespace="pledge-<?= $formid ?>" data-step="3" data-endpoint="pledge/step3" data-overlay="overlay-<?= $formid ?>" hidden>
                    <div class="tmm-form-wrapper tmm-form-white">
                        <p><tmm-negative><?= $_ENV['i18n']['misc']['noPrinterPrompt'] ?></tmm-negative></p>
                        <div class="tmm-form-group tmm-form-group-fullwidth">
                            <label for="street-<?=$formid?>"><?= $_ENV['i18n']['misc']['street'] ?></label>
                            <input type="text" name="street" id="street-<?=$formid?>" class="tmm-form-input" required>
                        </div>
                        <div class="tmm-form-group">
                            <label for="city-<?=$formid?>"><?= $_ENV['i18n']['misc']['city'] ?></label>
                            <input type="text" name="city" id="city-<?=$formid?>" class="tmm-form-input" required>
                        </div>
                        <div class="tmm-form-group">
                            <label for="canton-<?=$formid?>"><?= $_ENV['i18n']['misc']['canton'] ?></label>
                            <select name="canton" class="text-accent h-full" id="canton-<?=$formid?>" required>
                                <option value="" selected disabled hidden><?= $_ENV['i18n']['misc']['selectCanton'] ?></option>
                                <?php
                                foreach ($_ENV['i18n']['cantons'] as $value => $canton) :
                                ?>
                                <option value="<?= $value ?>"><?= $canton ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="formData">
                        <button type="submit" class="tmm-button tmm-button-neg tmm-button-next"><?= $_ENV['i18n']['misc']['submit3'] ?></button>
                    </div>
                </form>
                <form action="#" class="tmm-api-form mt-6" data-type="multistep" data-namespace="pledge-<?= $formid ?>" data-step="4" hidden>
                    <div class="tmm-form-white">
                        <p><tmm-negative><?= $_ENV['i18n']['misc']['finalthx'] ?></tmm-negative></p>
                        <p class="mb-4"><?= $_ENV['i18n']['misc']['mobi'] ?></p>
                        <div class="flex flex-wrap gap-2 mt-2 tmm-share-buttons" data-sharetext="<?= $_ENV['i18n']['misc']['mobiMSG'] ?>">
                            <button data-type="whatsapp" href="#" class="tmm-button"><?= $_ENV['i18n']['misc']['shareWA'] ?></button>
                            <button data-type="telegram" href="#" class="tmm-button"><?= $_ENV['i18n']['misc']['shareTele'] ?></button>
                            <button data-type="facebook" href="#" class="tmm-button" ><?= $_ENV['i18n']['misc']['shareFB'] ?></button>
                            <button data-type="email" href="#" class="tmm-button tmm-button-neg tmm-button-line tmm-button-next"><?= $_ENV['i18n']['misc']['shareMail'] ?></button>
                        </div>
                        <input type="hidden" name="formData">
                    </div>
                </form>
            </div>
        </div>
        <?php
        get_template_part( "template-parts/elements/spaghetti");
        ?>
    </div>
</div>

<div class="tmm-form-overlay fixed top-0 left-0 w-full h-full" id="overlay-<?= $formid ?>">
    <div class="absolute top-0 left-0 w-full h-full z-50 tmm-form-overlay-content flex justify-center items-center text-4xl tmm-graph text-white">
        Loading...
    </div>
    <div class="absolute top-0 left-0 w-full h-full bg-accent-120 z-40 opacity-80 tmm-form-overlay-blind"></div>
</div>