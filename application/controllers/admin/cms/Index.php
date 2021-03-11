<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$this->checkAdminAuth();
		
		$this->data['page'] = 'admin/cms/index';
		$this->data['CMS'] = $this->common_model->select('cms', ['status !='=> 3], '*', 'page', 'ASC');
		$this->load_view($this->data);
	}
	//Add_edit function for category
	public function cmsPageSave()
	{ 
		$postData = $this->input->post();
		if (!empty($postData)) {
			if($postData['title'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Video Title is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['description'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Description is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$this->data['title'] = $postData['title'];
			$this->data['description'] = $postData['description'];
			
			$allowed =  array('gif', 'png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF');

			if($_FILES['thumb_image']['name']){
				$filename = $_FILES['thumb_image']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);

				if (in_array($ext, $allowed)) {
					$image_file = time()."_cms." . $ext;
					$imgPath = getcwd()."/uploads/thumbnail/".$image_file;
					if(move_uploaded_file($_FILES['thumb_image']['tmp_name'], $imgPath)){
						$this->data['image'] = $image_file;
					}
				}
			}
// 			$allowed =  array('mp4', 'avi', '3gp');

// 			if($_FILES['video']['name']){
// 				$filename = $_FILES['video']['name'];
// 				$ext = pathinfo($filename, PATHINFO_EXTENSION);

// 				//if (in_array($ext, $allowed)) {
// 					$image_file = time()."_video." . $ext;
// 					$imgPath = getcwd()."/uploads/videos/".$image_file;
// 					if(move_uploaded_file($_FILES['video']['tmp_name'], $imgPath)){
// 						$this->data['video'] = $image_file;
// 					}
// 				//}
// 			}
			
			if(!empty($postData['cms_id'])){
				if($this->common_model->update('cms', $this->data,['cms_id'=> $postData['cms_id']])){
					$this->response = array('status' => array('error_code' => 0, 'message' => 'CMS data saved successfully'), 'result' => array('data' => $this->obj));
				}else{
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to save CMS'), 'result' => array('data' => $this->obj));
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
				$where = array('cms.status !='=> 3);
			}else{
				$where = array('cms.status'=> 1);
			}
			$select = 'cms.*';
			$this->obj = $this->common_model->select('cms', $where, $select, 'cms.cms_id ', 'DESC');
			$this->data['cms'] = $this->obj;
			$html = $this->load->view('admin/ajax-view', $this->data, true);
			$this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => $html, 'data'=> $this->obj);
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}
}