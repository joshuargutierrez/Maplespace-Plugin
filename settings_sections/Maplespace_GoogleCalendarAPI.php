<?php
/* Copyright (C) 2022  JoshuaRG*/
defined( 'ABSPATH' ) or die( 'NO INDIRECT ACCESS ALLOWED' );

use Google\Client;
use Google\Service\Calendar;

class Maplespace_GoogleCalendarAPI
{    
    public $connection;

    function __construct()
    {

        try
        {
            $this->$connection = $this->authenticateClient();
        }
        catch(Exception $e)
        {
            throw new GoogleCalendarAPIException($e);
        }
        
    }

    /**
     * Adds a calendar event using Google Calendar API
     * @params array {
     *  0 : Summary,
     *  1 : location
     *  2 : description
     *  3 : array{
     *    0 : timestamp (Start Time)
     *    1 : geographic location
     *  }
     *  4 : array{
     *    0 : timestamp (End Time)
     *    1 : geographic location
     *  }
     * }
     */
    function addEvent( $params, $calendarId )
    {
        $event = new Google_Service_Calendar_Event(array(
            'summary' => $params[0],
            'location' => $params[1],
            'description' => $params[2],
            'start' => $params[3], // array containing datetime and timezone
            // 'start' => array(
            //   'dateTime' => '2015-05-28T09:00:00-07:00',
            //   'timeZone' => 'America/Los_Angeles',
            // ),
            'end' => $params[4], // array containing datetime and timezone
            // 'end' => array(
            //   'dateTime' => '2015-05-28T17:00:00-07:00',
            //   'timeZone' => 'America/Los_Angeles',
            // ),
        ));
        
        if($calendarId == null) $calendarId = 'primary';

        try
        {
            $this->$connection->setAccessToken(get_option('maplespace_wordpress_plugin_google_authentication_token'));
            
            // Check to see if there was an error.
            if (array_key_exists('error', get_option('maplespace_wordpress_plugin_google_authentication_token'))) {
                throw new Exception(join(', ', get_option('maplespace_wordpress_plugin_google_authentication_token')));
            }

            $service = new Calendar($this->$connection);

            $event = $service->events->insert($calendarId, $event);

            
        }
        catch(Exception $e)
        {
            throw new GoogleCalendarAPIException($e);
        }
          

    }

    /**
     * Returns an authorized API client.
     * @return Client the authorized client object
     */
    function authenticateClient()
    {
        $client = new Google\Client();

        $client->setAuthConfig( plugin_dir_path( __DIR__ ) . '/settings_sections/client_credentials.json' );

        $client->addScope('https://www.googleapis.com/auth/calendar');

        return $client;
    }
}



class GoogleCalendarAPIException extends Exception
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