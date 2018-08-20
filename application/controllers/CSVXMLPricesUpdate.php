<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class CSVXMLPricesUpdate extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addmanagecsvxmlpricemodel()
    {
    	$this->loadView('dashboard/csvxmlpriceupdate/addmanagecsvxmlpricemodels');
    }

    public function csvbulkpricesupdate()
    {
    	$this->loadView('dashboard/csvxmlpriceupdate/csvbulkpricesupdate');
    }

}