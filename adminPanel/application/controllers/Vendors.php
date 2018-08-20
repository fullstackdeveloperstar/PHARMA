<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class Vendors extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addnewvendor()
    {
    	$this->loadView('dashboard/vendors/addnewvendor');
    }

    public function managevendors()
    {
    	$this->loadView('dashboard/vendors/managevendors');
    }

}