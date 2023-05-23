<?php
/*
Plugin Name: Tracciamento Azioni utente
Plugin URI: https://eticasa.io
Description: Track user actions
Version: 0.0.1
Author: Eticasa
Author URI: https://eticasa.io
*/

function enqueue_my_script() {
    wp_enqueue_script( 'trackuser', plugins_url( '/scripts.js', __FILE__ ), array( 'jquery' ), '1.0', true );
    wp_localize_script( 'trackuser', 'TrackUser', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
}
add_action( 'wp_enqueue_scripts', 'enqueue_my_script' );

function handle_ajax_request() {
    global $wpdb;

    $user_id = get_current_user_id();
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $page_url = $_POST['page_url'];

    $table_name = $wpdb->prefix . 'user_actions'; 

    $wpdb->insert(
        $table_name,
        array(
            'user_id' => $user_id,
            'ip_address' => $ip_address,
            'page_url' => $page_url,
            'click_time' => current_time( 'mysql' )
        )
    );

    wp_die();
}
add_action( 'wp_ajax_track_click', 'handle_ajax_request' );
add_action( 'wp_ajax_nopriv_track_click', 'handle_ajax_request' );
