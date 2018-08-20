<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public $table_name = "admin";
    
    function getActiveAdmin($id) {
        $this->db->where('id', $id);
        $this->db->where('active', 1);

        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) == 1) {
            return $result[0];
        } else {
            return false;
        }
    }
}
?>