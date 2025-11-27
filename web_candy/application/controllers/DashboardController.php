<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('dashboardModel');
    }
    public function checkLogin(){
        if(! $this->session->userdata('LoggedIn')){
            redirect(base_url('/login'));
        }
	}
	public function index()
	{ 
        $this->checkLogin();
        $this->load->model('userManagementModel');
        $this->load->model('productModel');

        $data['orders'] = $this->dashboardModel->getOrders();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
        $this->load->view('dashboard/index', $data);
		$this->load->view('admin_template/footer');
	}

    public function logout(){
        $this->checkLogin();
        $this->session->unset_userdata('LoggedIn');
        $this->session->set_flashdata('message', 'Logout successfully');
        redirect(base_url('/login'));
    }
    public function changeStatus($order_id)
    {
        $this->dashboardModel->toggleOrderStatus($order_id);
        redirect('dashboard');
    }    
    public function delete($id){
		$this->dashboardModel->deleteOrder($id);
		$this->session->set_flashdata('success', 'Order deleted successfully');
		redirect(base_url('dashboard'));
	}	
}
