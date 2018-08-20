<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
    public $table_name = "admin";
    function login($email, $password)
    {
        $this->db->where('admin_email', $email);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) == 1)
        {
            $admin = $result[0];
            
            if(verifyHashedPassword($password, $admin['admin_password'])){
                return $admin;
            }else {
                return false;
            }
        } else {
            return false;
        }

    }

    function isExistEmailAdmin($email){
        $this->db->where('admin_email', $email);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        if(count($result) == 1) {
            return true;
        } else {
            return false;
        }
    }

    function updateResetPassword($email, $resetid)
    {
        $this->db->where('admin_email', $email);
        $this->db->set('resetid', $resetid);
        $this->db->update($this->table_name);
    }

    function isExistResetId($resetId)
    {
        $this->db->where('resetid', $resetId);
        $query = $this->db->get($this->table_name);
        $result = $query->result_array();
        if(count($result) == 1) {
            return true;
        } else {
            return false;
        }
    }

    function resetpassword($resetid, $password) {
        $this->db->where('resetid', $resetid);
        $password = getHashedPassword($password);
        $this->db->set('admin_password', $password);
        $this->db->set('resetid', '');
        $this->db->update($this->table_name);
    }
}
?>