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

		$this->db->where('email =',$username);
		$this->db->where('password =', $password);
		$res = $this->db->get('user');
		   //$res = $this->db->query('select * from user where username = "' . $username .'" AND password = "' . $password . '"');
		if($res->num_rows()>0)
		{
			$row = $res->row();
			$userid=$row->user_id;
			$firstname = $row->firstname;
			$lastname = $row->lastname;
			$email = $row->email;	
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



	public function auth()
	{
		$this->form_validation->set_rules('firstname','First Name','trim|required|min_length[3]|xss_clean');
		$this->form_validation->set_rules('lastname','Last Name','trim|required|xss_clean');
		$this->form_validation->set_rules('email','Email-id','trim|required|valid_email|is_unique[tempuser.email]|is_unique[user.email]|xss_clean');
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
			$data['firstname'] = $this->input->post('firstname');
			$data['lastname'] = $this->input->post('lastname');
			$data['email'] = $this->input->post('email');
			$data['password'] = md5(base64_encode(($this->input->post('password')."HuB")));
			$data['gender']=$this->input->post('gender');
			$data['birth']= $this->input->post('birthday_year').'-'. $this->input->post('birthday_month').'-'. $this->input->post('birthday_day');
			$data['salt'] = md5(base64_encode($this->input->post('firstname').rand(10,100)));
			return $data;
		}
	}

	
	
	public function userkey()
	{

		$key=$this->uri->segment(3);
		$this->db->where('salt =', $key); 
		$query = $this->db->get('tempuser');
		if ($query->num_rows() > 0)
		{
			$userkey=$query->row_array();
			$data['firstname'] =$userkey['firstname'];
			$data['lastname'] = $userkey['lastname'];
			$data['email'] = $userkey['email'];
			$data['password'] = $userkey['password'];
			$data['gender']=$userkey['gender'];
			$data['birth']= $userkey['birth'];
			$data['salt'] =$userkey['salt'];
			if($this->db->insert('user',$data))
			{
				$this->db->where('id', $userkey['id']);
				if($this->db->delete('tempuser'))
				{
				$username = $userkey['email'];
				$password = $userkey['password'];	
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

		}
		else
		{
			return FALSE;
		}

	}


	 
	public function tempuser($data)
	{
		if($this->db->insert('tempuser',$data))
		{
			$this->load->library('parser');
			$email_body =$this->parser->parse('mail/verification', $data, TRUE);

            $this->email->clear();            
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $this->email->initialize($config);
		
			$this->email->to($data['email']);
			$this->email->from('info@domainindia.biz');
			$this->email->subject('Activate your account '.$data['firstname']);
            $this->email->message($email_body);

			if($this->email->send())
			{ 
			return $data['email']; 
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
		 log_message('error', 'Unanle to insert temp User - '.$data);
		 return FALSE;
		}
	}


public function forgetpass()
{
	$username=$this->input->post('Email');
	$this->db->where('email =',$username);
		$res = $this->db->get('user');
		if($res->num_rows()>0)
		{		
			$row = $res->row();
			$data['firstname'] =$row->firstname;
			$data['lastname'] = $row->lastname;;
			$data['email'] =$row->email;
			$data['salt'] =$row->salt;

			$this->load->library('parser');
			$email_body =$this->parser->parse('mail/forgetpass', $data, TRUE);

            $this->email->clear();            
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $this->email->initialize($config);
		
			$this->email->to($data['email']);
			$this->email->from('info@domainindia.biz');
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
		$this->db->where('salt =', $key); 
		$query = $this->db->get('user');
		if ($query->num_rows() > 0)
		{
			return  $query->row();
		}
		else return FALSE;
}

public function pwchange()
{
	$key=$this->uri->segment(3);
	$data['password'] = md5(base64_encode(($this->input->post('newpw')."HuB")));
	$data['salt'] = md5(base64_encode($this->input->post('newpw').rand(10,100)));
	$this->db->where('salt =', $key); 
	if($this->db->update('user', $data))
	{
		return TRUE; 
	}
	else return FALSE;
}

//FB



public function log_in($facebook_user){

		//echo $facebook_user['name'];

		$data = array(
			'userloggedin'=>TRUE,
			'email' => $facebook_user['email'],
			'firstname' =>$facebook_user['name'] 
			);
		$this->session->set_userdata($data);

	

	}


/**
	 * fb check is member
	 *
	 * @return TRUE or FALSE
	 **/
	public function is_member($facebook_user){

		$this->db->where('email',$facebook_user['email']);

		$query = $this->db->get('user');

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
		$salt = md5(base64_encode($this->input->post('newpw').rand(10,100)));
		$data = array(
			'fb_id' => $facebook_id,
			'firstname' => $first_name,
			'lastname' => $last_name,
			'salt' => $salt,				
			'email' => $email 
			);

		if($this->db->insert('user', $data))
		{
			return $data;
		}
		
		
	}



}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */