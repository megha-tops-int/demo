<?php

/*
  @Description: Admin dashboard
  @Author: Hardik Devariya
  @Input:
  @Output:
  @Date: 11-12-2015
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{ 
    function _construct()
    {
        parent::__construct();
        $this->admin_session = $this->session->userdata('junction_studio_admin_session');       
        check_admin_login();
        $this->load->model('common_function_model'); 		
    }

    public function index()
    {
        // Set Page Title 
        $this->page_title = $this->lang->line('dashboard');
        
        $doc_session_array = $this->session->userdata('junction_studio_admin_session');
        ($doc_session_array['active'] == true) ? $this->display_dashbord() : redirect('admin/login');
    }
	
    /*
    @Description: Display admin dashboard
    @Author: Hardik Devariya
    @Input:
    @Output:
    @Date: 11-12-2015
    */    
    public function display_dashbord()
    {
	
        $data['msg'] = ($this->uri->segment(3) == 'msg') ? $this->uri->segment(4) : '';
        
        $data['main_content'] = "admin/home/dashboard";
        $this->load->view('admin/include/template',$data);
    }
}