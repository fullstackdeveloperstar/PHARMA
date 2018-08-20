<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class Administrators extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addanadministrator()
    {
    	$this->loadView('dashboard/administrators/addanadministrator');
    }

    public function manageadministrators()
    {
    	$this->loadView('dashboard/administrators/manageadministrators');
    }

}