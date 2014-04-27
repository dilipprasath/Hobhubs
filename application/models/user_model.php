<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model  extends MY_Model {


	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function login()
	{

		$this->form_validation->set_rules('username','Email-ID','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		
			if($this->form_validation->run()==FALSE){
				return FALSE;
			}
	}


	public function auth_user($username,$password)
	{

		$this->db->where('User_email =',$username);
		$this->db->where('User_password =',$password);
		$res = $this->db->get('User');
		   //$res = $this->db->query('select * from user where username = "' . $username .'" AND password = "' . $password . '"');
		if($res->num_rows()>0)
		{
			$row = $res->row();
			$userid=$row->User_id;
			$firstname = $row->User_firstname;
			$lastname = $row->User_lastname;
			$email = $row->User_email;	
			$userloggedin = array(
				'userloggedin'=>TRUE,
				'user_id'     => $userid,
				'firstname'   => $firstname,
				'lastname'	  => $lastname,
				'email' => $email);
			

			$this->session->set_userdata($userloggedin);
			return TRUE;
		}
		else
		{
			return FALSE;
		}

	}

	public function user_details($username,$password)
	{
		$sql = "select User_path 
			from User 
			where User_email = '$username' AND User_password = '$password'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	

	
	
	public function set_cookie()
	{
	   	$this->db->where('User_id =', $this->session->userdata('user_id')); 
	  	$data['User_signup_token']=md5(base64_encode($this->session->userdata('firstname').rand(10,100)));
		$this->db->update('User', $data);
		if($this->db->affected_rows()>0)
		{
		     $cookie = array(
		        'name'   => 'identity',
		        'value'  =>  $data['User_signup_token'],
		        'expire' => 86500,
		        'domain' => '',
		        'path'   => '/',
		        'prefix' => ''
	    	);
	    	$this->input->set_cookie($cookie); 
    	}
    	
   	}

	public function auth()
	{
		$this->form_validation->set_rules('firstname','First Name','trim|required|min_length[3]|xss_clean');
		$this->form_validation->set_rules('lastname','Last Name','trim|required|xss_clean');
		$this->form_validation->set_rules('email','Email-id','trim|required|valid_email|is_unique[User.User_email]|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]|max_length[30]|matches[passconf]|xss_clean');
		$this->form_validation->set_rules('passconf','Password','trim|required|xss_clean');
		$this->form_validation->set_rules( 'birthday_year','age','required|greater_than[0]|callback_age_check');
		$this->form_validation->set_rules( 'birthday_day','birth date','required|greater_than[0]');
		$this->form_validation->set_rules( 'birthday_month','birth month','required|greater_than[0]');
		if($this->form_validation->run()==FALSE){
			return FALSE;
		}
		else
		{
			$data['User_email'] = $this->input->post('email');
			$data['User_firstname'] = $this->input->post('firstname');
			$data['User_lastname'] = $this->input->post('lastname');
			$data['User_password'] = md5(base64_encode(($this->input->post('password')."HuB")));
			$data['User_dateofbirth']= $this->input->post('birthday_year').'-'. $this->input->post('birthday_month').'-'. $this->input->post('birthday_day');
			$data['User_gender']=$this->input->post('gender');
			$data['User_Role_id']=1;
			$data['User_Status_id']=3;
			$data['User_Referrer_id']=1;
			$data['User_path']=$this->user_model->set_userpath($this->input->post('firstname'),$this->input->post('lastname'));	
			$data['User_salt'] = md5(base64_encode($this->input->post('firstname').rand(10,100)));
			//$data['User_createdts'] =date('Y-m-d H:i:s',now());
			return $data;
		}
	}
/*
	public function set_userpath($fname,$lname)
	{
		$this->db->where('User_path =', "$fname");
		$res = $this->db->get('User');
		if($res->num_rows()>0)
		{	
			$key = true;
			$val=1;
			while($key)
			{
			// Do stuff
			$this->db->where('User_path =',"$fname$val");
			$res = $this->db->get('User');
				if($res->num_rows()>0)
				{	$val++;	}
				else
				{ 
					$rval="$fname$val";
					$key = false;
				}
			}
			return $rval ;				
		}
		else
		{
			return $fname;
		}

		
	}
	*/
	
		public function set_userpath($fname,$lname)
	{
	
		$firstname = strtolower($fname);
		$lastname = strtolower($lname);
		$string = $firstname.$lastname;
		$query = preg_replace('/\s+/', '', $string);
		$this->db->where('User_path =', "$query");
		$res = $this->db->get('User');
		if($res->num_rows()>0){			
			$key = true;
			$val=1;
			while($key){
			// Do stuff
			$this->db->where('User_path =',"$query$val");
			$res = $this->db->get('User');
				if($res->num_rows()>0)
				{	$val++;	
				}else{ 
					$rval="$query$val";
					$key = false;
				}
			}
			return $rval ;				
		}else{
		//echo $query;
				//	exit;
			return $query;
		}	
	}
	
	
	
	public function userkey()
	{

		$key=$this->uri->segment(3);
		$this->db->where('User_Salt =', $key); 
		$query = $this->db->get('User');
		if ($query->num_rows() > 0)
		{
			$userkey=$query->row_array();
				$username = $userkey['User_email'];
				$password = $userkey['User_password'];	
			$data['User_Status_id'] = 3;
			$this->db->where('User_id', $userkey['User_id']);
			if($this->db->update('User',$data))
			{						
				if (!$this->session->userdata('userloggedin'))
					{	//authorises the user and create session in model
					if(!$this->user_model->auth_user($username,$password))
					{
						$target= base_url().'user/login';
						header("Location: " . $target);
					}
				}	
				$target = base_url();
				header("Location: ". $target);
			}

		}
		else
		{
			return FALSE;
		}

	}


	 
	public function sendmail($data)
	{
		if($this->db->insert('User',$data))
		{
		
			$this->load->library('parser');
			$email_body =$this->parser->parse('mail/verification', $data, TRUE);			
            $this->email->clear();            
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $this->email->initialize($config);
		
			$this->email->to($data['User_email']);
			$this->email->from($this->config->item('site_email'));
			$this->email->subject('Activate your account '.$data['User_firstname']);
            $this->email->message($email_body);

			if($this->email->send())
			{ 
			return $data['User_email']; 
			}
			else{
			$data=$this->email->print_debugger();
			log_message('error', 'Unanle to send email - '.$data);
			return FALSE;
			}
			
			
		}
		else
		{ 
		 $data = json_encode($data);
		 log_message('error', 'Unanle to insert   User - '.$data);
		 return FALSE;
		}
	}


public function forgetpass()
{
	$username=$this->input->post('Email');
	$this->db->where('User_email =',$username);
		$res = $this->db->get('User');
		if($res->num_rows()>0)
		{		
			foreach ($res->result_array() as $data)	
			$this->load->library('parser');
			$email_body =$this->parser->parse('mail/forgetpass', $data, TRUE);

            $this->email->clear();            
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $this->email->initialize($config);
		
			$this->email->to($data['User_email']);
			$this->email->from($this->config->item('site_email'));
			$this->email->subject('Your login details for Hobhubs account ');
            $this->email->message($email_body);

			if($this->email->send())
			{ 
			return TRUE; 
			}
			else{
			$data=$this->email->print_debugger();
			log_message('error', 'Unanle to reset email - '.$data);
			//return FALSE;
			}			
		}
		else
		{
			return FALSE;
		}
}


public function pwresetkey()
{
		$key=$this->uri->segment(3);
		$this->db->where('User_salt =', $key); 
		$query = $this->db->get('User');
		if ($query->num_rows() > 0)
		{
			return  $query->row();
		}
		else return FALSE;
}

public function pwchange()
{
	$key=$this->uri->segment(3);
	$data['User_password'] = md5(base64_encode(($this->input->post('newpw')."HuB")));
	$data['User_salt'] = md5(base64_encode($this->input->post('newpw').rand(10,100)));
	$this->db->where('User_salt =', $key); 
	if($this->db->update('User', $data))
	{
		return $data['User_salt']; 
	}
	else return FALSE;
}

//FB and GPlus



public function log_in($salt){

		$this->db->where('User_salt =',$salt); 
		$res = $this->db->get('User');
		   //$res = $this->db->query('select * from user where username = "' . $username .'" AND password = "' . $password . '"');
		if($res->num_rows()>0)
		{
			$row = $res->row();
			$email = $row->User_email;	
			$password=$row->User_password;
			
			$data=$this->user_model->auth_user($email,$password);
		}

	

	}


	/**
	 *  check is member
	 *
	 * @return TRUE or FALSE
	 **/
	public function is_member($user){

		$this->db->where('User_email',$user['email']);

		$query = $this->db->get('User');

		if($query->num_rows()==1){

			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
		/**
		 * signup using facebook
		 */

		public function sign_up_from_facebook($facebook_user){

		//Data Taken

		$first_name = $facebook_user['first_name'];
		$last_name = $facebook_user['last_name'];
		$facebook_id = $facebook_user['id'];
		$email = $facebook_user['email'];
		$salt = md5(base64_encode($facebook_user['email'].rand(10,100)));
		$data = array(
			'User_email' => $email,
			'User_firstname' => $first_name,
			'User_lastname' => $last_name,
			'User_salt' => $salt,				
			'User_Referrer_id' =>2,
			'User_Role_id'=>1,
			'User_Status_id'=>1
			);

		if($this->db->insert('User', $data))
		{
			return $data;
		}
		
		
	}

	public function sign_up_from_google($google_user){

		$first_name = $google_user['given_name'];
		$last_name = $google_user['family_name'];
		//$gplus_id = $google_user['id'];
		$email = $google_user['email'];
		$salt = md5(base64_encode($google_user['email'].rand(10,100)));
		$data = array(
			'User_email' => $email,
			'User_firstname' => $first_name,
			'User_lastname' => $last_name,
			'User_salt' => $salt,				
			'User_Referrer_id' =>3,
			'User_Role_id'=>1,
			'User_Status_id'=>1
			);

		if($this->db->insert('User', $data))
		{
			return $data;
		}


	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */