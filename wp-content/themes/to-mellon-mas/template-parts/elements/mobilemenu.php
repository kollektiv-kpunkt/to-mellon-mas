<div class="tmm-mobilemenu-wrapper tmm-navbar-mobile h-screen bg-accent-120 z-50 py-20 flex flex-col justify-center">
    <div class="tmm-mobilemenu-inner w-full">
        <div class="tmm-mobilemenu-content">
            <div class="tmm-mobilemenu-main flex flex-col gap-y-10">
                <?php
                $menuitems = tmm_menu_items("tmm-main-nav");
                foreach ($menuitems as $item) {
                    $title = $item->title;
                    $url = $item->url;
                    $classes = "tmm-menu-item px-10 py-4 tmm-graph";
                    if ($item->current) {
                        $classes .= " tmm-menu-item-current";
                    }
                    echo "<a href='$url' class='$classes'>$title</a>";
                }
                ?>
            </div>
        </div>
        <div class="tmm-mobilemenu-language-switcher flex gap-x-2 pt-10 tmm-graph justify-end items-center lgcont text-white text-2xl leading-none">
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
</div>