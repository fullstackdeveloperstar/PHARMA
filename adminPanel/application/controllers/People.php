<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class People extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addaperson()
    {
    	$this->loadView('dashboard/people/addaperson');
    }

    public function managepeople()
    {
    	$this->loadView('dashboard/people/managepeople');
    }

}