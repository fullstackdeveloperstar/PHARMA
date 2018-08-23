<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class Currencies extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('currencies_model');
    }

    public function index()
    {
    	$data['currencies'] = $this->currencies_model->getAllCurrencies();
    	$this->loadView('dashboard/currencies/currencies', $data);
    }

    public function postAddNew() 
    {
    	$data['name'] = $this->input->post('name');
    	$data['short_key'] = $this->input->post('short_key');
    	$data['symbol'] = $this->input->post('symbol');
    	$data['enabled'] = $this->input->post('enabled');
    	$data['languages_id'] = 1;

    	$this->currencies_model->addNewCurrency($data);
    	$return_data['success'] = 1;
    	echo json_encode($return_data);
    }

    public function postEdit() {
    	$currency_id = $this->input->post('id');
    	$data['name'] = $this->input->post('name');
    	$data['short_key'] = $this->input->post('short_key');
    	$data['symbol'] = $this->input->post('symbol');
    	$data['enabled'] = $this->input->post('enabled');
    	$data['languages_id'] = 1;

    	$this->currencies_model->update($currency_id, $data);
    	$return_data['success'] = 1;
    	echo json_encode($return_data);
    }

    public function delete() {
   		$currency_id = $this->input->post('id');
   		$this->currencies_model->delete($currency_id);
   		$return_data['success'] = 1;
    	echo json_encode($return_data);
    }

}