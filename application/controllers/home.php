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
        //todo:check if user not select hobbies than redirect select_hobby
        $target= base_url().'select_hobby'; 
        redirect($target,'refresh');
    	
    }
	
	public function fb_user_newpassword()
	{
		$this->template->set('title', 'Change password');
        $this->template->load('layouts/main', 'user/fb_user_newpassword');
	}
	public function gplus_user_newpassword()
	{
		$this->template->set('title', 'Change password');
        $this->template->load('layouts/main', 'user/gplus_user_newpassword');
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
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';

            $this->load->library('upload', $config);

            //$this->load->library('upload');
      
            $this->upload->do_upload();
            
            exit(0);

            if (!$this->upload->do_upload('sts'))
            {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                exit(0);
                // $this->template->set('title', 'My website');
                // $this->template->load('layouts/main', 'profile_photo',$error);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                print_r($data);
                // $this->load->view('upload_success', $data);
                exit(0);
            }
        }

        $this->template->set('title', 'My website');
        $this->template->load('layouts/main', 'profile_photo');


    }
    /**
     * undocumented function
     *
     * @return void
     **/
    public function my_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        //$this->load->library('upload');
      
    
            if ( !$this->upload->do_upload())
            {
            $error = array('error' => $this->upload->display_errors());
            $this->template->set('title', 'My website');
            $this->template->load('layouts/main', 'profile_photo',$error);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                print_r($data);
                $this->load->view('upload_success', $data);
            }

    }
        
    
    /**
     * undocumented function
     *
     * @return void
     **/
    public function cal_fun()
    {
        $this->load->library('upload');
        $this->tests();
    }


  
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
