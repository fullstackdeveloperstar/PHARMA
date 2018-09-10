<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class Vendors extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('languages_model');
        $this->load->model('currencies_model');
        $this->load->model('external_affiliation_services_model');
        $this->load->model('vendor_model');
        $this->load->model('people_model');
        $this->load->model('location_model');
    }

    public function addnewvendor()
    {
        $data['languages'] = $this->languages_model->getAll();
        $data['currencies'] = $this->currencies_model->getAllCurrencies();
        $data['external_affiliation_services'] = $this->external_affiliation_services_model->getAll();
    	$this->loadView('dashboard/vendors/addnewvendor', $data);
    }

    public function managevendors()
    {
        $data['vendors'] = $this->vendor_model->getAll();
        $data['currencies'] = $this->currencies_model->getAllCurrencies();
        $data['external_affiliation_services'] = $this->external_affiliation_services_model->getAll();
        $data['languages'] = $this->languages_model->getAll();
    	$this->loadView('dashboard/vendors/managevendors', $data);
    }

    public function editvendor($vendorid) {
        $vendor = $this->vendor_model->get($vendorid);
        if(!$vendor) {
            redirect('/Vendors/managevendors');
        }
        $data['vendor'] = $vendor;
        $data['languages'] = $this->languages_model->getAll();
        $data['currencies'] = $this->currencies_model->getAllCurrencies();
        $data['external_affiliation_services'] = $this->external_affiliation_services_model->getAll();
        $this->loadView('dashboard/vendors/editvendor', $data);
    }

    public function locations($vendorid) {
        $vendor = $this->vendor_model->get($vendorid);
        if(!$vendor) {
            redirect('/Vendors/managevendors');
        }
        $data['vendor'] = $vendor;
        $data['languages'] = $this->languages_model->getAll();
        $data['currencies'] = $this->currencies_model->getAllCurrencies();
        $data['peoples'] = $this->people_model->getAll();
        $whereData['vendors_id'] = $vendorid;
        $data['locations'] = $this->location_model->getWhere($whereData);
        $this->loadView('dashboard/vendors/locations', $data);
    }

    public function addnewlocation($vendorid) {
        $vendor = $this->vendor_model->get($vendorid);
        if(!$vendor) {
            redirect('/Vendors/managevendors');
        }
        $data['vendor'] = $vendor;
        $data['languages'] = $this->languages_model->getAll();
        $data['currencies'] = $this->currencies_model->getAllCurrencies();
        $data['peoples'] = $this->people_model->getAll();
        $this->loadView('dashboard/vendors/addnewlocation', $data);
    }

    public function editlocation($vendorid, $locationid) {
        $vendor = $this->vendor_model->get($vendorid);
        if(!$vendor) {
            redirect('/Vendors/managevendors');
        }
        $location = $this->location_model->get($locationid);
        if(!$location) {
            redirect('/Vendors/locations/'.$vendor['id']);
        }

        $data['vendor'] = $vendor;
        $data['location'] = $location;
        $data['languages'] = $this->languages_model->getAll();
        $data['currencies'] = $this->currencies_model->getAllCurrencies();
        $data['peoples'] = $this->people_model->getAll();
        $this->loadView('dashboard/vendors/editlocation', $data);
    }

    public function view($vendorid) {
        $vendor = $this->vendor_model->get($vendorid);
        if(!$vendor) {
            redirect('/Vendors/managevendors');
        }
         $data['vendor'] = $vendor;
        $data['languages'] = $this->languages_model->getAll();
        $data['currencies'] = $this->currencies_model->getAllCurrencies();
        $data['peoples'] = $this->people_model->getAll();
        $whereData['vendors_id'] = $vendorid;
        $data['locations'] = $this->location_model->getWhere($whereData);
        $data['external_affiliation_services'] = $this->external_affiliation_services_model->getAll();
        $this->loadView('dashboard/vendors/view', $data);
    }

    public function postAddNewVendor() {
        $data['vendor_name'] = $this->input->post('vendorname');
        $data['vendor_web_site_url'] = $this->input->post('vendor_website_url');
        $data['default_currencies_id'] = $this->input->post('default_currency');
        // $data['pharmacomparison_affiliation_service'] = $this->input->post('pharmacomparison_affiliation_service');
        $data['affiliation_category'] = $this->input->post('affiliation_category');
        $data['affiliation_vendor_id'] = $this->input->post('affiliation_vendor_id');
        $data['external_affiliation_services_id'] = $this->input->post('external_affiliation_service');
        $data['remark'] = $this->input->post('remark');
        $data['languages_id'] = $this->input->post('language');
        $this->vendor_model->add($data);
        redirect('/Vendors/managevendors');
    }

    public function postAddNewLocation() {
        $data = $this->input->post();

        $this->location_model->add($data);

        redirect('/Vendors/locations/'.$data['vendors_id']);
    }

    public function postEditLocation($vendorid, $locationid) {
        $vendor = $this->vendor_model->get($vendorid);
        if(!$vendor) {
            redirect('/Vendors/managevendors');
        }
        $location = $this->location_model->get($locationid);
        if(!$location) {
            redirect('/Vendors/locations/'.$vendor['id']);
        }

        $data = $this->input->post();
        $this->location_model->update($locationid, $data);
        // echo json_encode($data);
        redirect('/Vendors/editlocation/'.$vendorid.'/'.$locationid);
    }

    public function postEidtVendor($vendorid){
        $vendor = $this->vendor_model->get($vendorid);
        if(!$vendor) {
            redirect('/Vendors/managevendors');
        }

        $data = $this->input->post();
        $this->vendor_model->update($vendorid, $data);
        redirect('/Vendors/editvendor/'.$vendorid);
    }

    public function deleteVendor() {
        $id = $this->input->post('id');
        $this->vendor_model->delete($id);
        $return_data['success'] = 1;
        echo json_encode($return_data);
    }

    public function deleteLocation() {
        $id = $this->input->post('id');
        $this->location_model->delete($id);
        $return_data['success'] = 1;
        echo json_encode($return_data);   
    }

}