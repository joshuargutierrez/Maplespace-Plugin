<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( 'NO INDIRECT ACCESS ALLOWED' );

echo ('<h2 class="maplespace_wordpress_plugin-settings-page-section-header" >Trello API key</h2>');

if ( get_option( 'maplespace_wordpress_plugin_trello_apikey' ) === '' || get_option( 'maplespace_wordpress_plugin_trello_apikey' ) === null )
    echo '<h3 class="maplespace_wordpress_plugin-warning">No API key selected</b></h3>';

else echo '<h4 class="maplespace_wordpress_plugin-settings-page-section-subheader">'. get_option('maplespace_wordpress_plugin_trello_apikey') .' </h4>';

echo '<form method="POST" action="options.php" class="maplespace_wordpress_plugin_form">';

    settings_fields('maplespace_wordpress_plugin_enter_trello_apikey_group');

        echo '<input type="text" id="maplespace_wordpress_plugin_trello_apikey" name="maplespace_wordpress_plugin_trello_apikey"></input></br>';

    do_settings_sections( 'maplespace_wordpress_plugin_enter_trello_apikey_group' );

    submit_button('Update Trello API Key', 'maplespace_wordpress_plugin-button', 'maplespace_wordpress_plugin-button', false);

echo '</form>';