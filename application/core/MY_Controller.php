<?php

abstract class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		
		if (get_cookie('identity')) 
		{
			if (!$this->session->userdata('userloggedin'))
			{	
			$rememberme=$this->input->cookie('identity');
			$this->db->where('User_signup_token =',$rememberme);
			$res = $this->db->get('User');
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
				}

			}
			
		}	
        //  check if admin, else redirect to login
          if (!$this->session->userdata('userloggedin'))
			{	
			 $target= base_url().'user/login';
			 header("Location: " . $target);				
			 exit();
			}
    }

}