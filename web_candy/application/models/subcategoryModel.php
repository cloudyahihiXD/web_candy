<?php
class subcategoryModel extends CI_Model
{
    public function insertSubcategory($data)
    {
        return $this->db->insert('subcategory', $data);
    }
    
    public function getAllSubcategories(){
        $query = $this->db->get('subcategory');
        return $query->result(); 
    }

    public function selectSubcategoriesByID($id){
        $query = $this->db->get_where('subcategory',['id'=> $id]);
        return $query->row();
    }

     public function selectSubcategoriesByCategory($category_id) 
    {
        return $this->db->get_where('subcategory', array('categoryid' => $category_id))->result_array();
    }    

    public function updateSubcategory($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('subcategory', $data);
    }

    public function deleteSubcategory($id)
    {
        return $this->db->delete('subcategory', array('id' => $id));
    }
}
?>