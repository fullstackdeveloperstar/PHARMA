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
}
?>