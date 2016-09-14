<?php

/*
  @Description: Reset Password
  @Author: Kaushik Valiya
  @Input:
  @Output:
  @Date: 11-06-2015

 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reset_password_control extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->admin_session = $this->session->userdata($this->lang->line('common_admin_session_label'));
        $this->message_session = $this->session->userdata('message_session');

        $this->load->model('Common_function_model');
        $this->viewName = $this->router->uri->segments[2];
    }

    /*
      @Description: Function for Get All Template
      @Author: Kaushik Valiya
      @Input: - load templated
      @Output: -
      @Date: 17-09-2014
     */

    public function index() {

        $data['main_content'] = 'reset_password/' . $this->viewName . "/list";
        $this->load->view('reset_password/include/template', $data);
    }

    /*
      @Description: Function Load Reset Password Template
      @Author: Kaushik Valiya
      @Input: - Forgot Password
      @Output: - Send Email Template
      @Date: 17-09-2014
     */

    public function reset_password_template() {

        $id = $this->router->uri->segments[3];
        $admin_id = base64_decode(urldecode($id));
        if (!empty($admin_id)) {
            $fields = array('id,name,email');
            $match = array('id' => $admin_id);
            $exist_email = $this->Common_function_model->select('admin_users', $fields, $match, '', '=', '', '', '', 'id', 'asc', '');
           
            if(!empty($exist_email))
            {
                $data['main_content'] = "reset_password/reset_password_link/add";
                $this->load->view('reset_password/include/template', $data);
            }else
            {
                $msg = $this->lang->line('wrong_data_error');
                $newdata = array('msg' => $msg);
                $this->session->set_userdata('message_session', $newdata);
                redirect('admin');
            }
            
         //   echo $this->db->last_query();exit;
        }else
        {
            $msg = $this->lang->line('wrong_data_error');
            $newdata = array('msg' => $msg);
            $this->session->set_userdata('message_session', $newdata);
            redirect('admin');
        }
      
       
        //redirect($this->viewName);
    }

    public function reset_password_template_front() {

        $data['main_content'] = 'reset_password/reset_password_link/add';
        $this->load->view('reset_password/include/template', $data);
    }

    /*
      @Description: Function Load Reset Password
      @Author: Kaushik Valiya
      @Input: - Forgot Password in Add New password
      @Output: - login Admin/user
      @Date: 17-09-2014
     */

    public function change_password() {
        //pr($_POST);exit;
        $id = $this->input->post('id');
        $admin_id = base64_decode(urldecode($id));
        $password = $this->input->post('txt_npassword');
        $reset_pass['password'] = $this->Common_function_model->encrypt_script($password);
        $reset_pass['id'] = $admin_id;
        $reset_pass['modifiedDate'] = date('Y-m-d: H-m-i');
        if (!empty($admin_id)) {
            $fields = array('id,name,email');
            $match = array('id' => $admin_id);
            $exist_email = $this->Common_function_model->select('admin_users', $fields, $match, '', '=', '', '', '', 'id', 'asc', '');
            
         //   echo $this->db->last_query();exit;
        } else {

            $msg = $this->lang->line('mail_not_registered');
            $newdata = array('msg' => $msg);
            $this->session->set_userdata('message_session', $newdata);
            redirect('admin');
        }
        
        
        if (!empty($exist_email)) {
            $this->Common_function_model->update('admin_users',$reset_pass,array('id'=>$admin_id));
            
            $msg = $this->lang->line('password_change_succ');
            $newdata = array('msg' => $msg);
            $this->session->set_userdata('message_session', $newdata);
            redirect('reset_password/reset_password_template/'.$id);
        } else {

            $msg = $this->lang->line('password_not_change');
            $newdata = array('msg' => $msg);
            $this->session->set_userdata('message_session', $newdata);

            redirect('admin');
        }
    }

    public function reset_password_front() {
        //pr($_POST);exit;
        $id = $this->input->post('id');
        $user_id = base64_decode(urldecode($id));
        $password = $this->input->post('new_password');
        $reset_pass['password'] = $this->Common_function_model->encrypt_script($password);
        $reset_pass['id'] = $user_id;
        $reset_pass['modified_date'] = date('Y-m-d: H-m-i');
        if (!empty($user_id)) {
            $fields = array('id,first_name,email_id');
            $match = array('id' => $user_id);
            $exist_email = $this->Common_function_model->select_records('user_master', $fields, $match, '', '=', '', '', '', 'id', 'asc', '');
        } else {

            $msg = $this->lang->line('mail_not_registered');
            $newdata = array('msg' => $msg);
            $this->session->set_userdata('message_session', $newdata);
            redirect('login');
        }
        if (!empty($exist_email)) {
            $this->obj->update_user_front($reset_pass, 'user_master');
            $msg = $this->lang->line('password_change_succ');
            $newdata = array('msg' => $msg);
            $this->session->set_userdata('message_session', $newdata);
            redirect('login');
        } else {
            $msg = $this->lang->line('password_not_change');
            $newdata = array('msg' => $msg);
            $this->session->set_userdata('message_session', $newdata);

            redirect('login');
        }
    }

}
