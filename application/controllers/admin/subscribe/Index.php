<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$this->checkAdminAuth();
		
		$this->data['page'] = 'admin/subscriber/index';
		$this->data['states'] = $this->common_model->select('states', ['status'=> 1], '*', 'state_name', 'ASC');
		$this->load_view($this->data);
	}

	public function get()
	{
// 		$this->isJSON(file_get_contents('php://input'));
// 		$postData = $this->extract_json(file_get_contents('php://input'));
// 		if (!empty($postData)) {
// 			if($postData['source'] ==""){
// 				$this->response = array('status' => array('error_code' => 1, 'message' => 'Incomplete request'), 'result' => array('data' => $this->obj));
// 				$this->outputJson($this->response);
// 			}

			$where = array('subscribe_list.status'=> 1);
			$select = 'subscribe_list.*';
			$this->obj = $this->common_model->select('subscribe_list', $where, $select, 'subscribe_list.id ', 'DESC');
				$this->data['subscribe_list'] = $this->obj;
				$html = $this->load->view('admin/ajax-view', $this->data, true);
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => $html);
// 		}
// 		else {
// 			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
// 		}

		$this->outputJson($this->response);
	}
}