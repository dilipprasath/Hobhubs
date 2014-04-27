<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {


   public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->helper(array('form','url'));
	    $this->load->library(array('form_validation', 'pagination','upload','session'));

    }

    public function index() 
	{
		// check if user not select hobbies than redirect select_hobby
        $this->db->where('User_id',$this->session->userdata('user_id'));
        $query = $this->db->get('User_Hob');
        if($query->num_rows() > 0)
        { 
            $user_details = $this->home_model->get_user_details($this->session->userdata('user_id'));
            foreach ($user_details as $row){
				$data['User_email']= $row->User_email;
				$data['User_firstname']= $row->User_firstname;
				$data['User_lastname']= $row->User_lastname;
				$birthdate= $row->User_dateofbirth;
				$var = $birthdate;
				list($year,$month,$date) = explode("-", $var);
				$date =  $date . '/' . $month . '/' . $year; 
				$data['User_dateofbirth'] = $date;
				$data['User_gender']= $row->User_gender;
				$data['User_img']= $row->User_img;	
			}
			$data['user_profile_details'] = $this->home_model->get_user_profile_details($this->session->userdata('user_id'));
			//echo '<pre>'; print_r($user_profile_details);
			//exit;
        $this->template->set('title', 'Profile');
		$this->template->load('layouts/header','profile_page',$data);   
		}
		else
		{ 
            $target= base_url().'select_hobby'; 
            redirect($target,'refresh');
		} 
    }



	//vimal  pages
	public function fb_user_newpassword()
	{
		echo $this->input->get('name');
        $this->template->set('title', 'Facebook password');
        $this->template->load('la_youts/main', 'user/fb_user_newpassword');
	}
	
	
	public function gplus_user_newpassword()
	{
		$this->template->set('title', 'Google+ password');
        $this->template->load('layouts/main', 'user/gplus_user_newpassword');
	}
	
	public function profile_page()
	{
		$this->template->set('title', 'Profile Page');
        $this->template->load('layouts/home', 'profile_page');
	}
	
	public function post_page()
	{
		$this->template->set('title', 'Post Page');
        $this->template->load('layouts/home', 'post_page');
	}

    /**
     * undocumented function
     *
     * @return void
     **/
    public function select_hobby()
    {   
        $data="";
        if($this->input->post("checkval"))      
        {
            if($this->input->post('groups'))
            {
				$target= base_url().'profile_photo'; 
				redirect($target,'refresh');
                
            }
            else
            {
                $data['hobbynone']=TRUE;
            }
        }
		$data['existing_hobbys'] = $existing_hobbys=$this->home_model->get_existing_hobbys();
		foreach($existing_hobbys as $val)
		{
			$hob_ids[] = $val->hodid;
		}
		if(isset($hob_ids))
		{
			$data['hob_ids'] = $hob_ids;
		}else{
			$fake_ids[] = '0';
			$data['hob_ids'] = $fake_ids;
		}
        $this->template->set('title', 'Hobbys Selection');
		$this->template->load('layouts/header','search_hobby',$data);
    }

	public function search_hobby()
    {
		$postval = $this->input->post();	
		$keyword = $postval['keywords'];
		$data['existing_hobbys'] = $existing_hobbys=$this->home_model->get_existing_hobbys();
		foreach($existing_hobbys as $val)
		{
			$hob_ids[] = $val->hodid;
		}
		if(isset($hob_ids))
		{
			$data['hob_ids'] = $hob_ids;
		}else{
			$fake_ids[] = '0';
			$data['hob_ids'] = $fake_ids;
		}
		if($this->input->post('keywords'))
		{
			$data['search_details'] = $this->home_model->get_search_details($keyword);
			$this->template->set('title', 'Hobbys Selection');
			$this->template->load('layouts/header', 'search_hobby',$data);
		}else{
			$this->template->set('title', 'Hobbys Selection');
			$this->template->load('layouts/header', 'search_hobby',$data);
		}
	}
	
	public function update_follow()
    {

		$this->home_model->insert_hobby();	
		$return['msg'] = 'success';
		echo json_encode($return);
	}
	
    /**
     * undocumented function
     *
     * @return void
     **/
    public function profile_photo()
    {
        
        if($this->input->post('checkval'))
        {
			
            $config['upload_path'] = './uploads/user_photos/temp';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2024';
            $config['max_width'] = '2920';
            $config['max_height'] = '2200';
            $config['file_name'] = $this->session->userdata('user_id');
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());
                $this->template->set('title', 'Upload Profile Photo');
                $this->template->load('layouts/main', 'profile_photo',$error);
            }
            else
            {
                $data = $this->upload->data();
                $this->load->library('image_lib');
                $config['source_image'] = 'uploads/user_photos/temp/'.$data['file_name'];
                $config['maintain_ratio'] = TRUE;
                $config['width']  = 400;
                $config['height'] = 600;

                $this->image_lib->initialize($config); 
                if($this->image_lib->resize())
                {
				
                $target = base_url('crop_image').'/'.$data['image_width'].'/'.$data['image_height'].'/'.$data['file_name'];
                header("Location: ".$target);
              exit; 
			   }
            }
        }
        else
        {
            $this->template->set('title', 'Upload Profile Photo');
            $this->template->load('layouts/main', 'profile_photo');
        }
    }
   
   /**
    * undocumented function
    *
    * @return void
    **/
   public function crop_image()
   {
     if($this->input->post())
     {  
        $this->load->library('image_lib');
        $config['image_library'] = 'GD2';
        $config['source_image'] = 'uploads/user_photos/temp/'.$this->uri->segment(4);
        $config['maintain_ratio'] = FALSE;
        $config['width']  = $this->input->post('w');
        $config['height'] = $this->input->post('h');
        $config['x_axis'] = $this->input->post('x');
        $config['y_axis'] = $this->input->post('y');

        $this->image_lib->initialize($config); 

        if ( ! $this->image_lib->crop())
        {
            echo $this->image_lib->display_errors();
        }
        else
        {
            //update image url
        $data = array('User_img' =>  $this->uri->segment(4) );
        $id=$this->session->userdata('user_id');
        $this->db->where('User_id', $id);
        $this->db->update('User', $data);

		$user_id = $this->session->userdata('user_id'); 
		$user_det = $this->home_model->user_det($user_id);
		
		foreach($user_det as $val){
			$user_path = $val->User_path;
		}
            $target = base_url().$user_path;
            header("Location: ".$target);
        }

     }  

     if($this->uri->segment(4))
     {
        $data['file_name'] = $this->uri->segment(4);
        
        $this->template->set('title', 'Crop Profile Photo');
        $this->template->load('layouts/img_crop','profile_photo_crop', $data);
     }
   }
   
   public function imgupload()
   {	  
		$this->db->where('User_id',$this->session->userdata('user_id'));
		$query = $this->db->get('User_Hob');
		if($query->num_rows() > 0)
		{
			$user_details = $this->home_model->get_user_details($this->session->userdata('user_id'));
			foreach ($user_details as $row)
			{
				$data['User_email']= $row->User_email;
				$data['User_firstname']= $row->User_firstname;
				$data['User_lastname']= $row->User_lastname;
				$birthdate= $row->User_dateofbirth;
				$var = $birthdate;
				list($year,$month,$date) = explode("-", $var);
				$date =  $date . '/' . $month . '/' . $year; 
				$data['User_dateofbirth'] = $date;
				$data['User_gender']= $row->User_gender;
				$data['User_img']= $row->User_img;	
			} 
			$data['user_profile_details'] = $this->home_model->get_user_profile_details($this->session->userdata('user_id'));
			if($_FILES)
			{
				$uname = "userfile";
				$ext = end(explode(".", $_FILES[$uname]['name']));
				$extarray = array("jpg","JPG","JPEG","jpeg","gif","GIF","png","PNG");
				if(in_array($ext,$extarray))
				{
					$basepath =  "./prof_temp/";	
					$randomnumber = rand(1111111,8888888);
					$newimgname = $randomnumber . "." . $ext ;												
					$target_path = $basepath . $newimgname ;				
					
					$fileupload = move_uploaded_file($_FILES[$uname]['tmp_name'],$target_path) ;
					$data['img_tmp_name'] = $randomnumber.".".$ext;
				}else
				{
					$data['error'] = "Wrong format";
				}
			}
			$this->template->set('title', 'Profile');
			$this->template->load('layouts/header', 'profile_page',$data);
		}else
		{
			$target= base_url().'select_hobby'; 
			redirect($target,'refresh');
		}
		
	}

	public function imgsave(){
		ob_start();
		$postval = $this->input->post();
		$cmt = $tagcmt = "";
		$img_name=$this->input->post('img_name');
		$cmt=$this->input->post('cmt');
		$tagcmt=$this->input->post('taghere');
		rename(APPPATH.'../prof_temp/'.$img_name,APPPATH.'../prof_img/'.$img_name);
		$this->home_model->add_profile_image($img_name,$cmt,$tagcmt);
		$user_id = $this->session->userdata('user_id'); 
		$user_det = $this->home_model->user_det($user_id);
		foreach($user_det as $val){
			$user_path = $val->User_path;
		}
        $target = base_url().$user_path;
        header("Location: ".$target);
	}
	

	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
