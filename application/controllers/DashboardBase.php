<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardBase extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
        if(!$this->session->isLoggedIn){
        	redirect('/');
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

}
