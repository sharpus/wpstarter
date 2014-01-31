<?php
if(!isset($content_width))
    $content_width = 600;


if (!function_exists('hdstarter_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function hdstarter_setup() {

        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * If you're building a theme based on Spawexpert.pl, use a find and replace
         * to change 'spawexpert' to the name of your theme in all the template files
         */
        load_theme_textdomain('hdstarter', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support('automatic-feed-links');

        /**
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'hdstarter'),
        ));

        /**
         * Enable support for Post Formats
         */
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

        /**
         * Setup the WordPress core custom background feature.
         */
        add_theme_support('custom-background', apply_filters('hdstarter_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif; // spawexpert_setup
add_action('after_setup_theme', 'hdstarter_setup');

/**
 * Register widgetized area and update sidebar with default widgets
 */
function hdstarter_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'hdstarter'),
        'id' => 'sidebar-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'hdstarter_widgets_init');


//Load jQuery
$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'; // the URL to check against  
$test_url = @fopen($url, 'r');
if ($test_url !== false) {

    function load_external_jQuery() {
        if (!is_admin()) {
            wp_deregister_script('jquery');
            wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), '1.10.2');
            wp_enqueue_script('jquery');
        }
    }

    add_action('wp_footer', 'load_external_jQuery');
} else {

    function load_local_jQuery() {
        if (!is_admin()) {
            wp_deregister_script('jquery');
            wp_register_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-1.10.2.min.js', array(), '1.10.2');
            wp_enqueue_script('jquery');
        }
    }

    add_action('wp_footer', 'load_local_jQuery');
}

//Load JS Sripts at footer
function load_footer_scripts() {
    if (!is_admin()) {
        wp_register_script('plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.0');
        wp_enqueue_script('plugins');

        wp_register_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0');
        wp_enqueue_script('main');
    }
}

add_action('wp_footer', 'load_footer_scripts');

//Load JS Sripts at header
function load_header_scripts() {
    if (!is_admin()) {
        wp_register_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', array(), '2.6.2');
        wp_enqueue_script('modernizr');
    }
}

add_action('wp_enqueue_scripts', 'load_header_scripts');

//Load stylesheets
function load_styles() {

    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
    wp_enqueue_style('main');
}

add_action('wp_enqueue_scripts', 'load_styles');

//Remove recent comments style
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'my_remove_recent_comments_style');

//Filters
add_filter('show_admin_bar', '__return_false');

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

