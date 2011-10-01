<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * Github API : Module : Social-Igniter
 *
 */
class Api extends Oauth_Controller
{
	protected $module_site;

    function __construct()
    {
        parent::__construct(); 

		$this->load->library('tweet');
		
		// Get Site for Twitter
		$this->module_site = $this->social_igniter->get_site_view_row('module', 'twitter');		
	}

	function install_authd_get()
	{
	
		$this->load->config('install');
		
		if (config_item('settings'))
		{
			$current_settings 	= $this->social_igniter->get_settings_module('github');
			$config_settings	= config_item('settings');
			$add_settings		= array();
			$current_count		= count($current_settings);
			$config_count		= count($config_settings);
		
			// Clean Current
			if ($this->uri->segment(3) == 'reinstall')
			{				
				foreach ($current_settings as $setting)
				{
					$this->social_igniter->delete_setting($setting->settings_id);
				}
			
				$current_count = 0;			
			}		
			
			// Maybe Install or Update
			if ($current_count != $config_count)
			{
				foreach ($config_settings as $key => $setting)
				{
					$setting_data = array(
						'site_id'	=> config_item('site_id'),
						'module'	=> $this->get('app'),
						'setting'	=> $key,
						'value'		=> $setting
					);
					
					if (!$this->social_igniter->check_setting_exists($setting_data))
					{
						$add_settings[] = $this->social_igniter->add_setting($setting_data);
					}
				}
				
				// Properly Handled
				$now_settings = count($add_settings) + $current_count;
				
				if ($now_settings == $config_count)
				{
					$message = array('status' => 'success', 'message' => 'Settings have been added', 'data' => $add_settings);
				}
				else
				{
					$message = array('status' => 'error', 'message' => 'Shucks the settings were not properly added');				
				}
			}
			else
			{
				$message = array('status' => 'error', 'message' => 'Settings are currently up to date');			
			}			
		}
		else
		{
			$message = array('status' => 'error', 'message' => 'There are no settings to install');
		}

     	$this->response($message, 200);
     }
}