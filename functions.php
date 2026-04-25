<?php
/**
 * DNZ Express functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Theme Setup
 */
function dnz_express_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Register Menus
    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary Menu', 'dnz-express' ),
            'footer' => esc_html__( 'Footer Menu', 'dnz-express' ),
        )
    );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for Custom Logo.
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 80,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action( 'after_setup_theme', 'dnz_express_setup' );

/**
 * Enqueue scripts and styles.
 */
function dnz_express_scripts() {
    // Google Fonts (Inter)
    wp_enqueue_style( 'dnz-express-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap', array(), null );
    
    // Font Awesome for icons
    wp_enqueue_style( 'dnz-express-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

    // Main Style
    wp_enqueue_style( 'dnz-express-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

    // GSAP
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true );
    wp_enqueue_script( 'gsap-scroll', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), '3.12.2', true );

    // Vanilla Tilt
    wp_enqueue_script( 'vanilla-tilt', 'https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js', array(), '1.8.0', true );

    // Three.js
    wp_enqueue_script( 'three-js', 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js', array(), '134', true );
    wp_enqueue_script( 'dnz-3d-sim', get_template_directory_uri() . '/assets/js/3d-simulation.js', array('three-js'), wp_get_theme()->get( 'Version' ), true );

    // Custom JS
    wp_enqueue_script( 'dnz-express-scripts', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery', 'gsap', 'vanilla-tilt' ), wp_get_theme()->get( 'Version' ), true );

    // Localize Script for AJAX
    wp_localize_script( 'dnz-express-scripts', 'dnz_ajax', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ) );
}
add_action( 'wp_enqueue_scripts', 'dnz_express_scripts' );

/**
 * Customizer Additions
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Form Handlers (AJAX)
 */
require get_template_directory() . '/inc/form-handlers.php';

/**
 * Output Custom CSS based on Customizer Settings
 */
function dnz_express_custom_css() {
    $primary_color = get_theme_mod( 'dnz_primary_color', '#FF6B00' );
    $primary_hover = get_theme_mod( 'dnz_primary_hover', '#FF8C00' );
    
    $custom_css = "
        :root {
            --primary-color: {$primary_color};
            --primary-hover: {$primary_hover};
        }
    ";
    wp_add_inline_style( 'dnz-express-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'dnz_express_custom_css' );
