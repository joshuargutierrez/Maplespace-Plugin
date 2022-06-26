<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( 'NO INDIRECT ACCESS ALLOWED' );

class TrelloAPI
{
    private $api_key;

    private $oauth_secret;

    private $oauth_token;


    function __construct()
    {
        $requestURL = "https://trello.com/1/OAuthGetRequestToken";
        $redirect_uri = plugin_dir_url( __FILE__ ).'/api_integrations/oauth2callback';
        this->$api_key = get_option('maplespace_wordpress_plugin_trello_apikey');
        this->$oauth_secret = get_option('maplespace_wordpress_plugin_trello_secret');
        
        $url = $requestURL . 

        $args = array(
            'sslverify' => false,
            'body' => $curl_post,
        );

        $result = wp_remote_post($url, $args);

        $accessURL = "https://trello.com/1/OAuthGetAccessToken";
        $authorizeURL = "https://trello.com/1/OAuthAuthorizeToken";
        $appName = "Maplespace WordPress plugin";
        $scope = 'read';
        $expiration = '1hour';

    }

}

class TrelloAPIException extends Exception
{
    protected $data;

    public function __construct($message, $code = 0, $data = NULL) 
    {
        parent::__construct($message, $code);

        $this->data = $data;

    } // end function

    public function getData() 
    {
        return $this->data;

    } // end function

}