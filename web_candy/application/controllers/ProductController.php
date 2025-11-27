<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('categoryModel');
        $this->load->model('subcategoryModel');
        $this->load->model('productModel');
    }
    public function checkLogin()
    {
        if (!$this->session->userdata('LoggedIn')) {
            redirect(base_url('/login'));
        }
    }
    public function index()
    {
        $this->checkLogin();
        $data['categories'] = $this->categoryModel->getAllCategories();
        $data['subcategories'] = $this->subcategoryModel->getAllSubcategories();
        $data['products'] = $this->productModel->getAllProducts();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->view('product/list', $data);
        $this->load->view('admin_template/footer');
    }
    public function create()
    {
        $this->checkLogin();
        $data['categories'] = $this->categoryModel->getAllCategories();
        $data['subcategories'] = [];
        $category_id = $this->input->post('category');
        if ($category_id) {
            // If category is selected, fetch subcategories based on the category ID
            $data['subcategories'] = $this->subcategoryModel->getSubcategoriesByCategory($category_id);
            // }
            // if ($category_id) {
            //     $data['subcategories'] = $this->subcategoryModel->getSubcategoriesByCategory($category_id);
        } else {
            // If no category is selected, fetch all subcategories
            $data['subcategories'] = $this->subcategoryModel->getAllSubcategories();
        }
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->view('product/create', $data);
        $this->load->view('admin_template/footer');
    }
    // public function getSubcategories($categoryId)
    // {
    //     $this->checkLogin();
    //     $data['categories'] = $this->categoryModel->getAllCategories();
    //     $data['subcategories'] = [];
    //     $category_id = $this->input->post('category');
    //     if ($category_id) {
    //         $data['subcategories'] = $this->subcategoryModel->getSubcategoriesByCategory($category_id);
    //     } else {
    //         // If no category is selected, fetch all subcategories
    //         $data['subcategories'] = $this->subcategoryModel->getAllSubcategories();
    //     }
    //     $this->load->view('admin_template/header');
    //     $this->load->view('admin_template/navbar');
    //     $this->load->view('product/create', $data);
    //     $this->load->view('admin_template/footer');
    // }
    public function store()
    {
        $this->form_validation->set_rules('productName', 'ProductName', 'trim|required', ['required' => 'You must provide a %s.']);
        $this->form_validation->set_rules('productCompany', 'ProductCompany', 'trim|required', ['required' => 'You must provide a %s.']);
        $this->form_validation->set_rules('productprice', 'Productprice', 'trim|required', ['required' => 'You must provide a %s.']);

        if ($this->form_validation->run() == true) {
            $config['upload_path'] = './uploads/products';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            // Load upload library with the first configuration
            $this->load->library('upload', $config);

            $data = array(
                'categoryid' => $this->input->post('category'),
                'subcategoryid' => $this->input->post('subcategory'),
                'productName' => $this->input->post('productName'),
                'productCompany' => $this->input->post('productCompany'),
                'productPrice' => $this->input->post('productprice'),
                'productDescription' => $this->input->post('productDescription'),
                'productAvailability' => $this->input->post('productAvailability'),
            );

            // Upload the first image
            if ($this->upload->do_upload('productimage1')) {
                $upload_data = $this->upload->data();
                $data['productimage1'] = $upload_data['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                // Handle the error if upload fails
                // You can customize this part according to your needs
            }

            // Upload the second image
            if ($this->upload->do_upload('productimage2')) {
                $upload_data = $this->upload->data();
                $data['productimage2'] = $upload_data['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                // Handle the error if upload fails
            }

            // Upload the third image
            if ($this->upload->do_upload('productimage3')) {
                $upload_data = $this->upload->data();
                $data['productimage3'] = $upload_data['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                // Handle the error if upload fails
            }

            // Insert the product data into the database
            $this->productModel->insertProduct($data);
            $this->session->set_flashdata('success', 'Add success product');
            redirect(base_url('product/create'));
        } else {
            // Form validation failed, load the create view again
            $this->create();
        }
    }

    public function edit($id)
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $data['products'] = $this->productModel->selectProductByID($id);
        $data['subcategories'] = $this->subcategoryModel->getAllSubcategories();
        $data['categories'] = $this->categoryModel->getAllCategories();
        $this->load->view('product/edit', $data);
        $this->load->view('admin_template/footer');
    }
    public function update($id){
        $this->form_validation->set_rules('productName', 'ProductName', 'trim|required', ['required' => 'You must provide a %s.']);
        $this->form_validation->set_rules('productCompany', 'ProductCompany', 'trim|required', ['required' => 'You must provide a %s.']);
        $this->form_validation->set_rules('productprice', 'Productprice', 'trim|required', ['required' => 'You must provide a %s.']);

        if ($this->form_validation->run() == true) {
            $config['upload_path'] = './uploads/products';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            // Load upload library with the first configuration
            $this->load->library('upload', $config);

            $data = array(
                'categoryid' => $this->input->post('category'),
                'subcategoryid' => $this->input->post('subcategory'),
                'productName' => $this->input->post('productName'),
                'productCompany' => $this->input->post('productCompany'),
                'productPrice' => $this->input->post('productprice'),
                'productDescription' => $this->input->post('productDescription'),
                'productAvailability' => $this->input->post('productAvailability'),
            );

            // Upload the first image
            if ($this->upload->do_upload('productimage1')) {
                $upload_data = $this->upload->data();
                $data['productimage1'] = $upload_data['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
            }

            // Upload the second image
            if ($this->upload->do_upload('productimage2')) {
                $upload_data = $this->upload->data();
                $data['productimage2'] = $upload_data['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                // Handle the error if upload fails
            }

            // Upload the third image
            if ($this->upload->do_upload('productimage3')) {
                $upload_data = $this->upload->data();
                $data['productimage3'] = $upload_data['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                // Handle the error if upload fails
            }

            // Insert the product data into the database
            $this->productModel->updateProduct($id, $data);
            $this->session->set_flashdata('success', 'Update success product');
            redirect(base_url('product/list'));
        } else {
            // Form validation failed, load the create view again
            $this->edit($id);
        }
    }

    public function delete($id){
		$this->productModel->deleteProduct($id);
        redirect(base_url('product/list'));

    }
}
?>