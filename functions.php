<?php

if (!function_exists("tenbest_support")) :
    function tenbest_support()
    {

        // Adding support for core block visual styles.
        add_theme_support("wp-block-styles");

        // Enqueue editor styles.
        add_editor_style("style.css");
    }
    add_action("after_setup_theme", "tenbest_support");
endif;

// Enqueue scripts and styles.
function tenbest_scripts()
{
    // Enqueue theme stylesheet.
    wp_enqueue_style("tenbest-style", get_template_directory_uri() . "/style.css", array(), wp_get_theme()->get("Version"));
}

// // Prevent WP from adding <p> tags on all post types
// function disable_wpautop($content)
// {
//     remove_filter("the_content", "wpautop");
//     remove_filter("the_excerpt", "wpautop");
//     return $content;
// }

// add_filter("the_content", "disable_wpautop", 0);

add_action("wp_enqueue_scripts", "tenbest_scripts");