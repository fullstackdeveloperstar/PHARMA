<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        
        $isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		if ( isset ( $isLoggedIn ) && $isLoggedIn == TRUE) {
			redirect ( '/Dashboard/analyticsdashboard' );
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

	public function forgotpassword()
	{
		$this->load->view('login/forgotpassword');
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
                'admin_id' => $admin['id'],
                'admin_username' => $admin['admin_username']
            );
                    
            $this->session->set_userdata($sessionArray);
                    
            redirect('/Dashboard/analyticsdashboard');
		}
	}

	public function postForgotPassword()
	{
		$email = $this->input->post('email');
		$isExist = $this->login_model->isExistEmailAdmin($email);
		
		if($isExist){
			$this->load->helper('string');
        	$resetId = random_string('alnum',15);
			$resetLink = base_url()."login/resetpassword/".$resetId;
			$mail = new PHPMailer(); // create a new object
			$mail->IsSMTP(); // enable SMTP
			// $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "mail.pharmacomparison.com";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			$mail->Username = "support@pharmacomparison.com";
			$mail->Password = "43!@Ciao&-1";
			$mail->SetFrom("support@pharmacomparison.com");
			$mail->Subject = "Reset Password";

			$mail->Body = $resetLink;
			$mail->AddAddress($email);
			 if(!$mail->Send()) {
			   // return false;
			 	redirect('/login/resetfail');
			 } else {
			    // return true;
			    $this->login_model->updateResetPassword($email, $resetId);
			    redirect('/login/resetsuccess');
			 }	
		} else{
			redirect('/login/resetfail');
		}

	}

	public function resetsuccess()
	{
		$this->load->view('login/resetemailsuccess');
	}

	public function resetfail()
	{
		$this->load->view('login/resetemailfail');
	}

	public function resetpassword($resetId) {
		$isExist = $this->login_model->isExistResetId($resetId);

		$data['resetid'] = $resetId;
		$data['isexist'] = $isExist;
		$this->load->view('login/resetpassword', $data);
	}

	public function postResetPassword()
	{
		$password = $this->input->post('password');
		$resetid = $this->input->post('resetid');
		$this->login_model->resetpassword($resetid, $password);
		redirect('/login');
	}

	public function logout()
	{            
        $this->session->set_userdata('isLoggedIn', false);
	}
}
