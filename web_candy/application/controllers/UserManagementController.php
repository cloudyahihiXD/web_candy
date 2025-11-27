<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserManagementController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('userManagementModel');
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
        $data['users'] = $this->userManagementModel->getAllUsers();
        $data['customer'] = $this->userManagementModel->getAllCustomer();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->view('user_management/index', $data);
        $this->load->view('admin_template/footer');
    }

    // public function changeRole($user_id)
    // {
    //     $this->userManagementModel->toggleUserRole($user_id);
    //     redirect('user_management');
    // }
    public function user_delete($id){
		$this->userManagementModel->deleteUser($id);
		$this->session->set_flashdata('success', 'User deleted successfully');
		redirect(base_url('user_management'));
	}	
    public function customer_delete($id){
		$this->userManagementModel->deleteCustomer($id);
		$this->session->set_flashdata('success', 'Customer deleted successfully');
		redirect(base_url('user_management'));
	}	

}
?>