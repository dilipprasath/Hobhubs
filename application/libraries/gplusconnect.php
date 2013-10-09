<?php 
/**
 * GOOGLE PLUS user authentication library
 * 1. Uses config file googleplus for settings.
 */

require_once(APPPATH.'libraries/gplus/Google_Client.php');
require_once(APPPATH.'libraries/gplus/contrib/Google_PlusService.php');
require_once(APPPATH.'libraries/gplus/contrib/Google_Oauth2Service.php');

class Gplusconnect{


	public function __construct()
	{
		//Declaring the public variables
		$CI =& get_instance();
		$CI->config->load('googleplus');
		$cache_path = $CI->config->item('cache_path');
		$GLOBALS['apiConfig']['ioFileCache_directory'] = ($cache_path == '') ? APPPATH .'cache/' : $cache_path;
		
		$this->client = new Google_Client();
		$this->client->setApplicationName($CI->config->item('application_name', 'googleplus'));
		$this->client->setClientId($CI->config->item('client_id', 'googleplus'));
		$this->client->setClientSecret($CI->config->item('client_secret', 'googleplus'));
		$this->client->setRedirectUri($CI->config->item('redirect_uri', 'googleplus'));
		$this->client->setDeveloperKey($CI->config->item('api_key', 'googleplus'));
		$this->client->setScopes(array('https://www.googleapis.com/auth/plus.login','https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/userinfo.profile'));
		$this->plus = new Google_PlusService($this->client);
		$this->oauth2=new Google_Oauth2Service($this->client);

	}

	/**
	 * [get_url Gets the google url to login and authenticate]
	 * @return [type] [description]
	 */
	public function get_url()
	{
		if(null !==$this->client->createAuthUrl())
		 {
			return $this->client->createAuthUrl();
		}	
	}

	/**
	 * [get_access Authenticate the user using the google url and returns the access code]
	 * @param  [string] $code [Unique user code from google]
	 * @return [string]       [access token]
	 */
	public function get_access($code)
	{
		$this->client->authenticate($code);
		return $this->client->getAccessToken();
	}
	

	/**
	 * [set_access Sets the access token, based on unique user code and returns user data]
	 * @param [type] $code [description]
	 */
	public function set_access($code)
	{
		$this->client->setAccessToken($code);
		if($this->client->getAccessToken())
		{
			$data['plus'] = $this->plus->people->get('me');
			$data['user'] = $this->oauth2->userinfo->get();
			return $data;
		}
		return FALSE;
	}

}

