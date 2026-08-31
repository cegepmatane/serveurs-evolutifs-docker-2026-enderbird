<?php
/**
 * Thème enfant Cornucopia : charge la feuille de style du thème enfant
 * (les thèmes blocs ne chargent pas style.css automatiquement).
 */
function cornucopiaChargerStyle() {
    wp_enqueue_style(
        'cornucopia-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'cornucopiaChargerStyle' );
