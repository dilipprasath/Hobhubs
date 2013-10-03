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
						if($this->input->post('PersistentCookie')==="yes")
						{
						$this->user_model->set_cookie();
						}
						
						$target = base_url();
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
		$this->template->set('title', 'Login');
       	$this->template->load('layouts/main_login', 'user/login');
    	}
	}

	 // vaildate user input 
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
				$sendmail=$this->user_model->tempuser($this->user_model->auth());
				if ($sendmail === FALSE) {
					$this->template->set('title', 'My website');
			        $this->template->load('layouts/main', 'user/quickregerr');
				}
				else
				{
					$data['email']=$sendmail;
					$this->template->set('title', 'My website');
			        $this->template->load('layouts/main', 'user/quickreg');
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
		$interval = $now->diff($date);
		if($interval->y <=13)
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


public function facebook_request()
	{
		$this->load->library('fbconnect');
		$data = array(
			'redirect_uri' => base_url('user/handle_facebook_login') ,
			'scope' => 'email,user_groups',
			);
		redirect($this->fbconnect->getLoginUrl($data));
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
						$this->user_model->log_in($facebook_user);
						$target= base_url();	
						redirect($target,'refresh');	
					}
					else
					{
						$data=$this->user_model->sign_up_from_facebook($facebook_user);
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

			if($this->user_model->pwchange())
				{
				$target= base_url().'user/pwchanged';	
				redirect($target,'refresh');
				}

		}

		//$this->user_model->log_in($facebook_user);
		//redirect(base_url().'/members');

	}
}
/* End of file user.php */
/* Location: ./application/controllers/user.php */