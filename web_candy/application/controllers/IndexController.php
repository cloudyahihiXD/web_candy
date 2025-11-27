<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('indexModel');
		$this->load->library('cart');
		$this->load->library('email');
		$this->data['category'] = $this->indexModel->getCategoryHome();
		$this->data['subcategory'] = $this->indexModel->getSubcategoryHome();
		$this->load->library('pagination');
	}
	public function index()
	{
		$config['base_url'] = base_url() . '/pagination/index';
		$config['total_rows'] = $this->indexModel->countAllProduct();
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'First';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		// $this->data['allproduct'] = $this->indexModel->getAllProducts();
		// $this->data['category_subcategory'] = $this->indexModel->getCategorySubcategory($id);
		$this->pagination->initialize($config);
		$this->page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['links'] = $this->pagination->create_links();
		$this->data['allproduct_pagination'] = $this->indexModel->getIndexPagination($config["per_page"], $this->page);

		$this->data['items_categories'] = $this->indexModel->ItemsCategories();

		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/home', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function category($id)
	{
		$config['base_url'] = base_url() . '/cat' . '/' . $id;
		$config['total_rows'] = $this->indexModel->countAllProductByCat($id);
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'First';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		// $this->data['allproduct'] = $this->indexModel->getAllProducts();
		// $this->data['category_subcategory'] = $this->indexModel->getCategorySubcategory($id);
		$this->pagination->initialize($config);
		$this->page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['links'] = $this->pagination->create_links();
		$this->data['min_price'] = $this->indexModel->getMinProductPrice();
		$this->data['max_price'] = $this->indexModel->getMaxProductPrice();

		if (isset($_GET['letter'])) {
			$letter = $_GET['letter'];
			$this->data['allproductbycategory_pagination'] = $this->indexModel->getCatLetterPagination($id, $letter, $config["per_page"], $this->page);
		} elseif (isset($_GET['price'])) {
			$price = $_GET['price'];
			$this->data['allproductbycategory_pagination'] = $this->indexModel->getCatPricePagination($id, $price, $config["per_page"], $this->page);
		} elseif (isset($_GET['to']) && $_GET['from']) {
			$from_price = $_GET['from'];
			$to_price = $_GET['to'];
			$this->data['allproductbycategory_pagination'] = $this->indexModel->getCatPriceRangePagination($id, $from_price, $to_price, $config["per_page"], $this->page);
		} else {
			$this->data['allproductbycategory_pagination'] = $this->indexModel->getCatPagination($id, $config["per_page"], $this->page);
		}

		// $this->data['category_product'] = $this->indexModel->getCategoryProducts($id);
		$this->data['name'] = $this->indexModel->getCategoryName($id);
		$this->config->config["pageTittle"] = $this->data['name'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/category', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function subcategory($id)
	{
		$config['base_url'] = base_url() . '/subcat' . '/' . $id;
		$config['total_rows'] = $this->indexModel->countAllProductBySubcat($id);
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'First';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		// $this->data['allproduct'] = $this->indexModel->getAllProducts();
		// $this->data['category_subcategory'] = $this->indexModel->getCategorySubcategory($id);
		$this->pagination->initialize($config);
		$this->page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['links'] = $this->pagination->create_links();
		$this->data['allproductbysubcategory_pagination'] = $this->indexModel->getSubcatPagination($id, $config["per_page"], $this->page);

		// $this->data['subcategory_product'] = $this->indexModel->getSubcategoryProducts($id);
		$this->data['name'] = $this->indexModel->getSubcategoryName($id);
		$this->config->config["pageTittle"] = $this->data['name'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/subcategory', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function product($id)
	{
		$this->data['product_detail'] = $this->indexModel->getProductDetail($id);
		foreach ($this->data['product_detail'] as $key => $val) {
			$categoryid = $val->categoryid;
		}
		$this->data['product_related'] = $this->indexModel->getProductRelated($id, $categoryid);
		$this->data['name'] = $this->indexModel->getProductName($id);
		$this->config->config["pageTittle"] = $this->data['name'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/product_detail', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function thanks()
	{
		$this->config->config["pageTittle"] = 'thanks for ordering';
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/thanks');
		$this->load->view('pages/template/footer');
	}

	public function cart()
	{
		$this->config->config["pageTittle"] = 'Your shopping cart';
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/cart');
		$this->load->view('pages/template/footer');
	}

	public function add_to_cart()
	{
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$this->data['product_detail'] = $this->indexModel->getProductDetail($product_id);
		foreach ($this->data['product_detail'] as $key => $prod) {
			$cart = array(
				'id' => $prod->id,
				'qty' => $quantity,
				'price' => $prod->productPrice,
				'name' => $prod->productName,
				'options' => array('image' => $prod->productImage1)
			);
		}
		$this->cart->insert($cart);
		redirect(base_url() . 'cart', 'refresh');
	}

	public function delete_all_cart()
	{
		$this->cart->destroy();
		redirect(base_url() . 'cart', 'refresh');
	}

	public function delete_item($rowid)
	{
		$this->cart->remove($rowid);
		redirect(base_url() . 'cart', 'refresh');
	}

	public function update_cart_item()
	{
		$rowid = $this->input->post('rowid');
		$quantity = $this->input->post('quantity');
		foreach ($this->cart->contents() as $items) {
			if ($rowid == $items['rowid']) {
				$cart = array(
					'rowid' => $rowid,
					'qty' => $quantity
				);
			}
		}
		$this->cart->update($cart);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function checkout()
	{
		if ($this->session->userdata('LoggedInCustomer')) {
			$this->config->config["pageTittle"] = 'Checkout';
			$user_id = $this->session->userdata('LoggedInCustomer')['id'];
			$this->load->model('loginModel');
			$user_info = $this->loginModel->getUserInfo($user_id); // Modify this to match your method in the loginModel

			$data['user_info'] = $user_info; // Pass user information to the view

			$this->load->view('pages/template/header', $this->data);
			$this->load->view('pages/checkout', $data); // Pass user information to the view
			$this->load->view('pages/template/footer');
		} else {
			redirect(base_url() . 'user-login');
		}
	}

	public function confirm_checkout()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required', ['required' => 'You must provide a %s.']);

		if ($this->form_validation->run() == true) {
			// Retrieve user ID from session
			$user_data = $this->session->userdata('LoggedInCustomer');
			$user_id = $user_data['id'];

			$username = $this->input->post('username');
			$contact = $this->input->post('contact');
			$address = $this->input->post('address');
			$email = $this->input->post('email');
			$method = $this->input->post('method');

			// Save shipping information
			$shipping_data = array(
				'username' => $username,
				'contact' => $contact,
				'address' => $address,
				'email' => $email,
				'method' => $method
			);
			$this->load->model('loginModel');

			// Save order information
			foreach ($this->cart->contents() as $item) {
				$order_data = array(
					'UserId' => $user_id,
					'ProductId' => $item['id'],
					'Quantity' => $item['qty'],
					'OrderDate' => date('Y-m-d H:i:s'),
					'PaymentMethod' => $method,
					'OrderStatus' => 'Pending'
				);
				// Insert order data into the database
				$this->loginModel->insertOrder($order_data);
			}

			// Clear the cart after checkout
			$this->cart->destroy();

			$this->session->set_flashdata('success', 'Confirmed to checkout');
			redirect(base_url('/thanks'));
		} else {
			$this->checkout();
		}
	}



	public function login()
	{
		$this->config->config["pageTittle"] = 'Login | Register';
		$this->load->view('pages/template/header');
		$this->load->view('pages/login');
		$this->load->view('pages/template/footer');
	}

	public function login_customer()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'You must provide a %s.']);

		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$this->load->model('loginModel');
			$result = $this->loginModel->checkLoginCustomer($email, $password);
			if ($result) {
				$session_array = [
					'id' => $result[0]->id,
					'username' => $result[0]->username,
					'email' => $result[0]->email,
				];
				$this->session->set_userdata('LoggedInCustomer', $session_array);
				$this->session->set_flashdata('success', 'Login successfully');
				redirect(base_url('/checkout'));
			} else {
				$this->session->set_flashdata('error', 'Login failed');
				redirect(base_url('user-login'));
			}
		} else {
			$this->login();
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('shipping_address', 'Shipping_address', 'trim|required', ['required' => 'You must provide a %s.']);
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required', ['required' => 'You must provide a %s.']);

		if ($this->form_validation->run() == true) {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$email = $this->input->post('email');
			$shipping_address = $this->input->post('shipping_address');
			$contact = $this->input->post('contact');

			$data = array(
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'shipping_address' => $shipping_address,
				'contact' => $contact
			);

			$this->load->model('loginModel');
			$result = $this->loginModel->NewCustomer($data);
			if ($result) {
				$session_array = [
					'username' => $username,
					'email' => $email
				];
				$this->session->set_userdata('LoggedInCustomer', $session_array);
				$this->session->set_flashdata('success', 'Login successfully');
				redirect(base_url('/checkout'));
			} else {
				$this->session->set_flashdata('error', 'Login failed');
				redirect(base_url('user-login'));
			}
		} else {
			$this->login();
		}
	}

	public function logout_customer()
	{
		$this->session->unset_userdata('LoggedInCustomer');
		$this->session->set_flashdata('success', 'Logout successful');
		redirect(base_url('user-login'));
	}

	public function search()
	{
		if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
			$keyword = $_GET['keyword'];
		}
		$config = array();
		$config['base_url'] = base_url() . '/search';
		$config['reuse_query_string'] = TRUE;
		$config['total_rows'] = $this->indexModel->countAllProductByKeyword($keyword);
		$config['per_page'] = 6;
		$config['uri_segment'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'First';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		// $this->data['allproduct'] = $this->indexModel->getAllProducts();
		// $this->data['category_subcategory'] = $this->indexModel->getCategorySubcategory($id);
		$this->pagination->initialize($config);
		$this->page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$this->data['links'] = $this->pagination->create_links();
		$this->data['allproductbykeyword_pagination'] = $this->indexModel->getSearchPagination($keyword, $config["per_page"], $this->page);

		// $this->data['product'] = $this->indexModel->getProductsByKeyword($keyword);
		$this->data['name'] = $keyword;
		$this->config->config["pageTittle"] = 'Search: ' . $keyword;
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/search', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function admin_search()
    {
        // Load necessary models
        $this->load->model('categoryModel');
        $this->load->model('subcategoryModel');
        $this->load->model('indexModel');

        // Get all categories
        $data['categories'] = $this->categoryModel->getAllCategories();
        $data['subcategories'] = $this->subcategoryModel->getAllSubcategories();

        // Initialize keyword variable
        $keyword = '';

        // Check if keyword is provided in the GET request
        if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
        }

        // Perform search and get results
        $data['searchResults'] = $this->indexModel->getProductsByKeyword($keyword);

        // Set page title
        $this->config->config["pageTittle"] = 'Search: ' . $keyword;

        // Load views
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->view('admin_search/index', $data);
        $this->load->view('admin_template/footer');
    }

	public function review_send()
	{
		$data = [
			'username' => $this->input->post('name_review'),
			'email' => $this->input->post('email_review'),
			'review' => $this->input->post('review'),
			'status' => 0,
		];
		$result = $this->indexModel->InsertReview($data);
		if ($result) {
			echo 'ok';
		} else {
			echo 'failed';
		}
	}

	// public function user($id)
	// {
	// 		$this->load->view('pages/template/header');
	//         // Get user ID
	//         $userId = $this->session->userdata('LoggedInCustomer')['id'];
	//         $this->load->model('indexModel');
	//         $userData = $this->indexModel->getUserInfo($userId);
	//         $data['userData'] = $userData;
	//         $this->load->view('pages/user', $data);
	// 		$this->load->view('pages/template/footer');
	// }

	public function user()
	{
		if ($this->session->userdata('LoggedInCustomer')) {
			$this->config->config["pageTittle"] = 'User Account';
			$user_id = $this->session->userdata('LoggedInCustomer')['id'];
			$this->load->model('loginModel');
			$user_info = $this->loginModel->getUserInfo($user_id); // Modify this to match your method in the loginModel

			$data['user_info'] = $user_info; // Pass user information to the view

			$this->load->view('pages/template/header', $this->data);
			$this->load->view('pages/user', $data); // Pass user information to the view
			$this->load->view('pages/template/footer');
		} else {
			redirect(base_url() . 'user-login');
		}
	}
	// public function update_user_info() {
	// 	$this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'You must provide a %s.']);
	// 	$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s.']);
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'You must provide a %s.']);
	// 	$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required' => 'You must provide a %s.']);
	// 	$this->form_validation->set_rules('contact', 'Contact', 'trim|required', ['required' => 'You must provide a %s.']);

	// 	if ($this->form_validation->run() == true) {
	// 		// Retrieve user ID from session
	// 		$user_data = $this->session->userdata('LoggedInCustomer');
	// 		$user_id = $user_data['id'];

	// 		$username = $this->input->post('username');
	// 		$contact = $this->input->post('contact');
	// 		$password = $this->input->post('password');
	// 		$address = $this->input->post('address');
	// 		$email = $this->input->post('email');

	// 		// Save shipping information
	// 		$use_data = array(
	// 			'username' => $username,
	// 			'password' => $password,
	// 			'email' => $email,
	// 			'address' => $address,
	// 			'contact' => $contact
	// 		);
	// 		$this->load->model('loginModel');

	// 		// Save order information
	// 		foreach ($this->cart->contents() as $item) {
	// 			$customer_data = array(
	// 				'Id' => $user_id,
	// 				'username' => 
	// 				'password' => 
	// 				'email' => 
	// 				'shipping_address' => 
	// 				'contact' => 
	// 			);
	// 			// Insert order data into the database
	// 			$this->loginModel->insertOrder($customer_data);
	// 		}
	// 		$this->session->set_flashdata('success', 'Update success');
	// 	} else {
	// 		$this->checkout();
	// 	}
	// }

	// public function update_user($user_id) {
	// 	// Get form data
	// 	$username = $this->input->post('username');
	// 	$email = $this->input->post('email');
	// 	$password = $this->input->post('password');
	// 	$shipping_address = $this->input->post('shipping_address');
	// 	$contact = $this->input->post('contact');

	// 	// Prepare data to update
	// 	$data = array(
	// 		'username' => $username,
	// 		'email' => $email,
	// 		// Assuming you hash passwords before saving to the database
	// 		'password' => password_hash($password, PASSWORD_DEFAULT),
	// 		'shipping_address' => $shipping_address,
	// 		'contact' => $contact
	// 	);

	// 	// Update user information in the database
	// 	$this->User_model->updateUserById($user_id, $data);

	// 	// Redirect to user page with success message
	// 	redirect('user', 'refresh');
	// }	
}
