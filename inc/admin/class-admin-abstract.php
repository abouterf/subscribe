<?php

abstract class Admin_Page_Contract {

	protected $page_title;

	public function __construct() {

	}

	abstract public function index();

	public function load_view( $view_name, $params = null ,$layout = 'default' ) {
		$file_path = SUBSCRIBE_VIEWS;
		$file_name = str_replace( '.', DIRECTORY_SEPARATOR, $view_name );
		$file_path = $file_path . DIRECTORY_SEPARATOR . $file_name . '.php';
		if ( is_file( $file_path ) && is_readable( $file_path ) ) {
			if ( ! is_null( $params ) && is_array( $params ) && count( $params ) > 0 ) {
				extract( $params );
			}
			include SUBSCRIBE_VIEWS.DIRECTORY_SEPARATOR.'layouts'.DIRECTORY_SEPARATOR.$layout.'.php';
		}
	}
}