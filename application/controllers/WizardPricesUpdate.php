<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class WizardPricesUpdate extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$this->loadView('dashboard/wizardpricesupdate/wizardpricesupdate');
    }

}