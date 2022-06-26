<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( 'NO INDIRECT ACCESS ALLOWED' );

echo ('<h2 class="maplespace_wordpress_plugin-settings-page-section-header"> <b id="maplespace_wordpress_plugin-description">Maplespace WordPress plugin</b></h2>');

echo '<h4 class="maplespace_wordpress_plugin-settings-page-section-subheader"> Please be sure to do the folowing to ensure that this plugin works properly:</h4>';

echo '<ol id="maplespace_wordpress_plugin-instructions">';

    if( get_option( 'maplespace_wordpress_plugin_email_address' ) === '' )
        echo '<li class="maplespace_wordpress_plugin-instructions-item">Enter your email address to receive email notifications.</li>';

    if( get_option( 'maplespace_wordpress_plugin_google_apikey' ) === '' )
        echo '<li class="maplespace_wordpress_plugin-instructions-item">Enter your Google Calendar API key.</li>';

    if( get_option( 'maplespace_wordpress_plugin_trello_apikey' ) === '' )
        echo '<li class="maplespace_wordpress_plugin-instructions-item">Enter your Trello API key.</li>';

    if( get_option( 'maplespace_wordpress_plugin_trello_secret' ) === '' )
        echo '<li class="maplespace_wordpress_plugin-instructions-item">Enter your Trello OAuth Secret.</li>';

echo '</ol>';

/**
 * get_option( 'maplespace_wordpress_plugin_google_apikey' ) === '' 
 *           || get_option( 'maplespace_wordpress_plugin_trello_apikey' ) === '' 
 *           || get_option( 'maplespace_wordpress_plugin_email_address' ) === '')
 */
