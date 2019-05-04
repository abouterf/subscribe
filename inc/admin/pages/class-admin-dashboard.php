<?php

subscribe::check_direct_access();

class Admin_Dashboard extends Admin_Page_Contract {
	public function __construct() {
		parent::__construct();
		$this->page_title = 'داشبورد';
	}

	public function index() {
		$this->load_view( 'admin.pages.dashboard.index', array( 'page_title' => $this->page_title ) );
	}
}