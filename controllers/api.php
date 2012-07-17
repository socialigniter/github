<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Github : API Controller
* Author: 		Brennan Novak
* 		  		hi@brennannovak.com
* 
* Project:		http://social-igniter.com
* 
* Description: This file is for the Github API Controller class
*/
class Api extends Oauth_Controller
{
    function __construct()
    {
        parent::__construct();
	}

    /* Install App */
	function install_get()
	{
		// Load
		$this->load->library('installer');
		$this->load->config('install');

		// Settings & Create Folders
		$settings = $this->installer->install_settings('github', config_item('github_settings'));

		if ($settings == TRUE)
		{
            $message = array('status' => 'success', 'message' => 'Yay, the Github App was installed');
        }
        else
        {
            $message = array('status' => 'error', 'message' => 'Dang Github App could not be installed');
        }		
		
		$this->response($message, 200);
	} 


}