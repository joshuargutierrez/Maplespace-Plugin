<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

// registration hooks
register_activation_hook(__FILE__, 'maplespace_wordpress_plugin_activate');

register_deactivation_hook( __FILE__, 'maplespace_wordpress_plugin_deactivate' );

register_uninstall_hook(__FILE__, 'maplespace_wordpress_plugin_uninstall');

function maplespace_wordpress_plugin_activate(){


} // end function

function maplespace_wordpress_plugin_deactivate() {


} // end function

function maplespace_wordpress_plugin_uninstall (){


} // end function

