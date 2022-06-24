<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

if( !wp_next_scheduled( 'maplespace_wordpress_plugin_cron' ) ) 
{  
    wp_schedule_event( time(), 'hourly', 'maplespace_wordpress_plugin_cron' );  

} //END if

add_action ('maplespace_wordpress_plugin_cron', 'maplespace_wordpress_plugin_cron_function');

function maplespace_wordpress_plugin_cron_function() 
{
    $to = 'joshg@joshuarg.net';
    $subject = 'Maplespace WordPress plugin cron job activated: ' . date(DATE_RFC2822);
    $from = 'donotreply@MapleSpaceWordPressPlugin.com';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from. "\r\n" .'X-Mailer: PHP/' . phpversion();
    //Lead data
    $message = "Cron Job Successful";
    
    mail($to, $subject, $message, $headers);

}  // END function

function cron_add_minute( $schedules ) 
{
    // Adds once every minute to the existing schedules.
    $schedules['everyminute'] = array(
        'interval' => 60,
        'display' => __( 'Once Every Minute' )
    );
    return $schedules;
}

add_filter( 'cron_schedules', 'cron_add_minute' );
