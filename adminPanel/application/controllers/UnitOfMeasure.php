<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class UnitOfMeasure extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function confection()
    {
    	$this->loadView('dashboard/unitofmeasure/confection');
    }

    public function ingredients()
    {
    	$this->loadView('dashboard/unitofmeasure/ingredients');
    }

}