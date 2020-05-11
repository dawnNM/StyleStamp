<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('index');
		$this->load->view('includes/footer');
	}
	public function changebanners()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('changebanners');
		$this->load->view('includes/footer');
	}
	public function updateadmininformation()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('updateadmininformation');
		$this->load->view('includes/footer');
	}
	public function updatecompanydetails()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('updatecompanydetails');
		$this->load->view('includes/footer');
	}
	public function vieworder()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('vieworder');
		$this->load->view('includes/footer');
	}
	public function viewCategories()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('viewcategories');
		$this->load->view('includes/footer');
	}
	public function login()
	{
		$this->load->view('includes/header-login');
		$this->load->view('login');
		$this->load->view('includes/footer-login');
	}
	public function forgotpassword()
	{
		$this->load->view('includes/header-login');
		$this->load->view('forgotpassword');
		$this->load->view('includes/footer-login');
	}
	public function viewProducts()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('index');
		$this->load->view('includes/footer');
	}
	public function addCategory()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('addcategory');
		$this->load->view('includes/footer');
	}
	public function addSubCategory()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('addsubcategory');
		$this->load->view('includes/footer');
	}
	public function viewCategory()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('viewcategory');
		$this->load->view('includes/footer');
	}
	public function viewSubCategory()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('viewsubcategory');
		$this->load->view('includes/footer');
	}
		public function viewUser()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('viewuser');
		$this->load->view('includes/footer');
	}
	public function viewProduct()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('viewproduct');
		$this->load->view('includes/footer');
	}

	public function viewSelectedProduct()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('viewselectedproduct');
		$this->load->view('includes/footer');
	}     
		public function viewSelectedUser()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('viewselecteduser');
		$this->load->view('includes/footer');
	} 
			public function changePrivacyPolicy()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('changeprivacypolicy');
		$this->load->view('includes/footer');
	} 
				public function changeSocialMediaLinks()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('changesocialmedialinks');
		$this->load->view('includes/footer');
	} 
					public function changeContactDetails()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('changecontactdetails');
		$this->load->view('includes/footer');
	} 
				public function viewOrderReports()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('vieworderreports');
		$this->load->view('includes/footer');
	}
	public function comments()
    {
         echo 'Look at this!';
    }
}
