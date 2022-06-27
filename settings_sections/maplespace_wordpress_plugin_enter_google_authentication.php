<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( 'NO INDIRECT ACCESS ALLOWED' );

require 'Maplespace_GoogleCalendarAPI.php';

echo ('<h2 class="maplespace_wordpress_plugin-settings-page-section-header" ><b id="maplespace_wordpress_plugin-google">Google</b> <b id="maplespace_wordpress_plugin-google-calendar">Calendar</b> API key</h2>');

if ( get_option( 'maplespace_wordpress_plugin_email_address' ) === '' || get_option( 'maplespace_wordpress_plugin_email_address' ) === null )
    echo '<h3 class="maplespace_wordpress_plugin-warning">Google Calendar Authorization Required!</b></h3>';

$googleapi = new Maplespace_GoogleCalendarAPI();

$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

// update_option('maplespace_wordpress_plugin_google_authentication', null);

// add "?logout" to the URL to remove a token from the session
if (isset($_POST['maplespace_wordpress_plugin_google_authentication_logout'])) 
{
    unset($_SESSION['maplespace_wordpress_plugin_google_authentication_token']);
    update_option('maplespace_wordpress_plugin_google_authentication', null);
    unset($_POST['maplespace_wordpress_plugin_google_authentication_logout']);
}

if (get_option('maplespace_wordpress_plugin_google_authentication') === null ||
    get_option('maplespace_wordpress_plugin_google_authentication') === '' )
{
	$authUrl = $googleapi->$connection->createAuthUrl(); 

    echo '<a href="'.$authUrl.'" 
    type="button"
    class="maplespace_wordpress_plugin-button"
    id="maplespace_wordpress_plugin-button-authenticate"
    target="popup"
    onClick="popup=window.open("'.get_home_url().'/maplespace-wordpress-plugin-oauth", "popup", "width=400,height=800"); 
    return false;" 
    value="Authorize Google API">Authorize Google API</a>';

} 

if (get_option('maplespace_wordpress_plugin_google_authentication') !== null &&
    get_option('maplespace_wordpress_plugin_google_authentication') !== '' )
{
    $token = $googleapi->$connection->fetchAccessTokenWithAuthCode(get_option('maplespace_wordpress_plugin_google_authentication'));

    $_SESSION['maplespace_wordpress_plugin_google_authentication_token'] = $token;

    ?>
    <form method="post" action="#">
        <input type="hidden" name="maplespace_wordpress_plugin_google_authentication_logout" value="logout">
        <input type="submit" value="Logout" class="maplespace_wordpress_plugin-button">
    </form>
    <?php

	header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

print_r($_SESSION); 

$event = array(
    'This is a Summary',
    '1234 Somewhere evermore',
    'This is a description',
    array(
        'dateTime' => '2023-05-28T09:00:00-07:00',
        'timeZone' => 'America/Denver',
    ),
    array(
        'dateTime' => '2023-05-29T09:00:00-07:00',
        'timeZone' => 'America/Denver',
    )
);

$googleapi->addEvent('primary', $event);

