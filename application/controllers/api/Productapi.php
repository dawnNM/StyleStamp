<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productapi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->library('form_validation');
	}

	function index()
	{
		$data = $this->Product_model->get_products();
		echo json_encode($data);
	}

	function getproductbycategoryid()
	{
		$category_id =  $this->uri->segment(4);

		$array = array('product.category_id' => $category_id);
		$data = $this->Product_model->get_products_with_specs_and_images($array);

		//$data = $this->Product_model->get_products();
		echo json_encode($data);
	}
	//'product_stocks.stock_level >'=>'1'

	function getproductbypricegreater()
	{
		$price =  $this->uri->segment(4);

		$array = array('product.price >' => $price);
		$data = $this->Product_model->get_products_with_specs_and_images($array);

		//$data = $this->Product_model->get_products();
		echo json_encode($data);
	}

	function getproductbyproductid()
	{
		$product_id =  $this->uri->segment(4);

		$array = array('product.product_id' => $product_id);
		$data = $this->Product_model->get_products_with_specs_and_images($array);		
		echo json_encode($data);
	}


}


?>