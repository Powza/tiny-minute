<?php
/**
 * tinyminute enqueue scripts
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Disable jQuery Migrate in WordPress.
 *
 * @author Guy Dumais.
 * @link https://en.guydumais.digital/disable-jquery-migrate-in-wordpress/
 */
add_filter( 'wp_default_scripts', $af = static function( &$scripts) {
    if(!is_admin()) {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
    }    
}, PHP_INT_MAX );
unset( $af );

/* New jQuery */
add_action('init', 'use_jquery_from_google');
function use_jquery_from_google () {
	if (is_admin()) {
		return;
	}

	global $wp_scripts;
	if (isset($wp_scripts->registered['jquery']->ver)) {
		$ver = $wp_scripts->registered['jquery']->ver;
	} else {
		$ver = '1.12.4';
	}

	wp_deregister_script('jquery');
	wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js", false, '3.3.1');
}

if ( ! function_exists( 'tinyminute_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function tinyminute_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		wp_enqueue_style( 'google-font-fira-sans', 'https://fonts.googleapis.com/css?family=Fira+Sans:400,700&display=swap', array(), '1.0' );
		wp_enqueue_style( 'bootstrap-4-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), '4.3.1' );
		//wp_enqueue_style( 'fontawesome-5-css', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css', array(), '5.8.1' );
		wp_enqueue_style( 'tinyminute-styles', get_stylesheet_directory_uri() . '/assets/css/frontend.tinyminute.min.css', array(), $theme_version . '.' . filemtime(get_template_directory() . '/assets/css/frontend.tinyminute.min.css') );

        // FontAwesome
        wp_register_script( 'fontawesome-js','https://kit.fontawesome.com/5b65948043.js', array(), '1.0' );
        wp_enqueue_script( 'fontawesome-js' );
        
        // Bootstrap Seperate
	    //wp_register_script( 'popper-js','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array( 'jquery' ), '1.14.7', true );
	    //wp_enqueue_script( 'popper-js' );
	    //wp_register_script( 'bootstrap-4-js','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
        //wp_enqueue_script( 'bootstrap-4-js' );
        
        // Bootstrap Bundle
        //wp_register_script( 'bootstrap-4-js','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.3.1', true );
        //wp_enqueue_script( 'bootstrap-4-js' );

	    wp_register_script( 'tinyminute-plugins', get_template_directory_uri() . '/assets/js/frontend.plugins.min.js', array(), $theme_version . '.' . filemtime(get_template_directory() . '/assets/js/frontend.plugins.min.js'), true );
	    wp_enqueue_script( 'tinyminute-plugins' );

		wp_register_script( 'tinyminute-scripts', get_template_directory_uri() . '/assets/js/frontend.tinyminute.min.js', array(), $theme_version . '.' . filemtime(get_template_directory() . '/assets/js/frontend.tinyminute.min.js'), true );
		wp_enqueue_script( 'tinyminute-scripts' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'tinyminute_scripts' ).

add_action( 'wp_enqueue_scripts', 'tinyminute_scripts' );


/* Add favicons */
function add_favicon() {
?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Tiny Minute">
    <meta name="application-name" content="Tiny Minute">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
<?php
}
 
add_action('wp_head', 'add_favicon', 1);

/* Add Google Tag Manager */
function add_google_tag_manager() {
?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WPPW5ZR');</script>
	<!-- End Google Tag Manager -->
<?php
}
 
add_action('wp_head', 'add_google_tag_manager', 1);

function add_google_tag_manager_body(){
?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WPPW5ZR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php 
}
add_action( 'body_top', 'add_google_tag_manager_body' );