<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardBase extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
        // var_dump($this->session->isLoggedIn);
        // if(!$this->session->isLoggedIn){
        // 	redirect('/');
        // }

        $isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
			redirect ( 'login' );
		} 
    }

	public function loadView()
	{
		$this->load->view('dashboard/include/header');
		$this->load->view('dashboard/include/sidebar');
		$this->loadMainView();
		$this->load->view('dashboard/include/footer');
	}

	public function loadMainView()
	{
		$this->load->view('dashboard/include/main_header');
		$this->load->view('dashboard/include/main_footer');
	}

	public function logout()
	{
        // $this->session->set_userdata('isLoggedIn', false);
        $this->session->sess_destroy();
		redirect('/login');
	}

}
