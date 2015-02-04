<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('user','',TRUE);
 	}

	public function index()
	{
		$this->load->helper(array('form'));
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('login');
		$this->load->view('footer');
	}

	function verifylogin()
	 {
	   //This method will have the credentials validation
	   $this->load->library('form_validation');
	 
	   $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	 
	   if($this->form_validation->run() == FALSE)
	   {
	     //Field validation failed.  User redirected to login page
	     $this->load->view('login');
	   }
	   else
	   {
	     //Go to private area
	     redirect('admin', 'refresh');
	   }
	 
	 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $phone = $this->input->post('phone');
 
   //query the database
   $result = $this->user->login($phone, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'phone' => $row->phone,
         'user_role' => $row->role_id
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}