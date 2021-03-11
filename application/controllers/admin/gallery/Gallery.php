<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$this->checkAdminAuth();
		$this->data['page'] = 'admin/gallery/gallery-list';
		$this->load_view($this->data);
	}

	/**
	 * Load product add view
	 */
	public function add($id = null)
	{
		$this->checkAdminAuth();
		$this->data['gallery_categories'] = $this->common_model->select('gallery_categories', ['status'=> 1], '*', 'name', 'ASC');
		$this->data['page'] = 'admin/gallery/index';
		$this->load_view($this->data);
	}
	/**
	 * Load product add view
	 */
	public function edit($id = null)
	{
		$this->checkAdminAuth();
		if($id != null){
			$this->data['details'] = $this->common_model->select_row('gallery_master', ['gallery_id'=> $id], 'gallery_master.*');
			//$this->data['details']->images = $this->common_model->select('nrc_news_images', ['nrc_news_id'=> $id], 'nrc_news_images.*');
		}
	    $this->data['gallery_categories'] = $this->common_model->select('gallery_categories', ['status'=> 1], '*', 'name', 'ASC');
		$this->data['page'] = 'admin/gallery/index';
		$this->load_view($this->data);
	}

	//Add_edit function for product
	public function gallerySave()
	{ 
		$postData = $this->input->post();
		if (!empty($postData)) {
			// echo '<pre>';
			// print_r($postData);
			if($postData['gallery_category_id'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Category is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['name'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Name is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$this->data = $postData;
			
			$allowed =  array('gif', 'png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF');

			if($_FILES['thumb_image']['name']){
				$filename = $_FILES['thumb_image']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);

				if (in_array($ext, $allowed)) {
					$image_file = time()."_news." . $ext;
					$imgPath = getcwd()."/uploads/thumbnail/".$image_file;
					if(move_uploaded_file($_FILES['thumb_image']['tmp_name'], $imgPath)){
						$this->data['thumb_image'] = $image_file;
					}
				}
			}
			if($_FILES['file']['name']){
				$filename = $_FILES['file']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);

				if (in_array($ext, $allowed)) {
					$image_file = time()."_gallery." . $ext;
					$imgPath = getcwd()."/uploads/gallery/".$image_file;
					if(move_uploaded_file($_FILES['file']['tmp_name'], $imgPath)){
						$this->data['file'] = $image_file;
					}
				}
			}
			
			if(empty($postData['gallery_id'])){
			    $this->data['created_at'] = date('Y-m-d');
				if($nrc_news_id = $this->common_model->add('gallery_master', $this->data)){
					/**
					 * Add multiple images 
					*/
					$this->data = [];
				// 	for($i=0; $i<count($_FILES['image']['name']); $i++)
				// 	{
				// 		$filename = $_FILES['image']['name'][$i];
				// 		$ext = pathinfo($filename, PATHINFO_EXTENSION);						
				// 		if (in_array($ext, $allowed)) {
				// 			$image_file = $i.'_'.time()."_news." . $ext;
				// 			$imgPath = getcwd()."/uploads/news/".$image_file;
				// 			if(move_uploaded_file($_FILES['image']['tmp_name'][$i], $imgPath)){
				// 				$this->data[] = array(
				// 						'nrc_news_id' => $nrc_news_id,
				// 						'news_image' => $image_file
				// 					);
				// 			}
				// 		}
				// 		if(!empty($this->data)){
				// 			$this->common_model->batch_insert('nrc_news_images' ,$this->data);
				// 		}
				// 	}
					// $this->session->set_flashdata('success', 'Product added successfully');
					// redirect('admin/product', 'refresh');
					$this->response = array('status' => array('error_code' => 0, 'message' => 'News added successfully'), 'result' => array('data' => $this->obj));
				}else{
					// $this->session->set_flashdata('error', 'Unable to adde Product');
					// redirect('admin/product/add', 'refresh');
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to add news'), 'result' => array('data' => $this->obj));
				}
			}else{
			    $this->data['updated_at'] = date('Y-m-d');
				if($this->common_model->update('gallery_master', $this->data,['gallery_id'=> $postData['gallery_id']])){
					/**
					 * Add multiple images 
					*/
				// 	$this->data = [];
				// 	for($i=0; $i<count($_FILES['image']['name']); $i++)
				// 	{
				// 		$filename = $_FILES['image']['name'][$i];
				// 		$ext = pathinfo($filename, PATHINFO_EXTENSION);						
				// 		if (in_array($ext, $allowed)) {
				// 			$image_file = $i.'_'.time()."_news." . $ext;
				// 			$imgPath = getcwd()."/uploads/news/".$image_file;
				// 			if(move_uploaded_file($_FILES['image']['tmp_name'][$i], $imgPath)){
				// 				$this->data[] = array(
				// 						'nrc_news_id' => $postData['id'],
				// 						'news_image' => $image_file
				// 					);
				// 			}
				// 		}
				// 		if(!empty($this->data)){
				// 			//remove old images
				// 			$this->db->where(['nrc_news_id'=> $postData['id']]);
				// 			$this->db->delete('nrc_news_images');
				// 			//insert new images
				// 			$this->common_model->batch_insert('nrc_news_images' ,$this->data);
				// 		}
				// 	}
					// $this->session->set_flashdata('success', 'product updated successfully');
					// redirect('admin/product/edit/'.$postData['product_id'], 'refresh');
					$this->response = array('status' => array('error_code' => 0, 'message' => 'News saved successfully'), 'result' => array('data' => $this->obj));
				}else{
					// $this->session->set_flashdata('error', 'Unable to update product');
					// redirect('admin/product/edit/'.$postData['product_id'], 'refresh');
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to save news'), 'result' => array('data' => $this->obj));
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
				$where = array('g.status !='=> 3);
			}else{
				$where = array('g.status'=> 1);
			}
			
			$select = 'g.*, cat.name cat_name';
			$this->join[] = ['table' => 'gallery_categories cat', 'on' => 'cat.gallery_category_id = g.gallery_category_id', 'type' => 'left'];
			$this->obj = $this->common_model->select('gallery_master g', $where, $select, 'g.gallery_id', 'DESC', $this->join);
			//echo $this->db->last_query(); die;

			$this->data['galleries'] = $this->obj;
			$html = $this->load->view('admin/ajax-view', $this->data, true);
			$this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => $html);
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}

	/*
		** Bulk data upload
	*/
	//upload bulk/csv tools
	public function csvUpload()
	{
		$filename = $_FILES['image']['name'];
		$vendor = $this->input->post('vendor');
		$category = $this->input->post('category');

		$allowed =  array('csv');
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if (in_array($ext, $allowed)) {
			$image_file = time().'_'.$filename;
			$imgPath = getcwd()."/uploads/".$image_file;
			if(file_exists($imgPath)){
				unlink($imgPath);
			}
			move_uploaded_file($_FILES['image']['tmp_name'], $imgPath);

			$csvData = $this->readCSV($imgPath);
			// echo '<pre>';
			// print_r($csvData); die;
			$this->data = [];
			for($i=1; $i< count($csvData); $i++){
				if($data = $csvData[$i]){
					if (!$this->common_model->select_row('users', array("email" => $data[2]), 'user_id')) {
					$this->data[] = array(
										'product_suk_id'	=> $data[0],
										'product_name'	=> $data[1],
										'price'	=>$data[2],
										'description'	=> $data[3],
										'vendor_id'		=> $vendor,
										'category_id'		=> $category,
									);
					}
				}
			}
			if($this->data){
				$this->common_model->batch_insert('products', $this->data);
				$this->response=array('status'=>array('error_code'=>0,'message'=>'Data uuccessfully uploaded '),'result'=>array('data'=>$this->obj));
			}
		}else{
			$this->response=array('status'=>array('error_code'=>1,'message'=>'Upload only csv files'),'result'=>array('data'=>$this->obj));
		}
		$this->outputJson($this->response);
	}
}