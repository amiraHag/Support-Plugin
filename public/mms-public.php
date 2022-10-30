<?php

class MMS_Public {


	private $plugin_name;
	private $version;


	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}


	public function enqueue_styles() {
		wp_register_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mms-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name );
	}

	public function enqueue_scripts() {
    	wp_register_script( $this->plugin_name , plugin_dir_url( __FILE__ ) . 'js/mms-public.js', array( 'jquery' ), $this->version, false );
	    wp_enqueue_script( $this->plugin_name);

		}

}
