<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardBase extends CI_Controller {

	public $admin;

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        
        $isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
			redirect ( 'login' );
		} 

		$admin_id = $this->session->userdata('admin_id');
		$this->admin = $this->admin_model->getActiveAdmin($admin_id);
		// var_dump($this->admin);
		if(!$this->admin) {
			$this->logout();
		}
    }

	public function loadView($view)
	{
		$this->load->view('dashboard/include/header');
		$this->load->view('dashboard/include/sidebar');
		$this->loadMainView($view);
		$this->load->view('dashboard/include/footer');
	}

	public function loadMainView($view)
	{
		$this->load->view('dashboard/include/main_header');
		$this->load->view($view);
		$this->load->view('dashboard/include/main_footer');
	}

	public function logout()
	{
        $this->session->sess_destroy();
		redirect('/login');
	}

}
