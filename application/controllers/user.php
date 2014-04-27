<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('user_model');
		$this->load->helper('cookie');
	}

	public function index()
	{
			echo"need to work";	
	}

	// user login form
	function login()
	{
	
	//echo base_url();
	//exit;
		if ($this->input->post('username')) {
			
			if($this->user_model->login()=== FALSE)
			{		
				$this->template->set('title', 'Login');
       			$this->template->load('layouts/main_login', 'user/login');
			}
			else
			{
				$username=$this->input->post('username');
				$password = md5(base64_encode($this->input->post('password')."HuB"));
					//authorises the user and create session in model
					if($this->user_model->auth_user($username,$password))
					{
						$user_details = $this->user_model->user_details($username,$password);
						foreach($user_details as $val){
							$user_path = $val->User_path;
						}
						if($this->input->post('PersistentCookie')==="yes")
						{
						$this->user_model->set_cookie();
						}						
						$target = base_url().$user_path;
						header("Location: ". $target);
					}
					else
					{
						$this->template->set('title', 'Login');
       					$this->template->load('layouts/main_login', 'user/login');
					}
			}					
		}
		else
		{
		$data['orginal_count'] = 'bibin';
		
		$this->template->set('title', 'Login');
       	$this->template->load('layouts/main_login', 'user/login',$data);
    	}
	}

	 // New use sign-up process
	public function auth()
	{
		if ($this->input->post('firstname')) {
			if(!$this->user_model->auth())
			{
				$this->template->set('title', 'My website');
		      	$this->template->load('layouts/main', 'user/signup');
			}
			else
			{
				$data = $this->user_model->auth();
				$sendmail=$this->user_model->sendmail($data);
				//if ($sendmail === FALSE) {
				//	$this->template->set('title', 'My website');
			   //     $this->template->load('layouts/main', 'user/quickregerr');
			//	}
			//	else
			//	{
					if($this->user_model->auth_user($data['User_email'],$data['User_password']))
					{
						$user_details = $this->user_model->user_details($username,$password);
						foreach($user_details as $val){
							$user_path = $val->User_path;
						}
					
						$target = base_url().$user_path;
						header("Location: ". $target);
					}
					else
					{
						log_message('error', 'Unable to create session in user.php Fun: auth');
					}
			//	}				
			}
		}
		else
		{
			$target= base_url().'user/login';
			header("Location: " . $target);
		}
	}
	
	// New fb user sign-up process
	public function fb_auth()
	{
		if ($this->input->post('firstname')) {
			if(!$this->user_model->auth())
			{
				$this->template->set('title', 'My website');
		      	$this->template->load('layouts/main', 'user/signup');
			}
			else
			{
				$data = $this->user_model->auth();
				$sendmail=$this->user_model->sendmail($data);
				if ($sendmail === FALSE) {
					$this->template->set('title', 'My website');
			        $this->template->load('layouts/main', 'user/quickregerr');
				}
				else
				{
					if($this->user_model->auth_user($data['User_email'],$data['User_password']))
					{
						header("Location: ".base_url())	;
					}
					else
					{
						log_message('error', 'Unable to create session in user.php Fun: auth');
					}
				}				
			}
		}
		else
		{
			$target= base_url().'user/login';
			header("Location: " . $target);
		}
	}

	public function key()
	{
		if ($this->uri->segment(3)) {
			$data="";
			$userkey=$this->user_model->userkey();
			if ($userkey === FALSE) {
			$this->template->set('title', 'My website');
	        $this->template->load('layouts/main', 'user/quickregerr',$data);
			}
		}
	}

	//logout the user and redirect to home
	public function logout()
	{      
		$this->session->unset_userdata('userloggedin');	
		delete_cookie("identity");	
		$this->session->sess_destroy();	
		$target= base_url();	
		redirect($target,'refresh');
	}

	
    public function account_recovery ()
    {
    	if($this->input->post('Email'))
    	{
    		if($this->user_model->forgetpass()=== FALSE)
    		{
    			//Todo: need to redirect
    			echo" No client account was found with the email address you entered";
    		}
    		else if($this->user_model->forgetpass()=== TRUE)
    		{
    			$target= base_url('user/emailsend');	
				redirect($target,'refresh');
    			
    		}
    		else
    		{
    			//Todo:find out the resan
    			echo "Unable to reset Your Password";
    		}
    	}
    	else
    	{
    	$this->template->set('title', 'My website');
        $this->template->load('layouts/main', 'recovery');
    	}
    }
    public function emailsend()
    {
    	$this->template->set('title', 'My website');
        $this->template->load('layouts/main', 'user/validation_email');
    }
    public function pwreset()
	{
		if ($this->uri->segment(3)) {

			if ($this->input->post('newpw')) {
				if($this->user_model->pwchange())
				{
				$target= base_url().'user/pwchanged';	
				redirect($target,'refresh');
				}
			}
			$userkey=$this->user_model->pwresetkey();
			if ($userkey === FALSE) {
			$this->template->set('title', 'My website');
	        $this->template->load('layouts/main', 'user/quickregerr');
			}
			elseif ($userkey)
			{
			$this->template->set('title', 'My website');
	        $this->template->load('layouts/main', 'user/pwreset',$userkey);
			}
		}
	}

	public function pwchanged()
	{
		$this->template->set('title', 'My website');
	    $this->template->load('layouts/main', 'user/pwchanged');
	}

	public function age_check($str)
	{
		$birthDate= $this->input->post('birthday_year').'/'. $this->input->post('birthday_month').'/'. $this->input->post('birthday_day');
		$date = new DateTime($birthDate);
        $now = new DateTime();
		//$interval = $now->diff($date); 5.3 vresion compatible function
		//Below is olderversio compatible
		$interval = floor(($now->format('U') - $date->format('U')) / (60*60*24*365));

		if($interval <= 13)
		{
			$this->form_validation->set_message('age_check', 'In order to be eligible to sign up for Hobhubs.com, you must be at least 13 years old.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}


//FB

/*
public function facebook_request()
	{
	
	
		$this->load->library('fbconnect');
		$data = array(
			'redirect_uri' => base_url('user/handle_facebook_login') ,
			'scope' => 'email,user_groups',
			);
		redirect($this->fbconnect->getLoginUrl($data));
	}*/
	
		public function facebook_request(){
		//echo phpinfo();


		$this->load->library('fb_connect');
		$data = array(
		'redirect_uri'=> base_url().'user/handle_facebook_login',
		'scope' => 'email,offline_access,publish_stream'
		);
		redirect($this->fb_connect->getLoginUrl($data));
		
		
	}
	
	
	
	public function handle_facebook_login()
	{

	
			$this->load->library('fbconnect');
			$facebook_user = $this->fbconnect->user;
			if($this->fbconnect->user)
			{				
				if(isset($facebook_user['email']))
				{
					if($this->user_model->is_member($facebook_user))
					{
						//$this->user_model->log_in($facebook_user);
						$target= base_url();	
						redirect($target,'refresh');	
					}
					else
					{
						//$data=$this->user_model->sign_up_from_facebook($facebook_user);
						$this->template->set('title', 'My website');
	        			$this->template->load('layouts/main', 'user/fbpass',$data);
					}
				}
				else
				{
					echo "facebook id Not defined";
					log_message('error', 'facebook email id Not defined');
				}

			}
			else
			{
				echo "Could Not Log In";
				log_message('error', 'facebook Could Not Log In');
			}
	}

	public function fbpass()
	{
		if ($this->input->post('newpw')) {
				$salt=$this->user_model->pwchange();
			if($salt)
				{
				$this->user_model->log_in($salt);
				$target= base_url();	
				redirect($target,'refresh');
				}

		}

		//$this->user_model->log_in($facebook_user);
		//redirect(base_url().'/members');
	}


//Google Plus
		/**
	 * undocumented function
	 *
	 * @return void
	 **/
	public function google_request()
	{
		$this->load->library('gplusconnect');
		$authurl = $this->gplusconnect->get_url();
		header("Location: ".$authurl);
	}

	public function gpreturn()
	{
	echo 'haii';
	exit;
	
	
		$this->load->library('gplusconnect');
		if(null !== $this->input->get('code'))
		{
			$ses_access =  $this->gplusconnect->get_access($this->input->get('code'));
			$this->session->set_userdata('access_token',$ses_access);
		}

		if(null !== $this->session->userdata('access_token'))
		{
			$gdata = $this->gplusconnect->set_access($this->session->userdata('access_token'));

			if(isset($gdata['user']['email']))
				{
					
					if($this->user_model->is_member($gdata['user']))
					{
						//$this->user_model->log_in($gdata['user']);
						$target= base_url();	
						redirect($target,'refresh');	
					}
					else
					{
						
						$data=$data=$this->user_model->sign_up_from_google($gdata['user']);
						$this->template->set('title', 'My website');
				        $this->template->load('layouts/main', 'user/gplus_user_newpassword',$data);
				    }
				}
		}
	}

	


	


}
/* End of file user.php */
/* Location: ./application/controllers/user.php */