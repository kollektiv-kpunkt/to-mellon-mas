<div id="tmm-navbar-inner" class="mt-4">
    <div class="tmm-navbar-content">
        <div class="tmm-menu-main flex gap-x-10 my-auto justify-center">
            <?php
            $menuitems = tmm_menu_items("tmm-main-nav");
            foreach ($menuitems as $item) {
                $title = $item->title;
                $url = $item->url;
                $classes = "tmm-menu-item px-1 tmm-graph";
                if ($item->current) {
                    $classes .= " tmm-menu-item-current";
                }
                echo "<a href='$url' class='$classes'>$title</a>";
            }
            ?>
        </div>
    </div>
    <div class="tmm-language-switcher flex gap-x-2 tmm-graph items-center">
        <?php
            $langs = pll_the_languages(array("raw" => 1));
            $langs = array_filter(
                $langs,
                function ($k) {
                    return $k != pll_current_language("slug");
                },
                ARRAY_FILTER_USE_KEY
            );
            $i = 1;
            foreach ($langs as $lang):
            ?>
            <a href="<?= $lang["url"] ?>" class="tmm-lang-link px-0.5"><?= strtoupper($lang["slug"]) ?></a>
            <?php
            if ($i < count($langs)) {
                echo "/";
            }
            $i++;
            endforeach;
        ?>
    </div>
</div>