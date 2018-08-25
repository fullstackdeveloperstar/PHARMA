<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class Languages extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('languages_model');
    }

    public function index()
    {
    	$data['languages'] = $this->languages_model->getAll();

    	$this->loadView('dashboard/languages/languages',$data);
    }

    public function postAddNew() {
    	$data['name'] = $this->input->post('name');
    	$data['language_short_key'] = $this->input->post('short_key');
    	$data['enabled'] = $this->input->post('enabled');

    	$this->languages_model->add($data);
    	$return_data['success'] = 1;
    	echo json_encode($return_data);
    	
    }

    public function postEdit() {
    	$language_id = $this->input->post('id');
    	$data['name'] = $this->input->post('name');
    	$data['language_short_key'] = $this->input->post('short_key');
    	$data['enabled'] = $this->input->post('enabled');

    	$this->languages_model->update($language_id, $data);
    	$return_data['success'] = 1;
    	echo json_encode($return_data);
    }

    public function delete() {
   		$language_id = $this->input->post('id');
   		$this->languages_model->delete($language_id);
   		$return_data['success'] = 1;
    	echo json_encode($return_data);
    }

}