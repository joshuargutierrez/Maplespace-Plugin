<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

// registration hooks
register_activation_hook(__FILE__, 'maplespace_wordpress_plugin_activate');

register_deactivation_hook( __FILE__, 'maplespace_wordpress_plugin_deactivate' );

register_uninstall_hook(__FILE__, 'maplespace_wordpress_plugin_uninstall');

function maplespace_wordpress_plugin_activate()
{
    
    

} // end function

function maplespace_wordpress_plugin_deactivate() 
{
    $timestamp = wp_next_scheduled ('maplespace_wordpress_plugin_cronjob');
 
    wp_unschedule_event ($timestamp, 'maplespace_wordpress_plugin_cronjob');

} // end function

function maplespace_wordpress_plugin_uninstall ()
{


} // end function

