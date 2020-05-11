<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_apiorder extends CI_Controller {

	function index()
	{
		// $this->load->view('api_oview');
		$this->load->view('includes/header-myview');
		$this->load->view('includes/nav-myview');
		$this->load->view('api_viewaorders');
		$this->load->view('includes/footer-myview');
	}

	function action()
	{
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');

			if($data_action == "Delete")
			{
				$api_url = "http://localhost/Stylestamp/index.php/apiorder/delete";

				$form_data = array(
					'order_id'		=>	$this->input->post('order_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;




			}

			if($data_action == "Edit")
			{
				$api_url = "http://localhost/create-crud-rest-api-in-codeigniter-step-by-step/api/update";

				$form_data = array(
					'first_name'		=>	$this->input->post('first_name'),
					'last_name'			=>	$this->input->post('last_name'),
					'id'				=>	$this->input->post('user_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;







			}

			if($data_action == "fetch_single")
			{
				$api_url = "http://localhost/create-crud-rest-api-in-codeigniter-step-by-step/api/fetch_single";

				$form_data = array(
					'id'		=>	$this->input->post('user_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;






			}

			if($data_action == "Insert")
			{
				$api_url = "http://localhost/create-crud-rest-api-in-codeigniter-step-by-step/api/insert";
			

				$form_data = array(
					'first_name'		=>	$this->input->post('first_name'),
					'last_name'			=>	$this->input->post('last_name')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;


			}





			if($data_action == "fetch_all")
			{
				$api_url = "http://localhost/Stylestamp/index.php/apiorder";

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				$result = json_decode($response);

				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
						//echo $row;
						//echo $row->orders;
						$output .= '
						<tr>
							<td>'.$row->order_id.'</td>
							<td>'.$row->user_id.'</td>
							<td>'.$row->date.'</td>
							<td>'.$row->shipped_status.'</td>
							<td>'.$row->order_status.'</td>
							<td>'.$row->payment_type.'</td>
							<td>'.$row->promotion_id.'</td>
							<td>'.$row->status.'</td>
							<td>'.$row->date_create.'</td>
							<td>'.$row->total.'</td>
							<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->order_id.'">Edit</button></td>
							<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->user_id.'">Delete</button></td>
						</tr>

						';
					}
				}
				else
				{
					$output .= '
					<tr>
						<td colspan="8" align="center">No Data Found</td>
					</tr>
					';
				}

				echo $output;
			}
		}
	}
	
}

?>