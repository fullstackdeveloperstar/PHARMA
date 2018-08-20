<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class AffiliationServices extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add()
    {
    	$this->loadView('dashboard/affiliationservices/add');
    }

    public function manage()
    {
    	$this->loadView('dashboard/affiliationservices/manage');
    }

}