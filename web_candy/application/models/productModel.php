<?php
class productModel extends CI_Model
{
    public function insertProduct($data)
    {
        return $this->db->insert('product', $data);
    }

    public function getAllProducts()
    {
        $query = $this->db->get('product');
        return $query->result();
    }
    public function selectProductByID($id)
    {
        $query = $this->db->get_where('product', ['id' => $id]);
        return $query->row();
    }
    public function updateProduct($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('product', $data);
    }
    public function deleteProduct($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product');
    }
}
?>