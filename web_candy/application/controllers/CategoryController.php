<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('categoryModel');
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
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
        $this->load->view('category/list', $data);
		$this->load->view('admin_template/footer');
	}
    public function create()
	{ 
        $this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('category/create');
		$this->load->view('admin_template/footer');
	}
    public function store()
	{ 
		$this->form_validation->set_rules('category', 'Category', 'trim|required', ['required' => 'You must provide a %s.']);
		if ($this->form_validation->run() == true){
			$data = [
				'categoryName' => $this->input->post('category'),
				'categoryDescription' => $this->input->post('description'),
			];
			$this->load->model('categoryModel');
			$this->categoryModel->insertCategory($data);
			$this->session->set_flashdata('success','Add success category');
			redirect(base_url('category/create'));
		}else{
			$this->create();
		}
	}

	public function edit($id){
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
        $data['categories'] = $this->categoryModel->selectCategoryByID($id);
		$this->load->view('category/edit', $data);
		$this->load->view('admin_template/footer');
	}

	public function update($id){
		$this->form_validation->set_rules('category', 'Category', 'trim|required', ['required' => 'You must provide a %s.']);
		if ($this->form_validation->run() == true){
			$data = [
				'categoryName' => $this->input->post('category'),
				'categoryDescription' => $this->input->post('description'),
			];
			$this->load->model('categoryModel');
			$this->categoryModel->updateCategory($id, $data);
			$this->session->set_flashdata('success','Update success category');
			redirect(base_url('category/list'));
		}else{
			$this->edit($id);
		}
	}
	public function delete($id){
		$this->categoryModel->deleteCategory($id);
		$this->session->set_flashdata('success', 'Category deleted successfully');
		redirect(base_url('category/list'));
	}	
}
