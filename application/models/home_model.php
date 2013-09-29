<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	
	
	public function insert_hobby()
	{
		$list=$this->input->post('groups');
		$userid=$this->session->userdata('user_id');
		foreach ($list as  $hobby) {
			
    		$this->db->query("INSERT IGNORE INTO  group_list (user_id ,group_id )VALUES ( $userid, $hobby)");

		}

	}

}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */