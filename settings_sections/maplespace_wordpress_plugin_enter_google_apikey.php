<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( 'NO INDIRECT ACCESS ALLOWED' );

echo ('<h2 class="maplespace_wordpress_plugin-settings-page-section-header" ><b id="maplespace_wordpress_plugin-google">Google</b> <b id="maplespace_wordpress_plugin-google-calendar">Calendar</b> API key</h2>');

if ( get_option( 'maplespace_wordpress_plugin_google_apikey' ) === '' || get_option( 'maplespace_wordpress_plugin_google_apikey' ) === null )
    echo '<h3 class="maplespace_wordpress_plugin-warning">No API key selected</b></h3>';

else if(is_admin()) 
{

    echo '<h4 class="maplespace_wordpress_plugin-settings-page-section-subheader"> <i class="maplespace_wordpress_plugin-settings-page-section-apikey">'. get_option('maplespace_wordpress_plugin_google_apikey') .'</i> </h4>';

}

echo '<form method="POST" action="options.php" class="maplespace_wordpress_plugin_form">';

    settings_fields('maplespace_wordpress_plugin_enter_google_apikey_group');

        echo '<label for="maplespace_wordpress_plugin_google_apikey" value="Enter New API Key: "  class="maplespace_wordpress_plugin-new-apikey-label">Enter New API Key: </label>';

        echo '<input type="text" id="maplespace_wordpress_plugin_google_apikey" name="maplespace_wordpress_plugin_google_apikey"></input></br>';

    do_settings_sections( 'maplespace_wordpress_plugin_enter_google_apikey_group' );

    submit_button('Update Google API Key', 'maplespace_wordpress_plugin-button', 'maplespace_wordpress_plugin-button', false);

echo '</form>';
