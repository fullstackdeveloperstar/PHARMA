<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class Dashboard extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function analyticsdashboard()
    {
    	$this->loadView('dashboard/dashboard/analyticsdashboard');
    }

    public function admindashboard()
    {
    	$this->loadView('dashboard/dashboard/admindashboard');	
    }
}