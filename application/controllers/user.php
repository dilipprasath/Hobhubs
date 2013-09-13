<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('user_model');

	}

	
	public function index()
	{
			echo"need to work";	
	}
	/**
	 * user login form
	 *
	 * @return auth via submit form
	 **/
	public function login()
	{
		$data="";
		if ($this->input->post('username')) {

			if($this->user_model->login()=== FALSE)
			{
				$data['form1_errors'] = validation_errors();
			}
			else
			{
				$username=$this->input->post('username');
				$password = md5(base64_encode($this->input->post('password')."HuB"));	

					//authorises the user and create session in model
					if($this->user_model->auth_user($username,$password))
					{
						$target = base_url();
						header("Location: ". $target);
					}
					else
					{
						$target= base_url().'user/login';
						header("Location: " . $target);
					}

			}

					
		}
		$this->template->set('title', 'My website');
        $this->template->load('layouts/main', 'user/login',$data);
	}


	/**
	 * vaildate user input 
	 *
	 * @return void
	 **/
	public function auth()
	{

		if ($this->input->post('firstname')) {
			if(!$this->user_model->auth())
			{
				$data['form_errors'] = validation_errors();
				$this->template->set('title', 'My website');
		        $this->template->load('layouts/main', 'user/login',$data);
			}
			else
			{
				$sendmail=$this->user_model->tempuser($this->user_model->auth());
				if ($sendmail === false) {
					$this->template->set('title', 'My website');
			        $this->template->load('layouts/main', 'user/quickregerr',$data);
				}
				else
				{
					$data['email']=$sendmail;
					$this->template->set('title', 'My website');
			        $this->template->load('layouts/main', 'user/quickreg',$data);
				}
				
			}
		}
		else
		{
			$target= base_url().'user/login';
			header("Location: " . $target);
		}
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 **/
	public function key()
	{
		if ($this->uri->segment(3)) {
			$data="";
			$userkey=$this->user_model->userkey();
			if ($userkey === false) {
			$this->template->set('title', 'My website');
	        $this->template->load('layouts/main', 'user/quickregerr',$data);
			}
			
			
		}


	}

	/**
	 * [logout the user and redirect to home]
	 * @return [type] [description]
	 */
	public function logout()
	{      
		$this->session->unset_userdata('userloggedin');		
		$this->session->sess_destroy();	
		$target= base_url();	
		redirect($target,'refresh');		

	}

	  /**
     * undocumented function
     *
     * @return void
     **/
	
    public function account_recovery ()
    {

    	$this->template->set('title', 'My website');
        $this->template->load('layouts/main', 'recovery');
    }

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */