<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( 'NO INDIRECT ACCESS ALLOWED' );

echo ('<h2 class="maplespace_wordpress_plugin-settings-page-section-header"> <b id="maplespace_wordpress_plugin-trello">Trello</b> OAuth Secret</h2>');

if ( get_option( 'maplespace_wordpress_plugin_trello_apikey' ) === '' || get_option( 'maplespace_wordpress_plugin_trello_secret' ) === null )
    echo '<h3 class="maplespace_wordpress_plugin-warning">No Trello OAuth Secret Selected</b></h3>';

else echo '<h4 class="maplespace_wordpress_plugin-settings-page-section-subheader"> <i class="maplespace_wordpress_plugin-settings-page-section-trello-secret">'. get_option('maplespace_wordpress_plugin_trello_secret') .'</i> </h4>';

echo '<form method="POST" action="options.php" class="maplespace_wordpress_plugin_form">';

    settings_fields('maplespace_wordpress_plugin_enter_trello_secret_group');

        echo '<label for="maplespace_wordpress_plugin_trello_secret"  class="maplespace_wordpress_plugin-new-apikey-label" >Enter Trello OAuth Secret </label>';

        echo '<input type="text" id="maplespace_wordpress_plugin_trello_secret" name="maplespace_wordpress_plugin_trello_secret"></input></br>';

    do_settings_sections( 'maplespace_wordpress_plugin_enter_trello_secret_group' );

    submit_button('Update Trello Secret', 'maplespace_wordpress_plugin-button', 'maplespace_wordpress_plugin-button', false);

echo '</form>';