<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

//Add custom css for admin sections
add_action( 'admin_enqueue_scripts', 'maplespace_wordpress_plugin_add_stylesheet_to_admin' );

//Add custom JS for admin sections
add_action( 'admin_menu', 'maplespace_wordpress_plugin_add_js_to_admin' );

//add stylesheet
function maplespace_wordpress_plugin_add_stylesheet_to_admin() 
{
    wp_register_style( 'maplespace_wordpress_plugin_styles', plugins_url('../assets/css/maplespace_wordpress_plugin_styles.css', __FILE__) );

    wp_enqueue_style( 'maplespace_wordpress_plugin_styles');
}

// Add JavaScript
function maplespace_wordpress_plugin_add_js_to_admin( $hook ) 
{
    wp_register_script( 'maplespace_wordpress_plugin_GoogleCalendarAPIAuthentication', plugins_url( '../assets/js/maplespace_wordpress_plugin_GoogleCalendarAPIAuthentication.js', __FILE__ ), array( 'jquery' ));

    wp_enqueue_script( 'maplespace_wordpress_plugin_GoogleCalendarAPIAuthentication' );

    wp_register_script( 'maplespace_wordpress_plugin_TrelloAPIAuthentication', plugins_url( '../assets/js/maplespace_wordpress_plugin_TrelloAPIAuthentication.js', __FILE__ ), array( 'jquery' ));

    wp_enqueue_script( 'maplespace_wordpress_plugin_TrelloAPIAuthentication' );

    wp_register_script( 'api', 'https://apis.google.com/js/api.js', array( 'jquery' ));

    wp_enqueue_script( 'api' );

    wp_register_script( 'client', 'https://accounts.google.com/gsi/client', array( 'jquery' ));

    wp_enqueue_script( 'client' );
}

//     <script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
// <script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>