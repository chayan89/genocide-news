<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$this->checkAdminAuth();
		
		$this->data['page'] = 'admin/timeline/index';
		$this->load_view($this->data);
	}
	//Add_edit function for category
	public function timelineSave()
	{
		$postData = $this->input->post();
		if (!empty($postData)) {
			$name = $postData['timeline_title'];
			if(empty($postData['timeline_id'])){
				$isData = $this->common_model->select_row('timelines', ['LOWER(timeline_title)'=> strtolower($name)], '*');
			
				if(!empty($isData)){
					// $this->session->set_flashdata('error', 'Category Name already exists');
					// redirect('admin/nrc/category', 'refresh');
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Timeline Name already exists'), 'result' => array('data' => $this->obj));
					$this->outputJson($this->response);
				}
			}
			$this->data = $postData;
			if(empty($postData['timeline_id'])){//
				$this->data['created_at'] = date('Y-m-d H:i:s');
				if($this->common_model->add('timelines', $this->data)){
					//$this->session->set_flashdata('success', 'Category added successfully');
					//redirect('admin/nrc/category', 'refresh');
					$this->response = array('status' => array('error_code' => 0, 'message' => 'Timeline added successfully'), 'result' => array('data' => $this->obj));
				}else{
					$this->session->set_flashdata('error', 'Unable to add category');
					//redirect('admin/nrc/category', 'refresh');
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to add Timeline'), 'result' => array('data' => $this->obj));
				}
			}else{
				$this->data['updated_at'] = date('Y-m-d H:i:s');
				if($this->common_model->update('timelines', $this->data,['timeline_id '=> $postData['timeline_id']])){
					//echo $this->db->last_query();
					//$this->session->set_flashdata('success', 'Category updated successfully');
					$this->response = array('status' => array('error_code' => 0, 'message' => 'Timeline updated successfully'), 'result' => array('data' => $this->obj));
					//redirect('admin/category', 'refresh');
				}else{
					//$this->session->set_flashdata('error', 'Unable to update category');
					//redirect('admin/category/edit/'.$postData['category_id'], 'refresh');
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to update Timeline'), 'result' => array('data' => $this->obj));
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
				$where = array('timelines.status !='=> 3);
			}else{
				$where = array('timelines.status'=> 1);
			}
			$select = 'timelines.*';
			$this->obj = $this->common_model->select('timelines', $where, $select, 'timelines.timeline_id ', 'DESC');
			//echo $this->db->last_query(); die;

			//if($postData['source'] === 'WEB'){
				$this->data['timelines'] = $this->obj;
				$html = $this->load->view('admin/ajax-view', $this->data, true);
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => $html, 'data'=> $this->data['timelines']);
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