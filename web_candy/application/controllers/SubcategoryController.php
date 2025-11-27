<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubcategoryController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('categoryModel');
        $this->load->model('subcategoryModel');
    }
    public function checkLogin(){
        if(! $this->session->userdata('LoggedIn')){
            redirect(base_url('/login'));
        }
	}
	public function index()
	{ 
        $this->checkLogin();
        $data['categories'] = $this->categoryModel->getAllCategories();
        $data['subcategories'] = $this->subcategoryModel->getAllSubcategories();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
        $this->load->view('subcategory/list', $data);
		$this->load->view('admin_template/footer');
	}
    public function create()
	{ 
        $this->checkLogin();
        $data['categories'] = $this->categoryModel->getAllCategories();
        $data['subcategory_id'] = $this->input->post('subcategory');
        $data['subcategory_name'] = $this->input->post('subcategory_name');
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->view('subcategory/create', $data); 
        $this->load->view('admin_template/footer');
	}
    public function store()
	{ 
		$this->form_validation->set_rules('category', 'Category', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('subcategory', 'Subcategory', 'trim|required', ['required' => 'You must provide a %s.']);
		if ($this->form_validation->run() == true){
            $data = [
				'categoryid' => $this->input->post('category'),
				'subcategory' => $this->input->post('subcategory'),
			];
			$this->load->model('subcategoryModel');
			$this->subcategoryModel->insertSubcategory($data);
			$this->session->set_flashdata('success','Add success sub category');
			redirect(base_url('subcategory/create'));
		}else{
			$this->create();
		}
	}
	public function edit($id){
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
        $data['subcategories'] = $this->subcategoryModel->selectSubcategoriesByID($id);
		$data['categories'] = $this->categoryModel->getAllCategories();
        $this->load->view('subcategory/edit', $data);
		$this->load->view('admin_template/footer');
	}

	public function update($id){
		$this->form_validation->set_rules('category', 'Category', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('subcategory', 'Subcategory', 'trim|required', ['required' => 'You must provide a %s.']);
		if ($this->form_validation->run() == true){
            $data = [
				'categoryid' => $this->input->post('category'),
				'subcategory' => $this->input->post('subcategory'),
			];
			$this->load->model('subcategoryModel');
			$this->subcategoryModel->updateSubcategory($id, $data);
			$this->session->set_flashdata('success','Update success sub category');
			redirect(base_url('subcategory/list'));
		}else{
			$this->edit($id);
		}
	}

	public function delete($id){
		$this->subcategoryModel->deleteSubcategory($id);
        redirect(base_url('subcategory/list'));
	}
}
