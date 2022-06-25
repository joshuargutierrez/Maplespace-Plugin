<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

add_action( 'admin_menu', 'maplespace_register_admin_menu', 9);

function maplespace_register_admin_menu() 
{
    add_menu_page( 
        'Maplespace WordPress Plugin', // Page Title
        'MapleSpace',                  // Menu Title
        'manage_options',              // menu capability
        'plugin-with-admin-menu',      // menu slug
        'settings_page_content',       // function to call
        'dashicons-schedule',          // icon for plugin
         21                            // dashboard position
    ); // end add_menu_page
    
} // end function register_admin_menu

function settings_page_content()
{
    echo '<div class="wrap" id="maplespace_wordpress_plugin-page">'; 
        if( get_option( 'maplespace_wordpress_plugin_google_apikey' ) === '' 
            || get_option( 'maplespace_wordpress_plugin_trello_apikey' ) === '' 
            || get_option( 'maplespace_wordpress_plugin_email_address' ) === '')
        {
            // Description Section
            echo '<div class="maplespace_wordpress_plugin-settings-page-section" title="Enter your OTHERAPI API Key." >'; // START Admin section

            include 'maplespace_wordpress_plugin_description.php';

            echo '</div>'; 
            // END Description Section
        }

        // Email Address  Section
        echo '<div class="maplespace_wordpress_plugin-settings-page-section" title="Enter your OTHERAPI API Key." >'; // START Admin section

        include 'maplespace_wordpress_plugin_enter_email_address.php';

        echo '</div>'; 
        // END Email Address Section
        
        // Google API Section
        echo '<div class="maplespace_wordpress_plugin-settings-page-section" title="Enter your Google API Key." >'; // START Admin section

        include 'maplespace_wordpress_plugin_enter_google_apikey.php';

        echo '</div>'; 
        // END Google API Section

        // Trello API Section
        echo '<div class="maplespace_wordpress_plugin-settings-page-section" title="Enter your Google API Key." >'; // START Admin section

        include 'maplespace_wordpress_plugin_enter_trello_apikey.php';

        echo '</div>'; 
        // END Trello API Section
        
    echo '</div>';

} // end function settings_menu_page_content



