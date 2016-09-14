<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('common_function_model');
    }

    public function index()
    {
        $this->display_dashbord();
    }

    /*
      @Description  : Home page display
      @Author       : Hardik Devariya
      @Date         : 22-02-2016
    */      
    public function display_dashbord()
    {
        $match = array("id" => 1);
        $youtube_video_list = $this->common_function_model->select('settings_master','',$match,'','=', '', '','','id','DESC');
        $data['youtube_video_list'] = $youtube_video_list;
        $data['main_content'] = 'front/index/home';
        $this->load->view('front/include/template', $data);
    }
}