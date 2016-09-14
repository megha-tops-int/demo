<?php 
/*
    @Description: tips controller
    @Author: Parag Joshi
    @Date: 19-02-2016
	
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_settings_control extends CI_Controller
{	
    function __construct()
    {
        parent::__construct();
        $this->admin_session = $this->session->userdata('junction_studio_admin_session');
        $this->message_session = $this->session->flashdata('message_session');
        check_admin_login();
        $this->load->model('common_function_model');
         $this->load->model('imageupload_model');
        //$this->load->model('admin_model');
        //$this->load->model('general_model');
          ini_set('memory_limit', '-1');
          set_time_limit(0);
        //$this->obj = $this->admin_model;
        $this->viewName = $this->router->uri->segments[2];
    }
    /*
    @Description: Function for Get password
    @Author: Parag Joshi
    @Date: 06-05-14
    */
    public function index()
    {
        $data['editRecord'] = $this->common_function_model->select('settings_master', '', '', '', '','','','','','');
        
        //$data['msg'] = ($this->uri->segment(3) == 'msg') ? $this->uri->segment(4) : '';
        $data['main_content'] = "admin/".$this->viewName."/add";
        $this->load->view('admin/include/template', $data);
    }
    /*
    @Description: Function for Update password
    @Author: Parag Joshi
    @Input: - Update details of password
    @Output: - List with updated password details
    @Date: 07-05-14
    */
    public function update_data()
    {
        $id = $this->input->post('id');
        
        $cdata['video_url']      = trim($this->input->post('video_url'));
        $cdata['instagram_link'] = trim($this->input->post('instagram_link'));
        $cdata['twitter_link']   = trim($this->input->post('twitter_link'));
        $cdata['address_line_1'] = trim($this->input->post('address_line_1'));
        $cdata['address_line_2'] = trim($this->input->post('address_line_2'));
        $cdata['contact_no']     = trim($this->input->post('contact_no'));
        $cdata['email']          = trim($this->input->post('email'));
        $cdata['status'] = '1';
        if (!empty($_FILES['image']['name'])) 
        {
            $oldbookimg = $this->input->post('oldfile');
            $bgImgPath  = $this->config->item('image_site_logo');
            if(!empty($_FILES['image']['name']))
            {  
                $uploadFile = 'image';
                $thumb = "thumb";
                $hiddenImage = !empty($oldbookimg)?$oldbookimg:'';
                $cdata['site_logo'] = $this->imageupload_model->uploadBigImage($uploadFile,$bgImgPath,'','',$hiddenImage,TRUE);
            }
        }
       $this->common_function_model->update('settings_master', $cdata, array('id' => $id));
       $msg = $this->lang->line('common_edit_success_msg');
       $this->session->set_flashdata('message_session', $msg);
        redirect('admin/'.$this->viewName);
    }
   
}