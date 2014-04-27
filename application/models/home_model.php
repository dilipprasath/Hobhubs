<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends MY_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function insert_hobby()
	{
		$hobby = $this->input->post('element');
		$userid = $this->session->userdata('user_id');
		$this->db->query("INSERT IGNORE INTO  User_Hob (User_id ,Hob_id )VALUES ( $userid, $hobby)");
		return;
	}
	
	public function user_det($user_id)
	{
		$sql = "select User_path 
			from User 
			where User_id = '$user_id'";
		$query=$this->db->query($sql);
		return $query->result();
	}

	public function get_search_details($keyword)
	{
		$srch=$keyword."%"; 
		$sql = "select * 
			from Hob 
			where Hob_hobbylist LIKE'$srch'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function get_existing_hobbys()
	{
		$userid = $this->session->userdata('user_id');
		$sql = "SELECT a.Hob_id AS hodid, b.Hob_hobbylist AS hobname
					FROM User_Hob AS a, Hob AS b
					WHERE a.Hob_id = b.Hob_id
					AND a.User_id  = '$userid'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	public function get_user_details($User_id)
	{
	//start
		$user_details = array();
		$qry ="SELECT User_email, User_firstname, User_lastname, User_dateofbirth, User_gender, User_img 
			FROM User
			WHERE User_id =$User_id";
		$query = $this->db->query($qry);
		if($query->num_rows() > 0)
		{
			$user_details = $query->result();
		}
		return $user_details;
	//end
	}
	
	
	function add_profile_image($img_name,$cmt,$tagcmt)
    {
		$userid = $this->session->userdata('user_id');
		
		if( (strlen($cmt) != 0) && (strlen($tagcmt) != 0) ) {
			$cmtbox = $tagcmt;
			$tagbox = $cmt;
		}
		if( (strlen($cmt) != 0) && (strlen($tagcmt) == 0) ) {
					$cmtbox = $cmt;
					$tagbox = $tagcmt;
		}
		if( (strlen($cmt) == 0) && (strlen($tagcmt) == 0) ) {
					$cmtbox = $cmt;
					$tagbox = $tagcmt;
		}
		
		$data = array("User_id"=>$userid,"Profile_image_name"=>$img_name,"Profile_image_comment"=>$cmtbox,"Profile_tag_comment" => $tagbox);
        $this->db->insert("user_profile",$data);
	}
	
	public function get_user_profile_details($User_id)
	{
	//start
		$user_details = array();
		$qry ="SELECT Profile_image_name,Profile_image_comment,Profile_tag_comment
				FROM user_profile
				WHERE User_id = $User_id";
		$query = $this->db->query($qry);
		if($query->num_rows() > 0)
		{
			$user_details = $query->result();
		}
		return $user_details;
	//end
	}
	
}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */