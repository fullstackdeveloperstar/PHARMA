<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Location_model extends CI_Model
{
    public $table_name = "vendor_office_locations";

    function getAll() {
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) > 0) {
            return $result[0];
        }
        else {
            return false;
        }
    }

    function getWhere($data) {
        $this->db->where($data);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) > 0) {
            return $result;
        }
        else {
            return [];
        }
    }

    function add($data) {
        $this->db->insert($this->table_name, $data);
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
    }
}
?>