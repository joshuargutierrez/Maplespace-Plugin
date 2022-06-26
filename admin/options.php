<?php

defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

if( is_admin())
{
    add_action( 'admin_init', 'maplespace_wordpress_plugin_register_api_settings');
}

/**
 * register options for Enter Google API Key
 */
function maplespace_wordpress_plugin_register_api_settings()
{
    register_setting( 'maplespace_wordpress_plugin_enter_google_apikey_group', 'maplespace_wordpress_plugin_google_apikey' );

    register_setting( 'maplespace_wordpress_plugin_enter_trello_apikey_group', 'maplespace_wordpress_plugin_trello_apikey' );

    register_setting( 'maplespace_wordpress_plugin_enter_trello_secret_group', 'maplespace_wordpress_plugin_trello_secret' );

    register_setting( 'maplespace_wordpress_plugin_enter_email_address_group', 'maplespace_wordpress_plugin_email_address' );
    
    register_setting( 'maplespace_wordpress_plugin_google_authentication_group', 'maplespace_wordpress_plugin_google_authentication' );

    // Add additional API key registers here maplespace_wordpress_plugin_google_authentication

}

add_option( 'maplespace_wordpress_plugin_google_apikey' );

add_option( 'maplespace_wordpress_plugin_trello_apikey' );

add_option( 'maplespace_wordpress_plugin_trello_secret' );

add_option( 'maplespace_wordpress_plugin_email_address' );

add_option( 'maplespace_wordpress_plugin_google_authentication' );


 // Add additional API key options here