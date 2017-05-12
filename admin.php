<?php
/**
 * Pagina ADM do Plugin 
 */
function my_admin_menu() {
	add_menu_page( 'Apolar Countdown', 'Apolar Countdown', 'manage_options', basename(__DIR__) . "/admin.php", 'countdown_admin', 'dashicons-backup', 6  );
}

add_action( 'admin_menu', 'my_admin_menu' );

function countdown_admin() {
	require_once dirname(__FILE__) . DS . "templates/admin_page.php";
}

function load_admin_countdown_assets() {
	wp_register_script( 'countdownlib', PLUGIN_COUNTDOWN_URL . "assets/js/countdown.js");
    wp_enqueue_script( 'countdownlib' );

    wp_register_script( 'countdownbase', PLUGIN_COUNTDOWN_URL . "assets/js/base.js");
    wp_enqueue_script( 'countdownbase' );

    wp_register_style( 'countdowncss', PLUGIN_COUNTDOWN_URL . "assets/css/countdown.css");
    wp_enqueue_style( 'countdowncss' );

    wp_register_style( 'countdownadmincss', PLUGIN_COUNTDOWN_URL . "assets/css/admin.css");
    wp_enqueue_style( 'countdownadmincss' );
}
add_action( 'admin_enqueue_scripts', 'load_admin_countdown_assets' );