<?php


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "front/index/home";
//$route['front/about'] ="about/about";
$route['404_override'] = 'my404';

// Base URL
$base_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

// Dynamic Route Path
$pos = strpos($base_url,"admin");

if(strpos($base_url,"/admin/")){
	$expo1 = explode("admin/",$base_url);
	$config['base_url'] = $expo1[0];	
	
	$expp = !empty($expo1[1])?$expo1[1]:'';
	
	$expo = explode("/",$expp);
	$conntrol = !empty($expo['0'])?$expo['0']:'';
	
	$flag = '1';
	
}elseif(strpos($base_url,"/ws/")){
	$expo1 = explode("ws/",$base_url);
	$config['base_url'] = $expo1[0];	
	
	$expp = !empty($expo1[1])?$expo1[1]:'';
	
	$expo = explode("/",$expp);
	$conntrol = !empty($expo['0'])?$expo['0']:'';
	
	$flag = '2';
}else{
	$config['base_url'] = $base_url;	
	$flag = '3';
	
	if(!empty($_SERVER['ORIG_PATH_INFO'])){
		$expo1 = explode("/",$_SERVER['ORIG_PATH_INFO']);
	}elseif(!empty($_SERVER['PATH_INFO'])){
		$expo1 = explode("/",$_SERVER['PATH_INFO']);
	}else{
		$expo1 = explode("/",$_SERVER['REQUEST_URI']);
	}
        $conntrol = !empty($expo1['1'])?$expo1['1']:'';
}

if($flag==1){
	$route['admin/'.$conntrol] = "admin/".$conntrol."/".$conntrol."_control";

	$route['admin/' . $conntrol . '/truncate'] = 'admin/' . $conntrol . '/' . $conntrol . '_control/truncate';
	$route['admin/'.$conntrol.'/add_record'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/add_record';
	$route['admin/'.$conntrol.'/check_user'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/check_user';
	$route['admin/'.$conntrol.'/insert_data'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/insert_data';
	$route['admin/'.$conntrol.'/edit_record/(:num)'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/edit_record';
	$route['admin/'.$conntrol.'/view_record/(:num)'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/view_record';
	$route['admin/'.$conntrol.'/view_record_feedback/(:num)'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/view_record_feedback';
	$route['admin/'.$conntrol.'/feedback/(:num)'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/feedback';
	$route['admin/'.$conntrol.'/feedback/(:num)/(:num)'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/feedback';
	$route['admin/'.$conntrol.'/update_data'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/update_data';
	$route['admin/'.$conntrol.'/delete_record'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/delete_record';
	$route['admin/'.$conntrol.'/delete_record/(:num)'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/delete_record';
	$route['admin/'.$conntrol.'/delete_color_record/(:num)'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/delete_color_record';
	$route['admin/'.$conntrol.'/unpublish_record/(:num)'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/unpublish_record';
	$route['admin/'.$conntrol.'/publish_record/(:num)'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/publish_record';
	$route['admin/'.$conntrol.'/ajax_delete_all'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/ajax_delete_all';
	$route['admin/'.$conntrol.'/ajax_delete_all_feedback'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/ajax_delete_all_feedback';
	$route['admin/'.$conntrol.'/ajax_status_all'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/ajax_status_all';
	$route['admin/'.$conntrol.'/export'] = 'admin/'.$conntrol.'/'.$conntrol.'_control/export';
        
        $route['admin/'.$conntrol.'/(:num)'] = 'admin/'.$conntrol.'/'.$conntrol.'_control';
	$route['admin/'.$conntrol.'/msg/(:any)'] = 'admin/'.$conntrol.'/'.$conntrol.'_control';
        $route['admin/'.$conntrol.'/(:any)'] = "admin/".$conntrol."/".$conntrol."_control";
}
else
{
	$route[$conntrol] = "front/".$conntrol."/".$conntrol."_control";
        $route[$conntrol.'/details/(:num)'] = 'front/'.$conntrol.'/'.$conntrol.'_control/details';
        $route[$conntrol.'/diversity'] = 'front/'.$conntrol.'/'.$conntrol.'_control/diversity';
        $route[$conntrol.'/leadership'] = 'front/'.$conntrol.'/'.$conntrol.'_control/leadership';
        $route[$conntrol.'/event_ajax_list'] = 'front/'.$conntrol.'/'.$conntrol.'_control/event_ajax_list';
        $route[$conntrol.'/project_ajax_list'] = 'front/'.$conntrol.'/'.$conntrol.'_control/project_ajax_list';
        $route[$conntrol.'/creativity'] = 'front/'.$conntrol.'/'.$conntrol.'_control/creativity';
        $route[$conntrol.'/wellbeing'] = 'front/'.$conntrol.'/'.$conntrol.'_control/wellbeing';
	$route[$conntrol.'/add_record'] = "front/".$conntrol.'/'.$conntrol."_control".'/add_record';
        $route[$conntrol.'/edit_record/(:num)'] = "front/".$conntrol."/".$conntrol."_control".'/edit_record'; 
	$route[$conntrol.'/check_user'] = "front/".$conntrol.'/'.$conntrol."_control".'/check_user';
	$route[$conntrol.'/forgot_password'] = "front/".$conntrol.'/'.$conntrol."_control".'/forgot_password';
	$route[$conntrol.'/logout'] = "front/".$conntrol.'/'.$conntrol."_control".'/logout';
        //$route[$conntrol.'/contact_us'] = "front/".$conntrol.'/'.$conntrol."_control".'/contact_us';
        $route[$conntrol.'/insert_data_cont_us'] = "front/".$conntrol.'/'.$conntrol."_control".'/insert_data_cont_us';
        $route[$conntrol.'/donations_inseart_data'] = "front/".$conntrol.'/'.$conntrol."_control".'/donations_inseart_data';
        
        
        if($conntrol == 'terms-and-conditions' || $conntrol == 'privacy-policies')
        {
            $route[$conntrol] = "front/page/page_control";
        }        
}
// End

/*----------- Reset Password URL ----------- */

$route['reset_password']                                     = 'reset_password/reset_password_control';
$route['reset_password/change_password']                      = 'reset_password/reset_password_control/change_password';
$route['reset_password/reset_password_front']                = 'reset_password/reset_password_control/reset_password_front';
$route['reset_password/reset_password_template/(:any)']      = 'reset_password/reset_password_control/reset_password_template/';
$route['reset_password/reset_password_template_front/(:any)']= 'reset_password/reset_password_control/reset_password_template_front/';

/*------------ END  Reset Password  URL------------------*/

//For Admin Redirection 
$route['index'] = "index/index";
$route['index/msg/(:any)'] ="index/index";

$route['admin'] = "admin/login/login";
$route['admin/login'] = "admin/login/login";
$route['admin/logout'] = "admin/login/logout";
$route['admin/dashboard'] = "admin/index/dashboard";

// Change Password of admin

$route['admin/change_password_view'] = "admin/change_password/change_password_control";
$route['admin/change_password/admin_change_password'] = "admin/change_password/change_password_control/admin_change_password";
$route['admin/show_time_management/ajax_screendata'] = "admin/show_time_management/show_time_management_control/ajax_screendata";


$route['contact_us'] = "front/page/page_control/contact_us";
$route['donations'] = "front/page/page_control/donations";
$route['index'] = "index/home";
$route['dashboard'] = "front/dashboard/dashboard";
$route['dashboard/(:num)'] = "front/dashboard/dashboard";
$route['change_password'] = "front/login/login_control/change_password";