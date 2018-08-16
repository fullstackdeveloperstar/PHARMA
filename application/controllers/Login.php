<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        // if($this->session->isLoggedIn){
        // 	redirect('/dashboardbase/loadView');
        // }
        $isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		if ( isset ( $isLoggedIn ) && $isLoggedIn == TRUE) {
			redirect ( '/dashboardbase/loadView' );
		} 
    }


	public function index()
	{
		$this->load->view('login/login');
	}

	public function register()
	{
		$this->load->view('login/register');	
	}

	public function postLogin() 
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$admin = $this->login_model->login($email, $password);

		if(!$admin)
		{
			redirect('/login');
		} else {
			$sessionArray = array(
                'isLoggedIn' => TRUE,
                'admin_id' => $admin['id']
            );
                    
            $this->session->set_userdata($sessionArray);
                    
            redirect('/dashboardbase/loadView');
		}
	}

	public function logout()
	{
		// $this->session->sess_destroy();
		// $sessionArray = array(
  //           'isLoggedIn' => false,
  //       );
                    
        $this->session->set_userdata('isLoggedIn', false);
                        
		// redirect('/login');
	}
}
