<?php

abstract class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		
		if (get_cookie('identity')) 
		{
			if (!$this->session->userdata('userloggedin'))
			{	
			$rememberme=$this->input->cookie('identity');
			$this->db->where('remember_me_token =',$rememberme);
			$res = $this->db->get('user');
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