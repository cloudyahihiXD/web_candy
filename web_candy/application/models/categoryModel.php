<?php
    class categoryModel extends CI_Model{
        public function insertCategory($data){
            return $this->db->insert('category' ,$data);
        }
        public function getAllCategories() {
            $query = $this->db->get('category');
            return $query->result(); 
        }
        public function selectCategoryByID($id) {
            $query = $this->db->get_where('category', ['id'=> $id]);
            return $query->row();
        }
        public function updateCategory($id, $data){
            $this->db->where('id', $id);
            $this->db->update('category', $data);
        }                
        public function deleteCategory($id){
            $this->db->where('id', $id);
            $this->db->delete('category');
        }
    }

?>