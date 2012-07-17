<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Github : Install
* Author: 		Brennan Novak
* 		  		hi@brennannovak.com
*          
* Project:		http://social-igniter.com/
*
* Description: 	Installer values for Github for Social Igniter 
*/

/* Settings */
$config['github_settings']['widgets']				= 'TRUE';
$config['github_settings']['categories']			= 'TRUE';
$config['github_settings']['enabled']				= 'TRUE';
$config['github_settings']['client_id']	 			= '';
$config['github_settings']['client_secret'] 		= '';
$config['github_settings']['social_connection'] 	= 'TRUE';
$config['github_settings']['social_login'] 			= 'TRUE';
$config['github_settings']['login_redirect']		= 'home/';
$config['github_settings']['connections_redirect']	= 'settings/connections/';

/* Sites */
$config['github_sites'][] = array(
	'url'		=> 'http://github.com/', 
	'module'	=> 'github',
	'type' 		=> 'remote', 
	'title'		=> 'Github', 
	'favicon'	=> 'http://github.com/favicon.ico'
);