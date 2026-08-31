<?php
/**
 * Thème Cornucopia Parallax : réglages et chargement des ressources.
 */

function cornucopiaParallaxPreparerTheme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'cornucopiaParallaxPreparerTheme' );

function cornucopiaParallaxChargerRessources() {
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style( 'cornucopia-parallax-style', get_stylesheet_uri(), array(), $version );
    wp_enqueue_script(
        'cornucopia-parallax-scene',
        get_template_directory_uri() . '/js/scene-prairie.js',
        array(),
        $version,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'cornucopiaParallaxChargerRessources' );

/**
 * L'extrait se termine par une petite feuille plutôt que par [...].
 */
function cornucopiaParallaxSuiteExtrait( $suite ) {
    return ' &hellip;';
}
add_filter( 'excerpt_more', 'cornucopiaParallaxSuiteExtrait' );
