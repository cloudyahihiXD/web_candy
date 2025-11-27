<?php
class userManagementModel extends CI_Model
{
    public function getAllUsers()
    {
        return $this->db->get('users')->result();
    }

    public function getAllCustomer()
    {
        return $this->db->get('customer')->result();
    }

    // public function toggleUserRole($user_id)
    // {
    //     $user = $this->db->get_where('users', array('id' => $user_id))->row();
    //     if ($user) {
    //         $new_role = ($user->role == 'admin') ? 'user' : 'admin';
    //         $this->db->where('id', $user_id);
    //         $this->db->update('users', array('role' => $new_role));
    //         return true;
    //     }
    //     return false;
    // }         
    public function deleteUser($id){
        $this->db->where('id', $id);
        $this->db->delete('users');
    }         
    public function deleteCustomer($id){
        $this->db->where('id', $id);
        $this->db->delete('customer');
    }
    
}
?>