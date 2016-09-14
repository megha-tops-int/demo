<?php

/*
  @Description: login controller
  @Author: Hardik Devariya
  @Input:
  @Output:
  @Date: 11-12-2015
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
        
        $this->load->model('common_function_model');
       
        $this->data = array();
        $this->message_session = $this->session->userdata('message_session');
        $this->table_name = 'admin_users';
    }

    public function index() 
    {
        $admin_session = $this->session->userdata('junction_studio_admin_session');        
        if ($admin_session['active'] === TRUE) 
        {
            redirect('admin/dashboard');
        }
        else 
        {
            $this->do_login();
        }
    }
    
    /*
    @Description: login function
    @Author: Hardik Devariya
    @Input:username, password
    @Output:
    @Date: 11-12-2015
    */
    public function do_login() 
    {
        $email = $this->input->post('email');
        $password = $this->common_function_model->encrypt_script($this->input->post('password'));
        $forgot_password = $this->input->post('forgot_email');

        if ($forgot_password) 
        {
            $this->forgetpw_action();
        }
        else 
        {
            if ($email && $password) 
            {
                $email1 = '';
                $password1 = '';

                $field = array('id', 'name', 'email', 'status');
                $match = array('email' => $email, 'password' => $password);
                $udata = $this->common_function_model->select($this->table_name,$field, $match, '', '=');                

                if (count($udata) > 0) 
                {
                    if ($udata[0]['status'] == 1) 
                    {
                        $newdata = array(
                            'name' => $udata[0]['name'],
                            'id' => $udata[0]['id'],
                            'useremail' => $udata[0]['email'],
                            'active' => TRUE);
                        
                        $this->session->set_userdata('junction_studio_admin_session', $newdata);
                        
                        redirect('admin/dashboard');                        
                    }
                    else 
                    {
                        $msg = $this->lang->line('inactive_account');
                        $newdata = array('msg' => $msg);
                        $data['msg'] = $msg;
                        $this->load->view('admin/login/login', $data);
                    }                    
                }
                else 
                {
                    $msg = $this->lang->line('invalid_us_pass');
                    $newdata = array('msg' => $msg);
                    $data['msg'] = $msg;
                    $this->load->view('admin/login/login', $data);
                }
            }
            else 
            {
                $this->message_session = $this->session->userdata('message_session');
                //pr($this->message_session);exit;
                $data['msg'] = !empty($this->message_session['msg'])?$this->message_session['msg']:'';
                $this->load->view('admin/login/login', $data);
            }
        }
    }

    /*
      @Description : Function to generate password and email the same to user
      @Author      : Parth Khatri
      @Input       : email address
      @Output      : password to the email address
      @Date        : 06-05-14
     */
    public function forgetpw_action() {
        $email = $this->input->post('forgot_email');

        $fields = array('id', 'name', 'email', 'password');
        $match = array('email' => $email);
        $result = $this->common_function_model->select($this->table_name,$fields, $match, '', '=');

        if ((count($result)) > 0) {
            $name = $result[0]['name'];
            $email = $result[0]['email'];
            
            $password = $this->common_function_model->decrypt_script($result[0]['password']);
            $encBlastId = urlencode(base64_encode($result[0]['id']));
            // Email Start

            $loginLink = $this->config->item('base_url') . 'reset_password/reset_password_template/' . $encBlastId;
            
            $pass_variable_activation = array('name' => $name, 'email' => $email, 'password' => $password, 'loginLink' => $loginLink);
            $data['actdata'] = $pass_variable_activation;
            
            $activation_tmpl = $this->load->view('reset_password/reset_password_link/list', $data, true);

            $email = $this->input->post('forgot_email');
            $sub = $this->config->item('sitename') . " : Admin Forgot Password";

            $from = $this->config->item('admin_email');
           $sendmail = $this->common_function_model->send_email($email, $sub, $activation_tmpl, $from);
            $msg = "Mail Sent Successfully";
        } else {
            $msg = "No Such User Found";
        }
        
        $newdata = array('msg' => $msg);
        $data['msg'] = $msg;
        $this->load->view('admin/login/login', $data);
    }

}
