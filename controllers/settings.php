<?php
class Settings extends Dashboard_Controller 
{
    function __construct() 
    {
        parent::__construct();

		if ($this->data['logged_user_level_id'] > 1) redirect('home');	
        
        $this->load->config('github');
        
		$this->data['page_title']	= 'Github';
    }
 
 	function index()
	{
		if (config_item('github_enabled') == '') 
		{
			$this->session->set_flashdata('message', 'Oops, the Github app is not installed');
			redirect('settings/apps');
		}
	 	
		$this->data['sub_title'] = 'Settings';
		$this->render('dashboard_wide');
	}
	
	function widgets()
	{
		$this->data['sub_title'] = 'Widgets';
		$this->render('dashboard_wide');
	}

}