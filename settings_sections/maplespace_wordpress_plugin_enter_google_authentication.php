<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( 'NO INDIRECT ACCESS ALLOWED' );

echo ('<h2 class="maplespace_wordpress_plugin-settings-page-section-header" ><b id="maplespace_wordpress_plugin-google">Google</b> <b id="maplespace_wordpress_plugin-google-calendar">Calendar</b> Authentication</h2>');

if ( get_option( 'maplespace_wordpress_plugin_google_authentication' ) !== 'true' )
    echo '<h3 class="maplespace_wordpress_plugin-warning">Google Authentication Required.</b></h3>';

//Add buttons to initiate auth sequence and sign out-->
echo '<button id="authorize_button" onclick="handleAuthClick()" class="maplespace_wordpress_plugin-button">Authorize</button>';

echo '<button id="signout_button" onclick="handleSignoutClick()" class="maplespace_wordpress_plugin-button">Sign Out</button>';

echo '<pre type="button" id="content" style="white-space: pre-wrap;"></pre>';

echo '<script type="text/javascript">';

    echo 'document.getElementById("signout_button").style.visibility = "hidden";';

echo '</script>';
