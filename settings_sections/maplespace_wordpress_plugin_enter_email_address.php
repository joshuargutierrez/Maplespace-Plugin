<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( 'NO INDIRECT ACCESS ALLOWED' );

echo ('<h2 class="maplespace_wordpress_plugin-settings-page-section-header"> <b id="maplespace_wordpress_plugin-email-address">Admin Email Address</b></h2>');

if ( get_option( 'maplespace_wordpress_plugin_email_address' ) === '' || get_option( 'maplespace_wordpress_plugin_email_address' ) === null )
    echo '<h3 class="maplespace_wordpress_plugin-warning">Email Address Required</b></h3>';

else echo '<h4 class="maplespace_wordpress_plugin-settings-page-section-subheader"> <i class="maplespace_wordpress_plugin-settings-page-section-apikey">'. get_option('maplespace_wordpress_plugin_email_address') .'</i> </h4>';

echo '<form method="POST" action="options.php" class="maplespace_wordpress_plugin_form">';

    settings_fields('maplespace_wordpress_plugin_enter_email_address_group');

        echo '<label for="maplespace_wordpress_plugin_google_apikey" value="Enter New API Key: " class="maplespace_wordpress_plugin-new-apikey-label">Enter New API Key: </label>';

        echo '<input type="email" id="maplespace_wordpress_plugin_email_address" name="maplespace_wordpress_plugin_email_address"></input></br>';

    do_settings_sections( 'maplespace_wordpress_plugin_enter_email_address_group' );

    submit_button('Update Email Address', 'maplespace_wordpress_plugin-button', 'maplespace_wordpress_plugin-button', false);

echo '</form>';