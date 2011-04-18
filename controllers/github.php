<?php
class Module_template extends Site_Controller
{
    function __construct()
    {
        parent::__construct();       

		$this->load->config('config');
	}
	
	function index()
	{
		$this->data['page_title'] = 'Module Template';
		$this->render();	
	}

	function view() 
	{		
		// Basic Content Redirect	
		$this->render();
	}
	
}
