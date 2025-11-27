<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

	public function __contructs()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('login/index');
		$this->load->view('template/footer');
	}

	public function register_admin(){
		$this->load->view('template/header');
		$this->load->view('register_admin/index');
		$this->load->view('template/footer');
	}

	public function register_insert(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'You must provide a %s.']);

		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$this->load->model('loginModel');
			$data = [
				'username' => $username,
				'password' => $password,
				'role' => 'admin',
				'email' => $email,
			];
			$result =$this->loginModel->RegisterAdmin($data);

			if ($result) {
				$this->session->set_flashdata('success', 'Register successfully');
				redirect(base_url('/register-admin'));
			} else {
				$this->session->set_flashdata('error', 'Register failed');
				redirect(base_url('register-admin'));
			}
		} else {
			$this->index();
		}
	}
	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'You must provide a %s.']);

		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$this->load->model('loginModel');
			$result = $this->loginModel->checkLogin($email, $password);
			if ($result) {
				$session_array = [
					'id' => $result[0]->id,
					'username' => $result[0]->username,
					'email' => $result[0]->email,
				];
				$this->session->set_userdata('LoggedIn', $session_array);
				$this->session->set_flashdata('success', 'Login successfully');
				redirect(base_url('/dashboard'));
			} else {
				$this->session->set_flashdata('error', 'Login failed');
				redirect(base_url('login'));
			}
		} else {
			$this->index();
		}
	}
}
