<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class Formats extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('formats_model');
    }

    public function index()
    {
    	$data['formats'] = $this->formats_model->getAll();
    	$this->loadView('dashboard/formats/formats', $data);
    }

    public function postAddNew()
    {
    	$data['name'] = $this->input->post('name');
    	$data['description'] = $this->input->post('description');
    	$data['confection_quantity_units_of_measure_id'] = 1;
    	$data['languages_id'] = 1;

    	$this->formats_model->add($data);
    	$return_data['success'] = 1;
        echo json_encode($return_data);
    }

    public function postEdit()
    {
    	$id = $this->input->post('id');
    	$data['name'] = $this->input->post('name');
    	$data['description'] = $this->input->post('description');

    	$this->formats_model->update($id, $data);
    	$return_data['success'] = 1;
        echo json_encode($return_data);	
    }

    public function deleteFormat()
    {
    	$id = $this->input->post('id');
        $this->formats_model->delete($id);
        $return_data['success'] = 1;
        echo json_encode($return_data);
    }

}