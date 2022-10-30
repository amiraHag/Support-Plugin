<?php

class MMS_Admin
{

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    public function enqueue_styles()
    {

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mms-admin.css', array(), $this->version, 'all' );

    }


    public function enqueue_scripts()
    {

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mms-admin.js', array( 'jquery' ), $this->version, false );

    }


    public function mms_plugin_menu()
    {
        add_menu_page('Mamma Support', 'Mamma Support', 'manage_options', 'mamma-support', array(
            $this,
            'mamma_support_callback'
        ));
    }

    public function mamma_support_callback()
    {
  echo 'hello';
    }

}
