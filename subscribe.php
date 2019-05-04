<?php
/*
Plugin Name: Subscribe
Plugin URI: http://erfankargosha.ir/
Description: This is a test plugin.
Author: Erfan Kargosha
Version: 1.0.0
 */

//register_activation_hook( __FILE__, 'subscribe_activation' );
//
//function subscribe_activation() {
//
//}
//
//register_deactivation_hook( __FILE__, 'subscribe_deactivation' );
//
//function subscribe_deactivation(){
//
//}
final class subscribe {

	protected static $instance;

	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new static();
		}
	}

	public function __construct() {
		$this->define_constants();
		$this->do_includes();
		$this->init();
	}

	private function define_constants() {
		define( 'SUBSCRIBE_DIR', plugin_dir_path( __FILE__ ) );
		define( 'SUBSCRIBE_URL', plugin_dir_url( __FILE__ ) );
		define( 'SUBSCRIBE_CSS', SUBSCRIBE_URL . '/assets/css/' );
		define( 'SUBSCRIBE_JS', SUBSCRIBE_URL . 'assets/js/' );
		define( 'SUBSCRIBE_IMG', SUBSCRIBE_URL . '/assets/img/' );
		define( 'SUBSCRIBE_COMPONENTS', SUBSCRIBE_URL . 'assets/components/' );
		define( 'SUBSCRIBE_INC', SUBSCRIBE_DIR . DIRECTORY_SEPARATOR . 'inc' );
		define( 'SUBSCRIBE_VIEWS', SUBSCRIBE_DIR . 'view' );
	}

	private function do_includes() {
		if ( $this->is_request( 'admin' ) ) {

			include SUBSCRIBE_INC . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'class-admin.php';
			include SUBSCRIBE_INC . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'class-admin-abstract.php';
			include SUBSCRIBE_INC . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'class-admin-dashboard.php';
			include SUBSCRIBE_INC . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'class-admin-lists.php';

		}
	}

	private function is_request( $type ) {
		switch ( $type ) {
			case 'admin':
				return is_admin();
				break;
			case 'ajax':
				return defined( 'DOING_AJAX' );
				break;
			case 'frontend':
				return ! is_admin();
				break;
		}
	}

	public function subscribe_activation() {

	}

	public function subscribe_deactivation() {

	}

	private function init() {
		register_activation_hook( __FILE__, array( $this, 'subscribe_activation' ) );
		register_deactivation_hook( __FILE__, array( $this, 'subscribe_deactivation' ) );
	}

	public static function check_direct_access() {
		defined( 'ABSPATH' ) || exit();
	}

}


subscribe::get_instance();


