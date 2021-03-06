<?php
class Connections extends MY_Controller
{
	protected $consumer;
	protected $github;
	protected $module_site;

    function __construct()
    {
        parent::__construct();
		   
		if (config_item('github_enabled') != 'TRUE') redirect(base_url());
	
		// Load Library
        $this->load->library('oauth2');
		
		// Get Site
		$this->module_site = $this->social_igniter->get_site_view_row('module', 'github');	
	}

	function index()
	{
		redirect(base_url());
	}

    // For OAuth2
    function add()
    {
        $provider = $this->oauth2->provider('github', array(
            'id' 	 => config_item('github_client_id'),
            'secret' => config_item('github_client_secret'),
            'scope'	 => 'repo, user'
        ));

        if (!isset($_GET['code']))
        {
            // By sending no options it'll come back here
            $provider->authorize();
        }
        else
        {
            // Howzit?
            try
            {                        
                $token 	= $provider->access($_GET['code']);
                
                $user	= $provider->get_user_info($token);

                $repos	= $provider->get_user_repos($token);

                // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
                // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
                echo "<pre>Tokens: ";
                print_r($token).PHP_EOL.PHP_EOL;

                echo "User Info: ";
                print_r($user);
                
                echo "Repos: ";
                print_r($repos);

            }

            catch (OAuth2_Exception $e)
            {
                show_error('That didnt work: '.$e);
            }
        }
    }
    
} 