<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Languages_model extends CI_Model
{
    public $table_name = "languages";

    function getAll() {
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) > 0) {
            return $result;
        } else {
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