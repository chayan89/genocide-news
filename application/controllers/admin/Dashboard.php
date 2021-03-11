<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        ini_set('display_errors', 1);
        parent::__construct();
        $this->load->model('mcommon');
        $this->obj=new stdClass();
        $this->data = [];
    } 
    public function index() {
        if($this->admin){
            $this->load_dashboard_view();
        }
        else{
           redirect('/admin');
        }
    }
    
    public function load_dashboard_view(){
        $this->data = [];
        $this->data['todos']    = json_encode($this->common_model->select('todos', ['status'=> 1], '*', 'todo_id', 'DESC'));
        $this->data['content']    = 'admin/dashboard';        
        $this->load->view('admin/layouts/index', $this->data);
    }


    public function get()
    {   
         ini_set('display_errors', 1);
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));
        //print_r($postData);die;
        if (!empty($postData)) {
            if($postData['source'] ==""){
                $this->response = array('status' => array('error_code' => 1, 'message' => 'Incomplete request'), 'result' => array('data' => $this->obj));
                $this->outputJson($this->response);
            }
            if($postData['source'] === 'WEB'){
                //
            }else{
               // $where = array('orders.order_status'=> 2);
            }
            $join = array(
                        'users'=>'orders.user_id = users.user_id',
                     );

            if($postData['status_id'] > 1){
                $where = array('orders.order_status'=>$postData['status_id']);
            } elseif ($postData['status_id']==1){
                $where = '';   
            } else {
                $where = array('orders.order_status'=>2);     
            }

            if($postData['source'] === 'WEB'){
                $this->data['details'] = $this->mcommon->deshboardorderlist('orders',$where,$join,'INNER');

               if (!empty($this->data['details'] )) {
                
                foreach ($this->data['details'] as $key => $value) {
                         $ack='';
                         if($value['order_status']==1){ 
                          $status='<span>Schedule</span>';
                          } else if($value['order_status']==2){ 
                           $status='<span>New</span>';
                          } else if($value['order_status']==3){
                           $status='<span>Deliverd</span>';
                          } else if($value['order_status']==4){
                            $status='<span>Cancelled</span>';
                            $ack='<a href="'.base_url("admin/order/reassigning/".$value['order_id']).'"><span>Reassigning</span></a>';
                          } 

                          if(isset($value['order_date'])){
                            $order_date=$value['order_date'];
                            $dateValue=strtotime($order_date); 
                            $yr = date("Y", $dateValue) ." "; 
                            $date = date("d", $dateValue);
                           }else {
                            $order_date='null';
                           }

                          if(isset($value['delivery_date'])){
                            $delivery_date=$value['delivery_date'];
                            //$dateValue1=strtotime($delivery_date); 
                            $middle = strtotime($delivery_date);            
                            $yr = date("Y", $middle) ." "; 
                            $mon = date("m", $middle)." ";
                            $date = date("d", $middle); 
                            $delivery_date=$date.' '.date('M', $middle).' ,'.$yr.' ,'.date("h.i A", $middle); 
                            }else {
                            $delivery_date='Null';
                            }
                      

                    $html .= '<tr>
                        <td>' . ($key+1) . '</td>
                        <td>' . $value['order_id'] . '</td>
                        <td>' .'$'. number_format($value['total_amount'], 2) . '</td>
                        <td>' . $date.' '.date('M', $dateValue).' ,'.$yr.' ,'.date("h.i A", $dateValue) . '</td>
                        <td>' . $delivery_date. '</td>
                        <td>' . $value['fname'] . '</td>
                        <td>' . $value['mobile'] . '</td>
                        <td>' . $value['fname'] . '</td>';
                        
                    if($value['order_status']==4){    
                        $html .= '<td>' . $ack.'</td>';
                    }else {
                        $html .='<td>' . $status.'</td>'; 
                    }
                        $html .= '</tr>';
                }

                }else{
                    
                    $html ='<tr><td col-span="9">No Data Available </td></tr>';
                }
                // print_r($this->data['details']);
                // $html = $this->load->view('admin/ajax-view', $this->data, true);
                $this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => $html);
            }else{
                if(!empty($this->data)){
                    $this->response = array('status' => array('error_code' => 0, 'message' => 'Success'), 'result' => array('data' => $this->data));
                }else{
                    $this->response = array('status' => array('error_code' => 0, 'message' => 'No data found'), 'result' => array('data' => $this->data));
                }
            }
        }
        else {
            $this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->data));
        }

        $this->outputJson($this->response);
    }
    
    public function changeStatus()
    {
        //echo "fshdfjksh";exit;
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));
        //pr($postData);
        if ($postData) {
            //echo "dsfn";exit;
            if ($this->common_model->update($postData['table'], ['status' => $postData['status']], [$postData['indexKey'] => $postData['id']])) {
                //echo $this->db->last_query(); exit;
                //echo "344";exit;
                $this->response = array('status' => array('error_code' => 0, 'message' => 'Status Changed Successfully'), 'result' => array('data' => $this->obj));
            } else {
                //echo "777";exit;                  
                $this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to Process Data'), 'result' => array('data' => $this->obj));
            }
        } else {
            //echo "4324";exit;
            $this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to Parse Request Data'), 'result' => array('data' => $this->obj));
        }
        //pr($this->response);
        $this->outputJson($this->response);
    }
    
    /*--------------Admin Profile View----------*/ 
    public function adminProfile() {
        $this->checkAdminAuth();
		$this->data['page'] = 'admin/profile';
		$this->load_view($this->data);
    }

    public function passwordSave()
	{
		$postData = $this->input->post();
		if (!empty($postData)) {
			$old_password = $postData['old_password'];
			if($this->admin->password != MD5($old_password)){
                $this->response = array('status' => array('error_code' => 1, 'message' => 'Old Password not matched'), 'result' => array('data' => $this->obj));
                $this->outputJson($this->response);
			}
			$this->data['password'] = MD5($postData['new_password']);
            $this->data['updated_at'] = date('Y-m-d H:i:s');
            if($this->common_model->update('users', $this->data,['user_id '=> $this->admin->user_id])){
                $this->response = array('status' => array('error_code' => 0, 'message' => 'Password updated successfully'), 'result' => array('data' => $this->obj));
            }else{
                $this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to update password'), 'result' => array('data' => $this->obj));
            }
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}
        //_leq();
		$this->outputJson($this->response);
	}
    public function profileSave()
	{
		$postData = $this->input->post();
		if (!empty($postData)) {
			$this->data = $postData;
            $this->data['updated_at'] = date('Y-m-d H:i:s');
            if($this->common_model->update('users', $this->data,['user_id '=> $this->admin->user_id])){
                $this->admin->fname = $postData['fname'];
                $this->admin->email = $postData['email'];
                $this->admin->address = $postData['address'];
                $this->session->set_userdata('admin_user', $this->admin);
                $this->response = array('status' => array('error_code' => 0, 'message' => 'Profile data updated successfully'), 'result' => array('data' => $this->obj));
            }else{
                $this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to update profile'), 'result' => array('data' => $this->obj));
            }
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}
        //echo $this->db->last_query();
		$this->outputJson($this->response);
	}
	
	//save todos
    public function todoSave()
	{
		$postData = $this->input->post();
		if (!empty($postData)) {
			$this->data['content'] = $postData['content'];
            if($this->common_model->add('todos', $this->data)){
                $data = $this->common_model->select('todos', ['status'=> 1], '*', 'todo_id', 'DESC');
                $this->response = array('status' => array('error_code' => 0, 'message' => 'Todo added successfully'), 'result' => array('data' => $data));
            }else{
                $this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to add todo'), 'result' => array('data' => $this->obj));
            }
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}
        //echo $this->db->last_query();
		$this->outputJson($this->response);
	}

    public function todoRemove()
	{
		$postData = $this->input->post();
		if (!empty($postData)) {
			$this->data['status'] = 0;
            if($this->common_model->update('todos', $this->data,['todo_id '=> $postData['id']])){
                $data = $this->common_model->select('todos', ['status'=> 1], '*', 'todo_id', 'DESC');
                $this->response = array('status' => array('error_code' => 0, 'message' => 'Todo removed successfully'), 'result' => array('data' => $data));
            }else{
                $this->response = array('status' => array('error_code' => 1, 'message' => 'Unable to remove todo'), 'result' => array('data' => $this->obj));
            }
		}
		else {
			$this->response = array('status' => array('error_code' => 1, 'message' => 'BAD REQUEST'), 'result' => array('data' => $this->obj));
		}
        //echo $this->db->last_query();
		$this->outputJson($this->response);
	}
}