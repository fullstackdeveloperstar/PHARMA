<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
    public $table_name = "admin";
    function login($email, $password)
    {
        $this->db->where('admin_email', $email);
        // $this->db->where('admin_password', getHashedPassword($password));

        $query = $this->db->get($this->table_name);
        $result = $query->result_array();

        // echo verifyHashedPassword($password, $user[0]->password)
        // var_dump($result);

        if(count($result) == 1)
        {
            $admin = $result[0];
            // var_dump($admin);
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