<?php
if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	
	// enqueue child styles
	wp_enqueue_style('child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-style'));
});

// Ajout du lien Admin si l'utilisateur est connecté
add_filter( 'wp_nav_menu_items','add_admin_link', 10, 2 );

function add_admin_link( $items, $args ) {
    if (is_user_logged_in() && $args->menu == 2) {

        $items .= '<li><a href="'. get_admin_url() .'" class="ct-menu-link">Admin</a></li>';

    }
    return $items;

}
