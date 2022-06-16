<?php
$toggle = $args;
?>

<details class="tmm-toggle-details bg-accent text-start"<?= ($toggle["default_setting"]) ? " open" : "" ?>>
    <summary class="tmm-toggle-summary tmm-graph text-xl flex justify-between leading-none">
        <span class="tmm-toggle-title"><?= $toggle["title"] ?></span>
        <div class="tmm-toggle-icon text-center">›</div>
    </summary>
    <div class="tmm-toggle-content mt-4">
        <?= $toggle["content"] ?>
    </div>
</details>