<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class UnitOfMeasure extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('confection_model');
    }

    public function confection()
    {
        $data['confections'] = $this->confection_model->getAll();
    	$this->loadView('dashboard/unitofmeasure/confection', $data);
    }

    public function ingredients()
    {
    	$this->loadView('dashboard/unitofmeasure/ingredients', []);
    }

    public function postAddNewConfection()
    {
        $data['unit_of_measure'] = $this->input->post('unit_of_measure');
        $data['language_id'] = 1;

        $this->confection_model->add($data);
        $return_data['success'] = 1;
        echo json_encode($return_data);
    }

    public function postEditConfection()
    {
        $id = $this->input->post('id');
        $data['unit_of_measure'] = $this->input->post('unit_of_measure');
        $data['language_id'] = 1;

        $this->confection_model->update($id, $data);
        $return_data['success'] = 1;
        echo json_encode($return_data);
    }

     public function deleteConfection() {
        $id = $this->input->post('id');
        $this->confection_model->delete($id);
        $return_data['success'] = 1;
        echo json_encode($return_data);
    }

}