<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Github : Widgets
* Author: 		Brennan Novak
* 		  		hi@brennannovak.com
*          
* Project:		http://social-igniter.com/
*
* Description: 	Installer values for Github for Social Igniter 
*/

$config['github_widgets'][] = array(
	'regions'	=> array('sidebar','content'),
	'widget'	=> array(
		'module'	=> 'github',
		'name'		=> 'Recent Data',
		'method'	=> 'run',
		'path'		=> 'widgets_recent_data',
		'multiple'	=> 'FALSE',
		'order'		=> '1',
		'title'		=> 'Recent Data',
		'content'	=> ''
	)
);