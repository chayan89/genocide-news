<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$this->checkAdminAuth();
		
		$this->data['page'] = 'admin/nrc/category';
		$this->load_view($this->data);
	}

	/**
	 * Load category add view
	 */
	// public function add($id = null)
	// {
	// 	$this->checkAdminAuth();
	// 	if($id != null){
	// 		$this->data['details'] = $this->common_model->select_row('categories', ['category_id'=> $id], 'categories.*');
	// 	}
	// 	$this->data['page'] = 'admin/category/add';
	// 	$this->load_view($this->data);
	// }

	//Add_edit function for category
	public function categorySave()
	{
		ini_set('display_errors', 1);
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		if (!empty($postData)) {
			$categoryName = $postData['name'];
			$this->data = [];
			$this->data['name'] = $categoryName;
			$this->data['title'] = isset($postData['title'])?$postData['title']:'';
			if(empty($postData['id'])){
				$isData = $this->common_model->select_row('nrc_categories', ['LOWER(name)'=> strtolower($categoryName)], '*');
			
				if(!empty($isData)){
					// $this->session->set_flashdata('error', 'Category Name already exists');
					// redirect('admin/nrc/category', 'refresh');
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Category Name already exists'), 'result' => array('data' => $this->obj));
					$this->outputJson($this->response);
				}
			}
			if(empty($postData['id'])){//
				if($this->common_model->add('nrc_categories', $this->data)){
					//$this->session->set_flashdata('success', 'Category added successfully');
					//redirect('admin/nrc/category', 'refresh');
					$this->response = array('status' => array('error_code' => 0, 'message' => 'Category added successfully'), 'result' => array('data' => $this->obj));
				}else{
					$this->session->set_flashdata('error', 'Unable to add category');
					//redirect('admin/nrc/category', 'refresh');
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to add category'), 'result' => array('data' => $this->obj));
				}
			}else{
				//print_r($this->data); die;
				if($this->common_model->update('nrc_categories', $this->data,['nrc_categorie_id '=> $postData['id']])){
					//echo $this->db->last_query();
					//$this->session->set_flashdata('success', 'Category updated successfully');
					$this->response = array('status' => array('error_code' => 0, 'message' => 'Category updated successfully'), 'result' => array('data' => $this->obj));
					//redirect('admin/category', 'refresh');
				}else{
					//$this->session->set_flashdata('error', 'Unable to update category');
					//redirect('admin/category/edit/'.$postData['category_id'], 'refresh');
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to update category'), 'result' => array('data' => $this->obj));
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
				$where = array('categories.status !='=> 3);
			}else{
				$where = array('categories.status'=> 1);
			}
			$select = 'categories.*';
			$this->obj = $this->common_model->select('nrc_categories categories', $where, $select, 'categories.nrc_categorie_id ', 'DESC');
			//echo $this->db->last_query(); die;

			if($postData['source'] === 'WEB'){
				$this->data['categories'] = $this->obj;
				$html = $this->load->view('admin/ajax-view', $this->data, true);
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => $html);
			}else{
				if(!empty($this->obj)){
					$this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => array('data' => $this->obj));
				}else{
					$this->response = array('status' => array('error_code' => 0, 'message' => 'No data found'), 'result' => array('data' => $this->obj));
				}
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}
}