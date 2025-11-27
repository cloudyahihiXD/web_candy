<?php
class loginModel extends CI_Model
{
    public function checkLogin($email, $password)
    {
        $query = $this->db->where("email", $email)->where("password", $password)->get("users");
        return $query->result();
    }
    public function checkLoginCustomer($email, $password)
    {
        $query = $this->db->where("email", $email)->where("password", $password)->get("customer");
        return $query->result();
    }

    public function NewCustomer($data)
    {
        $this->db->insert('customer', $data);
        return $ship_id = $this->db->insert_id();
    }
    public function getUserInfo($user_id)
    {
        $query = $this->db->where('id', $user_id)->get('customer');
        return $query->row_array();
    }
    public function insertOrder($order_data)
    {
        return $this->db->insert('order', $order_data);
    }
    
    public function RegisterAdmin($data){
        return $this->db->insert('users' ,$data);
    }
}
?>