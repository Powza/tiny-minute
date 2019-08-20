<?php
/**
 * Theme basic setup.
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'tinyminute_setup' );

if ( ! function_exists ( 'tinyminute_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tinyminute_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => 'Primary Menu',
			'social' => 'Social Menu',
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Adding Excerpts to Pages
		add_post_type_support( 'page', 'excerpt' );

		/*
		 * Adding Custom Headers support
		 */
		add_theme_support( 'post-thumbnails' );

        /*
         * Adding Thumbnail basic support
         */
        add_theme_support( 'custom-header' );

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'tinyminute_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

	}
}


/* Adds preview thumbnail to admin post/page columns */
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
 
function posts_columns($defaults){
    $defaults['preview-thumb'] = 'Preview';
    return $defaults;
}
 
function posts_custom_columns($column_name, $id){
    if($column_name === 'preview-thumb'){
        echo the_post_thumbnail( array(50,50) );
    }
}

add_filter('manage_pages_columns', 'pages_columns', 5);
add_action('manage_pages_custom_column', 'pages_custom_columns', 5, 2);
 
function pages_columns($defaults){
    $defaults['preview-thumb'] = 'Preview';
    return $defaults;
}
 
function pages_custom_columns($column_name, $id){
    if($column_name === 'preview-thumb'){
        echo the_post_thumbnail( array(50,50) );
    }
}

/* Adds preview thumbnail CSS admin post/page columns */
add_action('admin_head', 'my_column_width');

function my_column_width() {
    echo '<style type="text/css">';
    //echo '.wp-list-table .column-title { width:30%; }';
    echo '.wp-list-table .column-preview-thumb { width:60px; }';
    echo '</style>';
}


/* Removes ... from excerpt */
add_filter( 'excerpt_more', 'tinyminute_custom_excerpt_more' );

if ( ! function_exists( 'tinyminute_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function tinyminute_custom_excerpt_more( $more ) {
		return '';
	}
}

/* Stop editor from removing code when switching views */
function allow_all_tinymce_elements_attributes( $init ) {

    // Allow all elements and all attributes
    $ext = '*[*]';

    // Add to extended_valid_elements if it already exists
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }

    // return value
    return $init;
}
add_filter('tiny_mce_before_init', 'allow_all_tinymce_elements_attributes');

/* Add stylesheet to editor */
add_action( 'admin_init', 'register_editor_stylesheet' );
function register_editor_stylesheet() {
    add_editor_style( 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
    add_editor_style( 'assets/css/frontend.tinyminute.min.css' );
}

/* Add stylesheet to editor gutenberg */
add_action( 'enqueue_block_editor_assets', 'tinyminute_gutenberg_styles' );
function tinyminute_gutenberg_styles() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'editor-styles-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', false, '@@pkg.version', 'all' );
	wp_enqueue_style( 'editor-styles-tinyminute', get_theme_file_uri( '/assets/css/frontend.tinyminute.min.css' ), false, '@@pkg.version', 'all' );
}

/* Admin Gutenberg Fullwidth */
add_action('admin_head', 'editor_full_width_gutenberg');
function editor_full_width_gutenberg() {
  echo '<style>
    body.gutenberg-editor-page .editor-post-title__block, body.gutenberg-editor-page .editor-default-block-appender, body.gutenberg-editor-page .editor-block-list__block {
		max-width: none !important;
	}
	body.gutenberg-editor-page .edit-post-text-editor {
		padding-left: 43px;
    	padding-right: 43px;
	}
  </style>';
}


/**
 * Replaces the default excerpt editor with TinyMCE.
 */
class T5_Richtext_Excerpt
{
    /**
     * Replaces the meta boxes.
     *
     * @return void
     */
    public static function switch_boxes()
    {
        if ( ! post_type_supports( $GLOBALS['post']->post_type, 'excerpt' ) )
        {
            return;
        }

        remove_meta_box(
            'postexcerpt' // ID
        ,   ''            // Screen, empty to support all post types
        ,   'normal'      // Context
        );

        add_meta_box(
            'postexcerpt2'     // Reusing just 'postexcerpt' doesn't work.
        ,   'Excerpt'          // Title
        ,   array ( __CLASS__, 'show' ) // Display function
        ,   null              // Screen, we use all screens with meta boxes.
        ,   'normal'          // Context
        ,   'core'            // Priority
        );
    }

    /**
     * Output for the meta box.
     *
     * @param  object $post
     * @return void
     */
    public static function show( $post )
    {
    ?>
        <label class="screen-reader-text" for="excerpt"><?php
        'Excerpt'
        ?></label>
        <?php
        // We use the default name, 'excerpt', so we don’t have to care about
        // saving, other filters etc.
        wp_editor(
            self::unescape( $post->post_excerpt ),
            'excerpt',
            array (
            'textarea_rows' => 15
        ,   'media_buttons' => FALSE
        ,   'teeny'         => TRUE
        ,   'tinymce'       => TRUE
            )
        );
    }

    /**
     * The excerpt is escaped usually. This breaks the HTML editor.
     *
     * @param  string $str
     * @return string
     */
    public static function unescape( $str )
    {
        return str_replace(
            array ( '&lt;', '&gt;', '&quot;', '&amp;', '&nbsp;', '&amp;nbsp;' )
        ,   array ( '<',    '>',    '"',      '&',     ' ', ' ' )
        ,   $str
        );
    }
}




function namespace_add_custom_types( $query ) {
    if( (is_category() || is_tag()) && $query->is_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
        $query->set( 'post_type', array(
            'post', 'portfolio_post_type'
        ));
    }
    return $query;
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );