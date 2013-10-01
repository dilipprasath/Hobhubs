<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

   public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('home_model');
        $this->load->helper(array('form', 'url'));
    }


    public function index() {
		 // check if user not select hobbies than redirect select_hobby
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $query = $this->db->get('group_list');

        if($query->num_rows() > 0)
        {
            echo "Create profile page for user";
            echo '<a href="' . base_url(). "profile_photo" .'"> profile photo </a><br/>' ;
            echo '<a href="' . base_url(). "select_hobby" .'"> select_hobby </a>' ;
        }
        else
        {
           $target= base_url().'select_hobby'; 
            redirect($target,'refresh');
        }      
    	
    }

	
	public function fb_user_newpassword()
	{
		echo $this->input->get('name');
        $this->template->set('title', 'Change password');
        $this->template->load('layouts/main', 'user/fb_user_newpassword');
	}
	
	
	public function gplus_user_newpassword()
	{
		$this->template->set('title', 'Change password');
        $this->template->load('layouts/main', 'user/gplus_user_newpassword');
	}
	
	public function profile_page()
	{
		$this->template->set('title', 'Change password');
        $this->template->load('layouts/main', 'profile_page');
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
              $this->home_model->insert_hobby();
              $target= base_url().'profile_photo'; 
              redirect($target,'refresh');
                
            }
            else
            {
                $data['hobbynone']=TRUE;
            }
        }
        $this->template->set('title', 'My website');
        $this->template->load('layouts/main', 'select_hobby',$data);

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
            $config['max_size'] = '1024';
            $config['max_width'] = '1920';
            $config['max_height'] = '1200';
            $config['file_name'] = $this->session->userdata('user_id');
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                $this->template->set('title', 'My website');
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
                }
            }
        }
        else
        {
            $this->template->set('title', 'My website');
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
         //print_r($this->input->post());
         
        $this->load->library('image_lib');
        $config['image_library'] = 'GD2';
        $config['source_image'] = 'uploads/user_photos/temp/'.$this->uri->segment(4);
        $config['maintain_ratio'] = FALSE;
        $config['width']  = $this->input->post('w');
        $config['height'] = $this->input->post('h');
        $config['x_axis'] = $this->input->post('x');
        $config['y_axis'] = $this->input->post('y');

        // print_r($config);
        // exit(0);
        $this->image_lib->initialize($config); 

        if ( ! $this->image_lib->crop())
        {
            echo $this->image_lib->display_errors();
        }
        else
        {
            $target = base_url();
            header("Location: ".$target);
        }

     }  

     if($this->uri->segment(4))
     {
        $data['file_name'] = $this->uri->segment(4);
        $this->template->set('title', 'My website');
        $this->template->load('layouts/img_crop','profile_photo_crop', $data);
     }
   }
  
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
