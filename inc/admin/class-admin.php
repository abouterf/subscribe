<?php

class Admin {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'init_admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'add_assets' ) );
	}


	public function init_admin_menu() {
		$dashboard_page      = new Admin_Dashboard();
		$lists_page = new Admin_Lists();
		$dashboard_page_hook = add_menu_page( 'مدیریت اشتراکها', 'اشتراکها', 'manage_options', 'subscribers', array(
			$dashboard_page,
			'index'
		) );
		add_submenu_page('subscribers','مدیریت اشتراکها','داشبورد','manage_options','subscribers');
		add_submenu_page('subscribers','مدیریت اشتراکها','لیست درخواستها','manage_options','subscribers_list',array($lists_page,'index'));
		add_action( "load-{$dashboard_page_hook}", function () {
			$this->add_assets();
		} );
	}

	public function add_assets() {
		wp_register_style( 'subscribe_main_style', SUBSCRIBE_CSS . 'main.css' );

		wp_register_style( 'uikit_rtl_style', SUBSCRIBE_COMPONENTS . 'uikit/uikit-rtl.min.css' );

		wp_register_script( 'uikit_script', SUBSCRIBE_COMPONENTS . 'uikit/uikit.min.js' );

		wp_register_script( 'uikit_icons_script', SUBSCRIBE_COMPONENTS . 'uikit/uikit-icons.min.js' );

		wp_register_script( 'subscribe_main_script', SUBSCRIBE_JS . 'subscribe_main.js', array( 'jquery' ) );


		wp_enqueue_style( 'subscribe_main_style' );

		wp_enqueue_style( 'uikit_rtl_style' );

		wp_enqueue_script( 'subscribe_main_script' );

		wp_enqueue_script( 'uikit_script' );

		wp_enqueue_script( 'uikit_icons_script' );
	}
}

new Admin();