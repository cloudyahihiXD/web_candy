<?php
class indexModel extends CI_Model
{
    public function getCategoryHome()
    {
        $query = $this->db->get('category');
        return $query->result();
    }
    public function getSubcategoryHome()
    {
        $query = $this->db->get('subcategory');
        return $query->result();
    }
    public function getAllProducts()
    {
        $query = $this->db->get('product');
        return $query->result();
    }
    // public function getCategorySubcategory($id)
    // {
    //     $query = $this->db->get('product');
    //     return $query->result();
    // }
    public function getCategoryProducts($id)
    {
        $query = $this->db->select('category.categoryName as catName, product. *, subcategory.subcategory as subcatName')
            ->from('category')
            ->join('product', 'product.categoryid=category.id')
            ->join('subcategory', 'subcategory.id = product.subcategoryid')
            ->where('product.categoryid', $id)
            ->get();
        return $query->result();
    }
    public function getSubcategoryProducts($id)
    {
        $query = $this->db->select('category.categoryName as catName, product. *, subcategory.subcategory as subcatName')
            ->from('category')
            ->join('product', 'product.categoryid=category.id')
            ->join('subcategory', 'subcategory.id = product.subcategoryid')
            ->where('product.subcategoryid', $id)
            ->get();
        return $query->result();
    }
    public function getProductDetail($id)
    {
        $query = $this->db->select('category.categoryName as catName, product. *, subcategory.subcategory as subcatName')
            ->from('category')
            ->join('product', 'product.categoryid=category.id')
            ->join('subcategory', 'subcategory.id = product.subcategoryid')
            ->where('product.id', $id)
            ->get();
        return $query->result();
    }

    public function getProductRelated($id, $categoryid)
    {
        $query = $this->db->select('category.categoryName as catName, product. *, category.id as catid')
            ->from('category')
            ->join('product', 'product.categoryid=category.id')
            ->join('subcategory', 'subcategory.id = product.subcategoryid')
            ->where_not_in('product.categoryid', $categoryid)
            ->where_not_in('product.id', $id)
            ->get();
        return $query->result();
    }

    public function getCategoryName($id)
    {
        $this->db->select('category.*');
        $this->db->from('category');
        $this->db->limit(1);
        $this->db->where('category.id', $id);
        $query = $this->db->get();

        $result = $query->row();
        return $name = $result->categoryName;
    }
    public function getSubcategoryName($id)
    {
        $this->db->select('subcategory.*');
        $this->db->from('subcategory');
        $this->db->limit(1);
        $this->db->where('subcategory.id', $id);
        $query = $this->db->get();

        $result = $query->row();
        return $name = $result->subcategory;

    }
    public function getProductName($id)
    {
        $this->db->select('product.*');
        $this->db->from('product');
        $this->db->limit(1);
        $this->db->where('product.id', $id);
        $query = $this->db->get();

        $result = $query->row();
        return $name = $result->productName;

    }

    public function getProductsByKeyword($keyword)
    {
        $query = $this->db->select('category.categoryName as catName, product. *, subcategory.subcategory as subcatName')
            ->from('category')
            ->join('product', 'product.categoryid=category.id')
            ->join('subcategory', 'subcategory.id = product.subcategoryid')
            ->like('product.productName', $keyword)
            ->get();
        return $query->result();
    }

    public function countAllProduct()
    {
        return $this->db->count_all('product');
    }
    public function countAllProductByCat($id)
    {
        $this->db->where("categoryid", $id);
        $this->db->from('product');

        return $this->db->count_all_results();
    }
    public function countAllProductBySubcat($id)
    {
        $this->db->where("subcategoryid", $id);
        $this->db->from('product');

        return $this->db->count_all_results();
    }
    public function countAllProductByKeyword($keyword)
    {
        $this->db->like("product.productName", $keyword);
        $this->db->from('product');

        return $this->db->count_all_results();
    }

    public function getIndexPagination($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('product');

        return $query->result();
    }

    public function getCatPagination($id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('category.categoryName as catName, product. *, subcategory.subcategory as subcatName')
            ->from('category')
            ->join('product', 'product.categoryid=category.id')
            ->join('subcategory', 'subcategory.id = product.subcategoryid')
            ->where('product.categoryid', $id)
            ->get();
        return $query->result();
    }

    public function getSubcatPagination($id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('category.categoryName as catName, product. *, subcategory.subcategory as subcatName')
            ->from('category')
            ->join('product', 'product.categoryid=category.id')
            ->join('subcategory', 'subcategory.id = product.subcategoryid')
            ->where('product.subcategoryid', $id)
            ->get();
        return $query->result();
    }
    public function getSearchPagination($keyword, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('category.categoryName as catName, product. *, subcategory.subcategory as subcatName')
            ->from('category')
            ->join('product', 'product.categoryid=category.id')
            ->join('subcategory', 'subcategory.id = product.subcategoryid')
            ->like('product.productName', $keyword)
            ->get();
        return $query->result();
    }
    public function getCatLetterPagination($id, $letter, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('category.categoryName as catName, product. *, subcategory.subcategory as subcatName')
            ->from('category')
            ->join('product', 'product.categoryid=category.id')
            ->join('subcategory', 'subcategory.id = product.subcategoryid')
            ->where('product.categoryid', $id)
            ->order_by('product.productName', $letter)
            ->get();
        return $query->result();
    }

    public function getCatPricePagination($id, $price, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('category.categoryName as catName, product. *, subcategory.subcategory as subcatName')
            ->from('category')
            ->join('product', 'product.categoryid=category.id')
            ->join('subcategory', 'subcategory.id = product.subcategoryid')
            ->where('product.categoryid', $id)
            ->order_by('product.productPrice', $price)
            ->get();
        return $query->result();
    }

    public function getCatPriceRangePagination($id, $from_price, $to_price, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('category.categoryName as catName, product. *, subcategory.subcategory as subcatName')
            ->from('category')
            ->join('product', 'product.categoryid=category.id')
            ->join('subcategory', 'subcategory.id = product.subcategoryid')
            ->where('product.categoryid', $id)
            ->where('product.productPrice >=' . $from_price)
            ->where('product.productPrice <=' . $to_price)
            ->order_by('product.productPrice', 'asc')
            ->get();
        return $query->result();
    }

    public function getMinProductPrice()
    {
        $this->db->select('product.*');
        $this->db->from('product');
        $this->db->select_min('productPrice');
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->productPrice;
    }

    public function getMaxProductPrice()
    {
        $this->db->select('product.*');
        $this->db->from('product');
        $this->db->select_max('productPrice');
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->productPrice;
    }

    public function ItemsCategories()
    {
        $this->db->select('product. *,category.categoryName as catName,  category.id');
        $this->db->from('category');
        $this->db->join('product', 'product.categoryid=category.id');
        $query = $this->db->get();
        $result = $query->result_array();
        // echo "<pre>";

        $newArray = array();
        foreach ($result as $key => $value) {
            $newArray[$value['catName']][] = $value;
        }
        return $newArray;
        // print_r($newArray);
    }

    public function InsertReview($data)
    {
        return $this->db->insert('productreviews', $data);
    }
    
    public function getUserById($user_id){
        $this->db->select('customer.*');
        $this->db->from('customer');
        $this->db->limit(1);
        $this->db->where('customer.id', $user_id);
        $query = $this->db->get();

        $result = $query->row();
        return $name = $result->username;
    }
}
?>