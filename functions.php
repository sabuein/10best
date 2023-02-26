<?php
if (!function_exists("tenbest_setup")) :
    function tenbest_setup() {
        // Add support for block styles
        add_theme_support("wp-block-styles");
        // Enqueue editor styles
        add_editor_style("editor-style.css");
        // Essential
        load_theme_textdomain("tenbesttheme", get_template_directory()."/languages");
        
        add_theme_support("post-formats",  array("aside", "gallery", "quote", "image", "video"));
        // The following theme supports are enabled automatically
        add_theme_support("post-thumbnails");
        add_theme_support("responsive-embeds");
        add_theme_support("editor-styles");
        add_theme_support("html5", array("style", "script"));
        add_theme_support("automatic-feed-links");
        // can be inserted into a theme using wp_nav_menu();
        register_nav_menus(array(
            "primary"   => __("Primary Menu", "tenbesttheme"),
            "secondary" => __("Secondary Menu", "tenbesttheme")
        ));
        if (!isset($content_width)) {
            $content_width = 800;
        }
    }
endif;
add_action("after_setup_theme", "tenbest_setup");

// Enqueue the script or style using wp_enqueue_script(), wp_enqueue_style(), or wp_enqueue_block_style.
wp_enqueue_style("style", get_stylesheet_uri());
wp_enqueue_style($handle, $src, $deps, $ver, $media);
wp_enqueue_style("all", get_template_directory_uri()."/css/all.css", false, "1.1", "all");

/* wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer); */
wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), 1.1, true);

function myfirsttheme_setup() {
	/*
	 * Load additional block styles.
	 */
	$styled_blocks = ['latest-comments'];
	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "myfirsttheme-$block_name",
			'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.css" ),
			$args['path'] = get_theme_file_path( "assets/css/blocks/$block_name.css" ),
		);
		wp_enqueue_block_style( "core/$block_name", $args );
	}
}
function add_theme_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css', array(), '1.1', 'all' );

	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), 1.1, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );