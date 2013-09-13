<?php

abstract class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		
			
        //  check if admin, else redirect to login
         if (!$this->session->userdata('userloggedin'))
			{	
			 $target= base_url().'user/login';
			 header("Location: " . $target);				
			 exit();
			}
    }

}