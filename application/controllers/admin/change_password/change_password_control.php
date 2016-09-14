<?php 
/*
    @Description: tips controller
    @Author: Parth Khatri
    @Date: 06-05-14
	
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class change_password_control extends CI_Controller
{	
    function __construct()
    {	
        parent::__construct();
        $this->admin_session = $this->session->userdata('junction_studio_admin_session');
        $this->load->model('common_function_model');
        $this->viewName = $this->router->uri->segments[2];
        
        // Set Page Title 
        $this->page_title = $this->lang->line('change_password');
    }
    /*
    @Description: Function for Get password
    @Author: Parth Khatri
    @Date: 06-05-14
    */
    public function index()
    {	
		
		//$data['msg'] = ($this->uri->segment(3) == 'msg') ? $this->uri->segment(4) : '';
		$data['main_content'] = "admin/".$this->viewName."/change_password";
        $this->load->view('admin/include/template', $data);
    }
    /*
    @Description: Function for Update password
    @Author: Parth Khatri
    @Input: - Update details of password
    @Output: - List with updated password details
    @Date: 07-05-14
    */
    public function admin_change_password()
    {
		$id = $this->admin_session['id'];
		$password = $this->common_function_model->encrypt_script($this->input->post('oldpassword'));
		
		$fields = array('id','email');
		$match = array('id'=>$id, 'password'=>$password);
		$result = $this->common_function_model->select('admin_users',$fields,$match,'','=');
	
		if(!empty($result) && count($result)>0)
		{
			$cdata['id'] = $id;
			$cdata['password'] = $this->common_function_model->encrypt_script($this->input->post('password'));
                        $match = array('id'=>$id);
			$update = $this->common_function_model->update('admin_users',$cdata,$match);
			$this->session->set_userdata('change_password_session',$this->lang->line('password_change_succ'));
			redirect('admin/'.$this->viewName);		
		}
		else
		{
			$this->session->set_userdata('change_password_session',$this->lang->line('invalid_old_password'));
			$this->session->userdata('change_password_session');
			//print_r($session_data);exit;
			redirect('admin/'.$this->viewName);
		}
       
    }
   
}