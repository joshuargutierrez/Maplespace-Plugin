<?php

$pages = get_pages();

$page_count = 0;

foreach ($pages as $page) 
{
	$apage = $page->post_name;

	if ( $apage == 'maplespace-wordpress-plugin-oauth' || $apage == 'Maplespace WordPress Plugin OAuth') 
    {
        $page_count++;
    }
}

if($page_count == 0)
{
    $PageGuid = site_url() . "/maplespace-wordpress-plugin-oauth";

    $my_page  = array( 'post_title'  => 'Maplespace WordPress Plugin OAuth',
                    'post_type'      => 'page',
                    'post_name'      => 'maplespace-wordpress-plugin-oauth',
                    'post_content'   => '[maplespace-wordpress-plugin-oauth]',
                    'post_status'    => 'publish',
                    'comment_status' => 'closed',
                    'ping_status'    => 'closed',
                    'post_author'    => 1,
                    'menu_order'     => 0,
                    'guid'           => $PageGuid );

    try
    {
        $PageID = wp_insert_post( $my_page ); 
    }
    catch(Exception $e)
    {
        throw new Exception($e);
    }

    $page_count = 1;

}

function shortcodes_init()
{
    add_shortcode('maplespace-wordpress-plugin-oauth', 'maplespace_wordpress_plugin_redirect_oauth_shortcode_function');

} // end function shortcode_init

add_action('init', 'shortcodes_init');

function maplespace_wordpress_plugin_redirect_oauth_shortcode_function()
{
    update_option('maplespace_wordpress_plugin_google_authentication', $_GET['code']);

    $output = '<form id="maplespace_wordpress_plugin-form" action="'.admin_url('admin.php?page=maplespace-wordpress-plugin').'" method="POST">';

    $output .=  '</form>';
    
    $output .= '<script type="text/javascript">';
    $output .= 'document.getElementById("maplespace_wordpress_plugin-form").submit();';
    $output .= '</script>';

    return $output;

}