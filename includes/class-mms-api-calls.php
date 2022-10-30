<?php

class MMS_API {

  private $api_url ;

  public function __construct()
      {
          $this->api_url = 'http://placeholderworld.com/websites/2/wp-json/wp/v2/';
      }



    /**
     * Get Tutorials Data From API
     */
    private function mms_get_tutorial_data_api() {

        // http request to the api to fetch a list of all the pages data
        $response = wp_remote_get(
              $this->api_url . 'pages/'
        );

        // decode the JSON response to retrieve the list of pages data
        $api_response = json_decode( wp_remote_retrieve_body( $response ), false );

        return $api_response;
    }



    /* -------------------------------------------------
     * Public functions
     * ------------------------------------------------- */

     public function mms_get_tutorial_data() {

       $pages_response = $this->mms_get_tutorial_data_api();

       return $pages_response;
     }

}
