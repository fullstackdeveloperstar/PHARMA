<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class ActiveIngredients extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('activeingredients_model');
    }

    public function index()
    {
    	$data['ingredients'] = $this->activeingredients_model->getAll();
    	$this->loadView('dashboard/activeingredients/activeingredients', $data);
    }

    public function postAddNew() 
    {
    	$data['name'] = $this->input->post('name');
    	$data['description'] = $this->input->post('description');
    	$data['enabled'] = $this->input->post('enabled');
    	$data['language_id'] = 1;
    	$this->activeingredients_model->add($data);
    	$return_data['success'] = 1;
    	echo json_encode($return_data);
    }

    public function postEdit() {
    	$ingredient_id = $this->input->post('id');
    	$data['name'] = $this->input->post('name');
    	$data['description'] = $this->input->post('description');
    	$data['enabled'] = $this->input->post('enabled');
    	$this->activeingredients_model->update($ingredient_id, $data);
    	$return_data['success'] = 1;
    	echo json_encode($return_data);
    }

    public function delete() {
   		$ingredient_id = $this->input->post('id');
   		$this->activeingredients_model->delete($ingredient_id);
   		$return_data['success'] = 1;
    	echo json_encode($return_data);
    }

}