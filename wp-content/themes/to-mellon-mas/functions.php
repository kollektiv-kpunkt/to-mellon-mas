<?php
/* tmm */
if(!is_admin()) {
    $_ENV["i18n"] = json_decode(file_get_contents(__DIR__ . "/i18n/" . pll_current_language("slug") . ".json"), true);
}

function tmm_scripts() {
    wp_enqueue_style( 'bundle', get_template_directory_uri() . '/dist/bundle.min.css', [], "1.0.0" );
    wp_enqueue_script( 'bundle', get_template_directory_uri() . '/dist/app.min.js', array(), "1.0.0", true );
}
add_action( 'wp_enqueue_scripts', 'tmm_scripts' );

function tmm_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'editor-styles' );
    add_editor_style('dist/bundle.min.css' );
}
add_action( 'after_setup_theme', 'tmm_theme_support' );

function tmm_menus() {
  register_nav_menu('tmm-main-nav',__( 'Main Navigation' ));
  register_nav_menu('tmm-footer-nav',__( 'Footer Navigation' ));
}
add_action( 'init', 'tmm_menus' );

function tmm_menu_items( $location, $args = [] ) {

    // Get all locations
    $locations = get_nav_menu_locations();

    // Get object id by location
    $object = wp_get_nav_menu_object( $locations[$location] );

    // Get menu items by menu name
    $menu_items = wp_get_nav_menu_items( $object->name, $args );

    // Return menu post objects
    return $menu_items;
}

add_filter( 'wp_get_nav_menu_items', 'prefix_nav_menu_classes', 10, 3 );

function prefix_nav_menu_classes($items, $menu, $args) {
    _wp_menu_item_classes_by_context($items);
    return $items;
}

// TMM Shortcodes

function tmm_cookie_shortcode($atts, $content = null) {
    ob_start();
    echo('<a><button data-cc="c-settings" class="underline">' . $content . '</button></a>');
    return ob_get_clean();
}

add_shortcode('tmm-cookie-settings', 'tmm_cookie_shortcode');

function tmm_explain_shortcode($atts, $content = null) {
    ob_start();
    echo('<a class="tmm-explain-link" data-explanation="' . $content . '"></a>');
    return ob_get_clean();
}

add_shortcode('tmm-explain', 'tmm_explain_shortcode');

function tmm_explain_container_shortcode($atts, $content = null) {
    ob_start();
    get_template_part( "template-parts/elements/explain-container");
    return ob_get_clean();
}

add_shortcode('tmm-explain-container', 'tmm_explain_container_shortcode');

/* Element Shortcode */
function tmm_element_shortcode($atts) {
    $args = shortcode_atts( array(
        "elem" => "",
    ), $atts, "tmm-element" );
    ob_start();
    get_template_part("template-parts/elements/{$args['elem']}", "", $atts);
    return ob_get_clean();
}

add_shortcode('tmm-element', 'tmm_element_shortcode');


// ACF

function tmm_acf() {
    define( 'MY_ACF_PATH', get_stylesheet_directory() . '/lib/acf/' );
    define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/lib/acf/' );
    include_once( MY_ACF_PATH . 'acf.php' );
    add_filter('acf/settings/url', 'my_acf_settings_url');
    function my_acf_settings_url( $url ) {
        return MY_ACF_URL;
    }

    add_filter('acf/settings/save_json', 'set_acf_json_save_folder');
    function set_acf_json_save_folder( $path ) {
        $path = MY_ACF_PATH . '/acf-json';
        return $path;
    }
    add_filter('acf/settings/load_json', 'add_acf_json_load_folder');
    function add_acf_json_load_folder( $paths ) {
        unset($paths[0]);
        $paths[] = MY_ACF_PATH . '/acf-json';;
        return $paths;
    }

    // (Optional) Hide the ACF admin menu item.
    // add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
    // function my_acf_settings_show_admin( $show_admin ) {
    //     return false;
    // }
}
tmm_acf();

add_action('acf/init', 'tmm_blocktypes');
function tmm_blocktypes() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        acf_register_block_type(array(
            'name'              => 'heroine',
            'title'             => __('Heroine Section'),
            'description'       => __('Heroine Section for the homepage'),
            'render_template'   => 'template-parts/blocks/heroine.php',
            'category'          => 'tmm',
            'icon'              => '',
            'keywords'          => array("hero", "heroine", "section"),
        ));

        acf_register_block_type(array(
            'name'              => 'intro',
            'title'             => __('Intro'),
            'description'       => __('Intro block for the homepage'),
            'render_template'   => 'template-parts/blocks/intro.php',
            'category'          => 'tmm',
            'icon'              => '',
            'keywords'          => array("intro", "section"),
        ));

        acf_register_block_type(array(
            'name'              => 'shorts',
            'title'             => __('Short Arguments'),
            'description'       => __('Short Arguments block for the homepage'),
            'render_template'   => 'template-parts/blocks/shorts.php',
            'category'          => 'tmm',
            'icon'              => '',
            'keywords'          => array("Arguments", "toggles", "section"),
        ));
    }
}