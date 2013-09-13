<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model  extends MY_Model {


	public function __construct()
	{
		parent::__construct();
		
	}
	
	/**
	 * form vaildation
	 *
	 * @return true or false
	 **/

	/**
	 * verifies the user login  
	 * @param  string $username [valid user email which was registered]
	 * @param  string $password [user password]
	 * @return [type]           [description]
	 */
	public function login()
	{

		$this->form_validation->set_rules('username','Email-ID','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		
			if($this->form_validation->run()==FALSE){
				return FALSE;
			}

	}


	/**
	 * [authenticates the user by email,password and sets the session if user is valid]
	 * @param  [string] $username [valid email address of the user]
	 * @param  [string] $password [valid encrypted password]
	 * @return [boolean]        [returns true if success else return false]
	 */
	public function auth_user($username,$password)
	{

		$this->db->where('email =',$username);
		$this->db->where('password =', $password);
		$res = $this->db->get('user');
		   //$res = $this->db->query('select * from user where username = "' . $username .'" AND password = "' . $password . '"');
		if($res->num_rows()>0)
		{
			$row = $res->row();
			$userid=$row->id;
			$firstname = $row->firstname;
			$lastname = $row->lastname;
			$email = $row->email;	
			$userloggedin = array(
				'userloggedin'=>true,
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
		$this->form_validation->set_rules('email','Email-ID','trim|required|valid_email|is_unique[user.email]|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]|max_length[30]|matches[passconf]|xss_clean');
		$this->form_validation->set_rules('passconf','Password','trim|required|xss_clean');
		
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

	/**
	 * undocumented function
	 *
	 * @return void
	 **/
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

	/**
	 * undocumented function
	 *
	 * @return void
	 **/
	public function tempuser($data)
	{
		if($this->db->insert('tempuser',$data))
		{
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$address=$data['email']; 
			$name=$data['firstname'].' '.$data['lastname'];
			$key=$data['salt'];
			$this->email->to($address);
			$this->email->from('info@domainindia.biz');
			$this->email->subject('Activate your account '.$name);
			// email message
$str=<<<EOF
&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;698&quot; align=&quot;center&quot; style=&quot;border:1px solid #eeeeee&quot;&gt;
  &lt;tbody&gt;&lt;tr valign=&quot;top&quot;&gt;
  &lt;td&gt;&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;698&quot;&gt;<br>
  &lt;tbody&gt;&lt;tr valign=&quot;top&quot;&gt;<br>
  &lt;td&gt;&amp;nbsp;&lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr valign=&quot;top&quot;&gt;
  &lt;td&gt;&lt;table width=&quot;670&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; style=&quot;margin-left:14px&quot;&gt;
  &lt;tbody&gt;&lt;tr&gt;
  &lt;td style=&quot;border-left:1px solid #bac1c8;border-right:1px solid #bac1c8;padding:0 0 23px 0;font-size:12px;line-height:18px;font-family:Arial;color:#222222;padding:0px 24px 18px 24px&quot;&gt;
&lt;p style=&quot;font-size:16px;line-height:18px;color:#222222;border-bottom:1px solid #373d44;width:100%;margin:0;padding:0 0 10px 0;font-weight:bold&quot;&gt;Welcome to Hobhubs Services.&lt;/p&gt;
  &lt;br&gt;
  Dear , $name.&lt;br&gt;
  &lt;br&gt;
  Please click the button below to use Hobhubs services.&lt;br&gt;&lt;br&gt;
  &lt;br&gt;
  &lt;p style=&quot;text-align:center;margin:0;padding:0&quot;&gt; &lt;b style=&quot;border:2px solid #4070a6;background-color:#3c79b7;padding:5px 17px 7px 17px&quot;&gt;&lt;a href=&quot;http:/domainindia.biz/hub/user/key/$key &quot; style=&quot;font-weight:bold;text-decoration:none;font-size:12px;color:#ffffff&quot; target=&quot;_blank&quot;&gt;Account Verification&lt;/a&gt;&lt;/b&gt;&lt;/p&gt;
  &lt;br&gt;
  &lt;br&gt;
  &lt;p style=&quot;padding:0;margin:0 0 6px 0;font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#222222;line-height:18px&quot;&gt;&lt;b&gt;If the link above doesn't work, copy and paste the address below into a new browser window.&lt;/b&gt;&lt;/p&gt;&lt;br&gt;
  &lt;p style=&quot;padding:7px 10px 8px 10px;margin:0;display:block;background-color:#eeeeee;color:#245498;font-weight:normal;text-decoration:underline;font-size:12px;font-family:Arial,Helvetica,sans-serif;line-height:18px&quot;&gt;&lt;b style=&quot;color:#245498;text-decoration:none;font-weight:normal&quot;&gt;&lt;a href=&quot;http:/domainindia.biz/hub/user/key/$key &quot; target=&quot;_blank&quot;&gt;http:/hobhubs.com/&lt;wbr&gt;user/key/$key &lt;/a&gt;&lt;/b&gt;&lt;/p&gt;
  &lt;br&gt;
  &lt;br&gt;
  &lt;b&gt;Don't have a Hobhubs account?&lt;/b&gt;&lt;br&gt;
  Another user may have entered the wrong email address by mistake. If you are not the intended recipient of this email, please disregard it.&lt;br&gt;If you want to use Hobhubs services, you must confirm. &lt;br&gt;
&lt;br&gt;
  &lt;b&gt;Need help?&lt;/b&gt;&lt;br&gt;
  This is a &quot;no-reply&quot; email address so you'll be unable to reply to it. For member registration and logon queries, please go to this website using the link: &lt;b style=&quot;color:#245498;text-decoration:none;font-weight:normal&quot;&gt;&lt;a href=&quot;http://help.hobhubs.com&quot; target=&quot;_blank&quot;&gt;http://help.hobhubs.&lt;wbr&gt;com&lt;/a&gt;&lt;/b&gt;&lt;br&gt;
&lt;br&gt;
  &lt;p style=&quot;padding:0;margin:0;font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#222222;line-height:18px&quot;&gt; Kind regards,&lt;br&gt;Hobhubs account team
  &lt;/p&gt;&lt;br&gt;&lt;br&gt;
  &lt;/td&gt;
  &lt;/tr&gt;
  &lt;/tbody&gt;&lt;/table&gt;
  &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
  &lt;td&gt;&amp;nbsp;&lt;/td&gt;
  &lt;/tr&gt;
  &lt;/tbody&gt;&lt;/table&gt;
  &lt;/td&gt;
  &lt;/tr&gt;
  &lt;/tbody&gt;&lt;/table&gt;



EOF;
 $mesaage=html_entity_decode($str);
			$this->email->message($mesaage);
			if($this->email->send())
			{ 
			return $address; 
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

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */