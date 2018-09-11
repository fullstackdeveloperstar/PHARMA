<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class Drugs extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('drugs_model');
        $this->load->model('languages_model');
    }

    public function index()
    {
    	$data['drugs'] = $this->drugs_model->getAll();
    	$data['languages'] = $this->languages_model->getAll();

    	$this->loadView('dashboard/drugs/drugs', $data);
    }

    public function postAddNew() {
    	$data = $this->input->post();
    	$this->drugs_model->add($data);
    	$return_data['success'] = 1;
        echo json_encode($return_data);
    }

    public function postEdit() {
    	$data = $this->input->post();
    	$id = $this->input->post('id');
    	$this->drugs_model->update($id, $data);
    	$return_data['success'] = 1;
        echo json_encode($return_data);	
    }

    public function deleteDrug() {
    	$id = $this->input->post('id');
    	$this->drugs_model->delete($id);
    	$return_data['success'] = 1;
        echo json_encode($return_data);		
    }

}