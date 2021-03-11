<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$this->checkAdminAuth();
		
		$this->data['page'] = 'admin/cms/state';
		$this->data['states'] = $this->common_model->select('states', ['status'=> 1], '*', 'state_name', 'ASC');
		$this->data['scale'] = $this->common_model->select('genocide_scale', ['id'=> 1], '*');
		$this->load_view($this->data);
	}
	//Add_edit function for category
	public function tooltipSave()
	{ 
		$postData = $this->input->post();
		if (!empty($postData)) {
			if($postData['tooltip'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Tooltip is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$this->data['tooltip'] = $postData['tooltip'];
			
			if(!empty($postData['state_id'])){
				if($this->common_model->update('states', $this->data,['state_id'=> $postData['state_id']])){
				    //echo $this->db->last_query();
					$this->response = array('status' => array('error_code' => 0, 'message' => 'Tooltips added successfully'), 'result' => array('data' => $this->obj));
				}else{
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to add Tooltips'), 'result' => array('data' => $this->obj));
				}
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}
	
	
	//Update Scale value
	public function scaleSave()
	{ 
		$postData = $this->input->post();
		if (!empty($postData)) {
			if($postData['scale'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Scale is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$this->data['scale_value'] = $postData['scale'];
			$this->data['updated_at'] = date('Y-m-d H:i:s');
			
			if($this->common_model->update('genocide_scale', $this->data,['id'=> 1])){
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Scale value updated successfully'), 'result' => array('data' => $this->obj));
			}else{
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to update scale value'), 'result' => array('data' => $this->obj));
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
				$where = array('states.status !='=> 3);
			}else{
				$where = array('states.status'=> 1);
			}
			$select = 'states.*';
			$this->obj = $this->common_model->select('states', $where, $select, 'states.state_id ', 'DESC');
				$this->data['states'] = $this->obj;
				$html = $this->load->view('admin/ajax-view', $this->data, true);
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => $html);
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}
}