<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require  'DashboardBase.php';
class Products extends DashboardBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addnewproduct()
    {
    	$this->loadView('dashboard/products/addnewproduct');
    }

    public function manageproducts()
    {
    	$this->loadView('dashboard/products/manageproducts');
    }

}