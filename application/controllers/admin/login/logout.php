<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	/*
    @Description: logout controller
    @Author: Mit Makwana
    @Date: 11-08-2015
	
*/
	
	class Logout extends CI_Controller
	{
            public function index()
            {
                $admin_session = $this->session->userdata('junction_studio_admin_session');
                
                if($admin_session['active']==TRUE)
                {
                    $this->session->unset_userdata('junction_studio_admin_session');
                    $this->session->unset_userdata('name');
                    $this->session->unset_userdata('id');
                    $this->session->unset_userdata('useremail');
                    $this->session->unset_userdata('active');
                    $this->session->unset_userdata('junction_studio_admin_session');
                   /* $this->load->helper('cookie');
                    $cookie=  $this->config->item('sess_cookie_name');
                    delete_cookie($cookie);*/
                    redirect('admin/login');
                }
                else
                    redirect('admin/login');
            }
	}
