<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {
	private $table = array();
	public function __construct() {
		parent::__construct();
		$this->logo = base_url('public/admin/img/dashboard_logo.png');
		$this->table = array(
			'nrc'	=> 'nrc_news'
		);
	}
	public function index()
	{
	    $articles = $this->common_model->select('articles', ['status'=> 1], '*', 'created_at', 'DESC', array(), 2);
	    $videos = $this->common_model->select('videos', ['status'=> 1], '*', 'created_at', 'DESC', array(), 2);
	    $international = (object) array_merge( (array) $articles, (array) $videos); 
		$this->data['international'] = $international;
	    $indian = (object) array_merge( (array) $videos, (array) $articles); 
		$this->data['indian'] = $indian;
		$this->data['scale'] = $this->common_model->select('genocide_scale', ['id'=> 1]);
		$this->data['mapData'] = json_encode($this->common_model->select('states', ['status'=> 1], '*', 'state_name', 'ASC'));
		$this->data['page'] = 'front/index';
		$this->load_front_view($this->data);
	}

	/**
	 * @request params 
	 * id
	*/
	public function cms_nrc($id)
	{
		$this->data['list'] = $this->common_model->select('nrc_news', ['status'=> 1, 'nrc_categorie_id'=> $id], '*', 'created_at', 'DESC');
		$this->data['category'] = $this->common_model->select('nrc_categories', ['status'=> 1, 'nrc_categorie_id'=> $id], '*');
		$this->data['for'] = 'nrc';
		$this->data['key'] = 'nrc_news_id';
		$this->data['sub_title'] = '';
		$this->data['page'] = 'front/list';
		$this->load_front_view($this->data);
	}
    
    public function cms_legal($id)
	{
		$this->data['list'] = $this->common_model->select('legal_news', ['status'=> 1, 'legal_categorie_id'=> $id], '*', 'created_at', 'DESC');
		$this->data['category'] = $this->common_model->select('legal_categories', ['status'=> 1, 'legal_categorie_id'=> $id], '*');
		$this->data['for'] = 'legal';
		$this->data['key'] = 'legal_news_id';
		$this->data['sub_title'] = 'legal_categories';
		$this->data['page'] = 'front/list';
		$this->load_front_view($this->data);
	}
    public function cms_hate($id)
	{
		$this->data['list'] = $this->common_model->select('hate_news', ['status'=> 1, 'hate_categorie_id'=> $id], '*', 'created_at', 'DESC');
		$this->data['category'] = $this->common_model->select('hate_categories', ['status'=> 1, 'hate_categorie_id'=> $id], '*');
		$this->data['for'] = 'hate';
		$this->data['key'] = 'hate_news_id';
		$this->data['sub_title'] = 'hate_categories';
		$this->data['page'] = 'front/list';
		$this->load_front_view($this->data);
	}
    public function cms_other($id)
	{
		$this->data['list'] = $this->common_model->select('genocide_news', ['status'=> 1, 'genocide_categorie_id'=> $id], '*', 'created_at', 'DESC');
		$this->data['category'] = $this->common_model->select('genocide_categories', ['status'=> 1, 'genocide_categorie_id'=> $id], '*');
		$this->data['for'] = 'other';
		$this->data['key'] = 'genocide_news_id';
		$this->data['sub_title'] = 'genocide_categories';
		$this->data['page'] = 'front/list';
		$this->load_front_view($this->data);
	}
	
    public function cms_article($id= '')
	{
		$this->data['list'] = $this->common_model->select('articles', ['status'=> 1], '*', 'created_at', 'DESC');
		$this->data['for'] = 'articles';
		$this->data['key'] = 'article_id';
		$this->data['sub_title'] = '';
		$this->data['page'] = 'front/list';
		$this->load_front_view($this->data);
	}
	
    public function cms_news($id= '')
	{
		$this->data['list'] = $this->common_model->select('news', ['status'=> 1], '*', 'created_at', 'DESC');
		$this->data['for'] = 'news';
		$this->data['key'] = 'news_id';
		$this->data['sub_title'] = 'news';
		$this->data['page'] = 'front/list';
		$this->load_front_view($this->data);
	}
	
    public function cms_video($id= '')
	{
		$this->data['list'] = $this->common_model->select('videos', ['status'=> 1], '*', 'created_at', 'DESC');
		$this->data['for'] = 'videos';
		$this->data['key'] = 'video_id';
		$this->data['sub_title'] = '';
		$this->data['page'] = 'front/list';
		$this->load_front_view($this->data);
	}
	
	public function timeline()
	{
		$this->data['list'] = $this->common_model->select('timelines', ['status'=> 1], '*', 'created_at', 'DESC');
		$this->data['for'] = 'timeline';
		$this->data['key'] = 'timeline_id';
		$this->data['sub_title'] = '';
		$this->data['page'] = 'front/timeline';
		$this->load_front_view($this->data);
	}
	
    public function cms_page($page_slug= '')
	{
		$this->data['list'] = $this->common_model->select('cms', ['page_slug'=> $page_slug], '*');
		if(empty($this->data['list'])){
		    redirect('/', 'refersh');
		}
		$this->data['details'] = $this->data['list'][0];
		$this->data['page'] = 'front/cmd_page';
		$this->load_front_view($this->data);
	}
	
    public function details($for, $id)
	{
	    if($for == 'hate'){
	        $table = 'hate_news';
	        $key = 'hate_news_id';
	        $this->data['category'] = $this->common_model->select('hate_categories', ['status'=> 1, 'hate_categorie_id'=> $id], '*');
	        $this->data['images'] = $this->common_model->select('hate_news_images', ['status'=> 1, 'hate_news_id'=> $id], '*');
	        $this->data['sub_title'] = '';
	        $this->data['path'] = 'hate';
	    }
	    else if($for == 'legal'){
	        $table = 'legal_news';
	        $key = 'legal_news_id';
	        $this->data['category'] = $this->common_model->select('legal_categories', ['status'=> 1, 'legal_categorie_id'=> $id], '*');
	        $this->data['images'] = $this->common_model->select('legal_news_images', ['status'=> 1, 'legal_news_id'=> $id], '*');
	        $this->data['sub_title'] = 'legal_categories';
	        $this->data['path'] = 'legal';
	    }
	    else if($for == 'timeline'){
	        $table = 'timelines';
	        $key = 'timeline_id';
	        $this->data['sub_title'] = '';
	        $this->data['path'] = '';
	    }
	    else if($for == 'nrc'){
	        $table = 'nrc_news';
	        $key = 'nrc_news_id';
	        $this->data['category'] = $this->common_model->select('nrc_categories', ['status'=> 1, 'nrc_categorie_id'=> $id], '*');
	        $this->data['images'] = $this->common_model->select('nrc_news_images', ['status'=> 1, 'nrc_news_id'=> $id], '*');
	        $this->data['sub_title'] = '';
	        $this->data['path'] = 'news';
	    }
	    else if($for == 'other'){
	        $table = 'genocide_news';
	        $key = 'genocide_news_id';
	        $this->data['category'] = $this->common_model->select('genocide_categories', ['status'=> 1, 'genocide_categorie_id'=> $id], '*');
	        $this->data['images'] = $this->common_model->select('genocide_news_images', ['status'=> 1, 'genocide_news_id'=> $id], '*');
	        $this->data['sub_title'] = '';
	        $this->data['path'] = 'other';
	    }
	    else if($for == 'articles'){
	        $table = 'articles';
	        $this->data['images'] = $this->common_model->select('article_images', ['status'=> 1, 'article_id'=> $id], '*');
	        $key = 'article_id';
	        $this->data['sub_title'] = '';
	        $this->data['path'] = 'article';
	    }
	    else if($for == 'news'){
	        $table = 'news';
	        $this->data['images'] = $this->common_model->select('news_images', ['status'=> 1, 'news_id'=> $id], '*');
	        $key = 'news_id';
	        $this->data['sub_title'] = '';
	        $this->data['path'] = 'news_2';
	    }
	    else if($for == 'videos'){
	        $table = 'videos';
	        $key = 'video_id';
	        $this->data['sub_title'] = '';
	    }
	    
		$this->data['list'] = $this->common_model->select($table, [$key=> $id], '*', 'created_at', 'DESC');
		if(empty($this->data['list'])){
		    redirect('/', 'refresh');
		}
		$this->data['for'] = $table;
		$this->data['list'] = $this->data['list'][0];
		$this->data['page'] = 'front/details';
		$this->load_front_view($this->data);
	}
	
	/*
	    ** Details for article
	*/
	public function article_details($id)
	{
		$this->data['list'] = $this->common_model->select('articles', ['article_id'=> $id], '*', 'created_at', 'DESC');
		if(empty($this->data['list'])){
		    redirect('/', 'refresh');
		}
		$this->data['for'] = 'article';
		$this->data['list'] = $this->data['list'][0];
		$this->data['page'] = 'front/other_details';
		$this->load_front_view($this->data);
	}
	/*
	    ** Details for news
	*/
	public function news_details($id)
	{
		$this->data['list'] = $this->common_model->select('news', ['news_id'=> $id], '*', 'created_at', 'DESC');
		if(empty($this->data['list'])){
		    redirect('/', 'refresh');
		}
		$this->data['for'] = 'news';
		$this->data['list'] = $this->data['list'][0];
		$this->data['page'] = 'front/other_details';
		$this->load_front_view($this->data);
	}
	/*
	    ** Details for video
	*/
	public function video_details($id)
	{
		$this->data['list'] = $this->common_model->select('videos', ['video_id'=> $id], '*', 'created_at', 'DESC');
		if(empty($this->data['list'])){
		    redirect('/', 'refresh');
		}
		$this->data['for'] = 'video';
		$this->data['list'] = $this->data['list'][0];
		$this->data['page'] = 'front/other_details';
		$this->load_front_view($this->data);
	}
	
	/*
	    State wise all data list
	*/
	public function state_wise_list($id)
	{
	    $where = array('status'=> 1, 'state_id'=>$id);
		$articles = $this->common_model->select('articles', $where, '*', 'created_at', 'DESC');
		$other = $this->common_model->select('genocide_news', $where, '*', 'created_at', 'DESC');
		$hate_news = $this->common_model->select('hate_news', $where, '*', 'created_at', 'DESC');
		$legal_news = $this->common_model->select('legal_news', $where, '*', 'created_at', 'DESC');
		$nrc_news = $this->common_model->select('nrc_news', $where, '*', 'created_at', 'DESC');
		
		$all = (object) array_merge( (array) $articles, (array) $other, (array) $hate_news, (array) $legal_news, (array) $nrc_news); 
		$this->data['list'] = $all;
		$this->data['page'] = 'front/list';
		$this->load_front_view($this->data);
	}
	
	
	public function joinUsEmailSave()
	{ 
		$postData = $this->input->post();
		if (!empty($postData)) {
			if($postData['email'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Article Title is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$this->data['email'] = $postData['email'];
			
		    $this->data['created'] = date('Y-m-d');
			if($article_id = $this->common_model->add('subscribe_list', $this->data)){
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Email saved successfully'), 'result' => array('data' => $this->obj));
			}else{
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to save Email'), 'result' => array('data' => $this->obj));
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}
	
    /*-------Gallery/ footer image -----------*/ 
	public function gallery($id= '')
	{
		$this->data['categories'] = $this->common_model->select('gallery_categories', ['status'=> 1], '*', 'name', 'asc');
		$this->data['list'] = $this->common_model->select('gallery_master', ['status'=> 1], '*', 'created_at', 'DESC');
		$this->data['for'] = 'gallery_master';
		$this->data['key'] = 'gallery_id';
		$this->data['page'] = 'front/gallery';
		$this->load_front_view($this->data);
	}
	
	
	
	
	
	
	
	
	
	/**
	 * @request params 
	 * f_name, l_name, email, mobileno, password, d_udid
	 */
	public function registration()
	{
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		if (!empty($postData)) {
			if($postData['f_name'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'First name is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['l_name'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Last name is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['email'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Email is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['mobileno'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Mobile no is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['password'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Password is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['d_udid'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Device not found'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$where = array('email'=> $postData['email'], 'status !='=> 3);			
			$userData = $this->common_model->select_row('users', $where, 'users.*');
			if(!empty($userData)){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Email is already exists'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}

			//mobile number validation
			$where = array('mobile'=> $postData['mobileno'], 'status !='=> 3);
			$userData = $this->common_model->select_row('users', $where, 'users.*');
			if(!empty($userData)){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Mobile no is already exists'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			
			$this->data = array(
				'role_id'=> 1,	//Role Id 1 referred to Customer
				'fname'	=> $postData['f_name'],
				'lname'	=> $postData['l_name'],
				'mobile'	=> $postData['mobileno'],
				'email'	=> $postData['email'],
				'password'	=> MD5($postData['password']),
				'device_id'	=> $postData['d_udid'],
			);
			if($user_id = $this->common_model->add('users', $this->data)){
				$this->data = array('u_id' => $user_id);
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Registration successfully done'), 'result' => array('data' => (object)$this->data));
			}
			else{
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to register'), 'result' => array('data' => $this->obj));
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}
	/**
	 * @request params 
	 * email, password,
	 * Response object data
	 */
	public function login()
	{
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		if (!empty($postData)) {
			if($postData['source'] =="" || $postData['email'] == "" || $postData['password'] == ""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Incomplete request'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$where = array('email'=> $postData['email'], 'password'=> MD5($postData['password']));
			if($postData['source'] != 'WEB'){
				//check udid
				// if($postData['d_udid'] ==""){
				// 	$this->response = array('status' => array('error_code' => 1, 'message' => 'Incomplete request'), 'result' => array('data' => $this->obj));
				// 	$this->outputJson($this->response);
				// }
				$where['role_id !=']	=	0;
			}
			$userData = $this->common_model->select_row('users', $where, 'users.*');
			if(!empty($userData)){
				if($userData->status == 2){
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Account is disabled by the admin'), 'result' => array('data' => $this->obj));
					$this->outputJson($this->response);
				}
				if($postData['source'] === 'WEB'){
				    $otp = mt_rand(11111, 99999);
					$this->session->set_userdata('temp_admin_user', $userData);	
					$sub='Login Authentication';
 		            $msg='Hi '.$postData['email']. ', Your authentication OTP is : '.$otp;
 		            $this->sendmail($sub, $msg);
				}else{
					//update device_id
					$this->common_model->update($postData['table'], ['device_id' => $postData['d_udid']], ['user_id' => $userData->user_id]);
				}

				$this->response = array('status' => array('error_code' => 0, 'message' => 'success'), 'result' => array('data' => $userData, 'otp'=> $otp));
			}else{
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to authenticated'), 'result' => array('data' => $this->obj));
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}
	
	
	public function loginSuccess()
	{
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		if (!empty($postData)) {
            $this->session->set_userdata('admin_user', $userData=$this->session->userdata('temp_admin_user'));
			
			$this->response = array('status' => array('error_code' => 0, 'message' => 'success'), 'result' => array('data' => (object)$userData));
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}

	/**
	 * @request params 
	 * u_id, f_name, l_name, email, mobileno, profileimage, d_udid
	 * 24/09
	 */
	public function updateProfile()
	{
		$postData = $this->input->post();
		if (!empty($postData)) {
			if($postData['f_name'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'First name is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['l_name'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Last name is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['email'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Email is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['mobileno'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Mobile no is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['u_id'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Incomplete request'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}

			$this->auth($postData['u_id']);

			$this->data = array(
				'fname'	=> $postData['f_name'],
				'lname'	=> $postData['l_name'],
				'mobile'	=> $postData['mobileno'],
				'email'	=> $postData['email'],
			);
			if($_FILES['profileimage']['name']){
				$filename = $_FILES['profileimage']['name'];
				$allowed =  array('gif', 'png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF');
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
	
				if (in_array($ext, $allowed)) {
					$image_file = time().'_'.$postData['u_id']."." . $ext;
					$imgPath = getcwd()."/uploads/user/".$image_file;
					if(move_uploaded_file($_FILES['profileimage']['tmp_name'], $imgPath)){
						$this->data['profile_image'] = $image_file;
					}else{
						$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to update information'), 'result' => array('data' => $this->obj));
						$this->outputJson($this->response);
					}
				}else{
					$this->response = array('status' => array('error_code' => 1, 'message' => 'Please choose image file only'), 'result' => array('data' => $this->obj));
					$this->outputJson($this->response);
				}
			}
			// else{
			// 	$this->response = array('status' => array('error_code' => 1, 'message' => 'Profile image is required'), 'result' => array('data' => $this->obj));
			// 	$this->outputJson($this->response);
			// }

			if($this->common_model->update('users', $this->data, ['user_id'=> $postData['u_id']])){
				$select = 'users.*, IF(profile_image IS NULL, "", CONCAT("'.base_url().'uploads/user/",profile_image)) as profile_image';
				$this->data = $this->common_model->select_row('users', ['user_id'=> $postData['u_id']], $select);
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Information successfully update'), 'result' => array('data' => $this->data));
			}
			else{
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to update information'), 'result' => array('data' => $this->obj));
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}

	public function updateDubid()
	{
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		ini_set('display_errors', 1);
		if (!empty($postData)) {
			if($postData['u_id'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['d_udid'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Device not found'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$this->auth($postData['u_id']);
			
			if($this->common_model->update('users', ['device_id' => $postData['d_udid']], ['user_id' => $postData['u_id']])){
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Token updated successfully'), 'result' => array('data' => $userData));
			}else{
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Failed to update token'), 'result' => array('data' => $userData));
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}

	/**
	 * Set presence status
	 * @request u_id, status
	*/
	public function setPresenceStatus()
	{
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		ini_set('display_errors', 1);
		if (!empty($postData)) {
			if($postData['u_id'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['status'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Incomplete request'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$this->auth($postData['u_id']);
			
			if($this->common_model->update('users', ['presence_status' => $postData['status']], ['user_id' => $postData['u_id']])){
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Status updated successfully'), 'result' => array('data' => $userData));
			}else{
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Failed to update status'), 'result' => array('data' => $userData));
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}
	/**
	 * get presence status
	 * @request u_id
	*/
	public function getPresenceStatus()
	{
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		ini_set('display_errors', 1);
		if (!empty($postData)) {
			if($postData['u_id'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$this->auth($postData['u_id']);
			
			if($this->arr = $this->common_model->select_row('users', ['user_id' => $postData['u_id']], 'users.presence_status')){
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => array('data' => $this->arr));
			}else{
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Failed'), 'result' => array('data' => $this->obj));
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}

	public function getProfile()
	{
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		if (!empty($postData)) {
			if($postData['u_id'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$this->auth($postData['u_id']);
			$select = 'users.*, IF(users.profile_image IS NULL, "", CONCAT("'.base_url().'uploads/user/",users.profile_image)) as profile_image,';
			if( $this->obj = $this->common_model->select_row('users', ['user_id' => $postData['u_id'], 'role_id !='=>0], $select)){
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => array('data' =>  $this->obj));
			}else{
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Failed to authenticate user'), 'result' => array('data' =>  $this->obj));
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}
		$this->outputJson($this->response);
	}
	/**
	 * @request email
	 * 24/09
	 */
	public function forgotPassword()
	{
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		if (!empty($postData)) {
			if($postData['email'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Email is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}

			if(! $this->common_model->select_row('users', ['email'=> $postData['email'], 'status'=> 1, 'role_id !='=> 0], 'users.user_id')){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to find email'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			$otp =	rand(1111, 9999);
			$siteData = $this->common_model->select_row('site_settings', ['id'=> 1], 'site_settings.*');
			$params['name']         =    $siteData->name?$siteData->name:'Pink Delivery';
			$params['to']           =    $postData['email'];
			$params['subject']      =   'Forgot password OTP';
			$params['user_name']    =    $postData['email'];
			$params['from_email']   =	$siteData->email?$siteData->email:'info@pinkdelivery.com';
			$mail_temp              =    file_get_contents('./global/mail/forgotpassword_template.html');
			$mail_temp  =  str_replace("{web_name}",$siteData->name?$siteData->name:'Pink Delivery',$mail_temp);
			$mail_temp  =  str_replace("{web_logo}",$this->logo,$mail_temp);
			$mail_temp  =  str_replace("{user_name}",$params['user_name'],$mail_temp);
			$mail_temp  =  str_replace("{otp}", $otp, $mail_temp);
			$mail_temp  =  str_replace("{current_year}", date('Y'), $mail_temp);
			$params['message']      =    $mail_temp;
			//echo $mail_temp;die;
			if(send_mail($params)){
				$this->common_model->update('users', ['_token'=> $otp], ['email'=> $postData['email'], 'status'=> 1]);
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Password recovery mail send to your email'), 'result' => array('data' =>  (object)['otp'=> $otp]));
			}else{
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to proceed your request'), 'result' => array('data' => $this->obj));
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}
		$this->outputJson($this->response);
	}
	/**
	 * @request email, otp, password
	 * 24/09
	*/
	public function resetPassword()
	{
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		if (!empty($postData)) {
			if($postData['email'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Email is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['password'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Password is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['otp'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'OTP is required'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}

			if(!$user = $this->common_model->select_row('users', ['email'=> $postData['email'], 'status'=> 1, '_token'=> $postData['otp']], 'users.user_id')){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to authenticate'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			//echo $mail_temp;die;
			if($this->common_model->update('users', ['password'=> MD5($postData['password']), '_token'=> null], ['user_id'=> $user->user_id])){
				$this->response = array('status' => array('error_code' => 0, 'message' => 'Password updated successfully'), 'result' => array('data' =>  $this->obj));
			}else{
				$this->common_model->update('users', ['_token'=> $postData['otp']], ['email'=> $postData['email'], 'status'=> 1, '_token'=> $postData['otp']]);
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to updated your password'), 'result' => array('data' =>  $this->obj));
			}
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}
		$this->outputJson($this->response);
	}
	
	/**
	 * Logout API genocide
	 */
	public function logout()
	{
		$this->isJSON(file_get_contents('php://input'));
		$postData = $this->extract_json(file_get_contents('php://input'));
		if (!empty($postData)) {
			if($postData['source'] ==""){
				$this->response = array('status' => array('error_code' => 1, 'message' => 'Incomplete request'), 'result' => array('data' => $this->obj));
				$this->outputJson($this->response);
			}
			if($postData['source'] === 'WEB'){
				$this->session->unset_userdata('admin_user');					
			}
			// else{

			// }

			$this->response = array('status' => array('error_code' => 0, 'message' => 'Logout successfully'), 'result' => array('data' => []));
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}

		$this->outputJson($this->response);
	}
	
	
    // 	Email function
    function sendmail($sub,$message)
    {
     $config = Array(
     	 'protocol' => 'smtp',
     	 'smtp_host' => 'ssl://smtp.googlemail.com',
     	 'smtp_port' => 465,
     	 'smtp_user' => 'isaafaurigabh@gmail.com',
     	 'smtp_pass' => 'auriga@786',
     	 'mailtype'  => 'html',
     	 //'charset'   => 'iso-8859-1'
     	 'charset'   => 'utf-8'
     );
     	 $this->load->library('email',$config); // load email library
     	 $this->email->set_newline("\r\n");
     	 $this->email->from('info@bmwll.com', 'Genocide');
     	 $this->email->to('developersk116@gmail.com');
     	// $this->email->cc('khasimsaheb15@gmail.com');
     	 $this->email->subject($sub);
     	 $this->email->message($message);
     	 if ($this->email->send())
     			 return true;
     	 else
     			return false;
    }
}