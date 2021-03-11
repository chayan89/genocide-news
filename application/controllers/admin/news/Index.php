<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$this->checkAdminAuth();
		
		$this->data['page'] = 'admin/news/index';
		$this->data['states'] = $this->common_model->select('states', ['status'=> 1], '*', 'state_name', 'ASC');
		$this->load_view($this->data);
	}
	//Add_edit function for category
	public function newsSave()
	{ 
		$postData = $this->input->post();
		if (!empty($postData)) {
			if($postData['title'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'News Title is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['description'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Description is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$this->data['title'] = $postData['title'];
			$this->data['description'] = $postData['description'];
			$this->data['country_id'] = $postData['country_id'];
			$this->data['state_id'] = $postData['state_id'];
			
			$allowed =  array('gif', 'png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF');

			if($_FILES['thumb_image']['name']){
				$filename = $_FILES['thumb_image']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);

				if (in_array($ext, $allowed)) {
					$image_file = time()."_news_." . $ext;
					$imgPath = getcwd()."/uploads/thumbnail/".$image_file;
					if(move_uploaded_file($_FILES['thumb_image']['tmp_name'], $imgPath)){
						$this->data['thumb_image'] = $image_file;
					}
				}
			}
			
			if(empty($postData['news_id'])){
			    $this->data['created_at'] = date('Y-m-d');
				if($article_id = $this->common_model->add('news', $this->data)){
				    echo $this->db->last_query();
					$this->response = array('status' => array('error_code' => 0, 'message' => 'News added successfully'), 'result' => array('data' => $this->obj));
				}else{
					// $this->session->set_flashdata('error', 'Unable to adde Product');
					// redirect('admin/product/add', 'refresh');
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to add News'), 'result' => array('data' => $this->obj));
				}
			}else{
			    $this->data['updated_at'] = date('Y-m-d');
				if($this->common_model->update('news', $this->data,['news_id'=> $postData['news_id']])){
					$this->response = array('status' => array('error_code' => 0, 'message' => 'News saved successfully'), 'result' => array('data' => $this->obj));
				}else{
					// $this->session->set_flashdata('error', 'Unable to update product');
					// redirect('admin/product/edit/'.$postData['product_id'], 'refresh');
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to save News'), 'result' => array('data' => $this->obj));
				}
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}
	
	
	public function get()
	{
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		if (!empty($postData)) {
			if($postData['source'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Incomplete request'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['source'] === 'WEB'){
				$where = array('news.status !='=> 3);
			}else{
				$where = array('news.status'=> 1);
			}
			$select = 'news.*';
			$this->obj = $this->common_model->select('news', $where, $select, 'news.news_id ', 'DESC');
			//echo $this->db->last_query(); die;

			//if($postData['source'] === 'WEB'){
				$this->data['news'] = $this->obj;
				$html = $this->load->view('admin/ajax-view', $this->data, true);
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => $html);
			// }else{
			// 	if(!empty($this->obj)){
			// 		$this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => array('data' => $this->obj));
			// 	}else{
			// 		$this->response = array('status' => array('error_code' => 0, 'message' => 'No data found'), 'result' => array('data' => $this->obj));
			// 	}
			// }
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}
}