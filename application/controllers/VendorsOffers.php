<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class VendorsOffers extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addnewoffer()
    {
    	$this->loadView('dashboard/vendorsoffers/addnewoffer');
    }

    public function manageoffers()
    {
    	$this->loadView('dashboard/vendorsoffers/manageoffers');
    }
}