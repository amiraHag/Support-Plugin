<?php

class MMS {

	protected $loader;
	protected $MMS;
	protected $version;

	public function __construct() {
		$this->version = ( defined( 'MMS_VERSION' ) ) ? MMS_VERSION : $this->version = '1.0.0';
		$this->MMS = 'mms';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-mms-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/mms-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/mms-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-mms-api-calls.php';
		$this->loader = new MMS_Loader();

	}

	private function define_admin_hooks() {

		$plugin_admin = new MMS_Admin( $this->get_MMS(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action('admin_menu', $plugin_admin,  'mms_plugin_menu');

	}
	private function define_public_hooks() {

		$plugin_public = new MMS_Public( $this->get_MMS(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', 	$plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', 	$plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'init',	 				$plugin_public, 'add_shortcodes' );
	}

	public function run() {
		$this->loader->run();
	}

	public function get_MMS() {
		return $this->MMS;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}
}
