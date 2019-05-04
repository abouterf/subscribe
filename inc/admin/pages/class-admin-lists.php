<?php

class Admin_Lists extends Admin_Page_Contract {

	public function __construct() {
		parent::__construct();
		$this->page_title = 'لیستها';
	}

	public function index() {
		$this->load_view( 'admin.pages.lists.index', array( 'page_title' => $this->page_title ), 'lists' );
	}
}