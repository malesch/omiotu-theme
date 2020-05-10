<?php

if (function_exists('add_theme_support'))
{
    add_theme_support('post-thumbnails');
    add_image_size('homeimage', 992, 5000, false);
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

function omiotu_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin())
    {
        wp_register_script('bootstrap', get_template_directory_uri() . '/js/lib/bootstrap.min.js', array() , '3.3.2', true); // Modernizr
        wp_enqueue_script('bootstrap');
        wp_register_script('omiotu_email', plugins_url() . '/email-subscribers/widget/es-widget-page.js', array() , '3.3.2', true); // Modernizr
        wp_enqueue_script('omiotu_email');

        //wp_register_script('omiotu_scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0',true); // Custom scripts
        // wp_enqueue_script('omiotu_scripts');
    }
}

function array_swap(&$array, $swap_a, $swap_b)
{
    list($array[$swap_a], $array[$swap_b]) = array(
        $array[$swap_b],
        $array[$swap_a]
    );
}

function omiotu_styles()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array() , '3.3.2', 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('omiotu_style', get_template_directory_uri() . '/style.css', array() , '1.0', 'all');
    wp_enqueue_style('omiotu_style');
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home())
    {
        $key = array_search('blog', $classes);
        if ($key > - 1)
        {
            unset($classes[$key]);
        }
    }
    elseif (is_page())
    {
        $classes[] = sanitize_html_class($post->post_name);
    }
    elseif (is_singular())
    {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
function revcon_change_post_label()
{
    global $menu;
    global $submenu;
    $menu[5][0] = 'Projects';
    $submenu['edit.php'][5][0] = 'Projects';
    $submenu['edit.php'][10][0] = 'Add Project';
    $submenu['edit.php'][16][0] = 'Projects Tags';
    echo '';
}

function revcon_change_post_object()
{
    global $wp_post_types;
    $labels = & $wp_post_types['post']->labels;
    $labels->name = 'Projects';
    $labels->singular_name = 'Projects';
    $labels->add_new = 'Add Project';
    $labels->add_new_item = 'Add Project';
    $labels->edit_item = 'Edit Project';
    $labels->new_item = 'Project';
    $labels->view_item = 'View Project';
    $labels->search_items = 'Search Projects';
    $labels->not_found = 'No Projects found';
    $labels->not_found_in_trash = 'No Projects found in Trash';
    $labels->all_items = 'All Projects';
    $labels->menu_name = 'Projects';
    $labels->name_admin_bar = 'Projects';
}

add_action('admin_menu', 'revcon_change_post_label');
add_action('init', 'revcon_change_post_object');

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function omiotu_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

function b5f_increase_upload($bytes)
{
    return 33554432; // 32 megabytes

}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'omiotu_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'omiotu_styles', 999); // Add Theme Stylesheet

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
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'omiotu_style_remove'); // Remove 'text/css' from enqueued stylesheet

//add_filter( 'upload_size_limit', 'b5f_increase_upload' );

?>