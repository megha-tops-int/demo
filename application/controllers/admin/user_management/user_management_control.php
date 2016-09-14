<?php
/*
  @Description: User management controller
  @Author: Megha Shah
  @Input:
  @Output:
  @Date: 07-09-2016
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user_management_control extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->admin_session = $this->session->userdata('junction_studio_admin_session');
        //$this->message_session = $this->session->userdata('message_session');
        $this->message_session = $this->session->flashdata('message_session');
        check_admin_login();
        $this->load->model('common_function_model');
        $this->load->model('imageupload_model');
        $this->viewName   = $this->router->uri->segments[2];
        $this->user_type  = 'admin';
        $this->table_name = 'users';
        $this->page_title = "User Management";
    }
    
    public function index(){
        $searchopt = '';
        $searchtext = '';
        $searchoption = '';
        $perpage = '';
        $searchtext = $this->input->post('searchtext');
        $sortfield = $this->input->post('sortfield');
        $sortby = $this->input->post('sortby');
        $searchopt = $this->input->post('searchopt');
        $perpage = $this->input->post('perpage');
        $allflag = $this->input->post('allflag');

        if (!empty($allflag) && ($allflag == 'all' || $allflag == 'changesorting' || $allflag == 'changesearch')) {
            $this->session->unset_userdata('user_sortsearchpage_data');
        }
        $data['sortfield'] = 'id';
        $data['sortby'] = 'desc';
        $searchsort_session = $this->session->userdata('user_sortsearchpage_data');

        if (!empty($sortfield) && !empty($sortby)) {
            //$sortfield = $this->input->post('sortfield');
            $data['sortfield'] = $sortfield;
            //$sortby = $this->input->post('sortby');
            $data['sortby'] = $sortby;
        } else {
            if (!empty($searchsort_session['sortfield'])) {
                if (!empty($searchsort_session['sortby'])) {
                    $data['sortfield'] = $searchsort_session['sortfield'];
                    $data['sortby'] = $searchsort_session['sortby'];
                    $sortfield = $searchsort_session['sortfield'];
                    $sortby = $searchsort_session['sortby'];
                }
            } else {
                $sortfield = 'id';
                $sortby = 'desc';
            }
        }
        if (!empty($searchtext)) {
            //$searchtext = $this->input->post('searchtext');
            $data['searchtext'] = $searchtext;
        } else {
            if (empty($allflag)) {
                if (!empty($searchsort_session['searchtext'])) {
                    $data['searchtext'] = $searchsort_session['searchtext'];
                    $searchtext = $data['searchtext'];
                } else {
                    $data['searchtext'] = '';
                }
            } else {
                $data['searchtext'] = '';
            }
        }
        if (!empty($searchopt)) {
            //$searchopt = $this->input->post('searchopt');
            $data['searchopt'] = $searchopt;
        }
       
        if (!empty($perpage) && $perpage != 'null') {
            //$perpage = $this->input->post('perpage');
            $data['perpage'] = $perpage;
            $config['per_page'] = $perpage;
        } else {
            if (!empty($searchsort_session['perpage'])) {
                $data['perpage'] = trim($searchsort_session['perpage']);
                $config['per_page'] = trim($searchsort_session['perpage']);
            } else {
                $config['per_page'] = '10';
                $data['perpage'] = '10';
            }
        }
        $config['base_url'] = site_url($this->user_type . '/' . $this->viewName);
        $config['is_ajax_paging'] = TRUE; // default FALSE
        $config['paging_function'] = 'ajax_paging'; // Your jQuery paging
        //$config['uri_segment'] = 3;
        //$uri_segment = $this->uri->segment(3);
        if (!empty($allflag) && ($allflag == 'all' || $allflag == 'changesorting' || $allflag == 'changesearch')) {
            $config['uri_segment'] = 0;
            $uri_segment = 0;
        } else {
            $config['uri_segment'] = 3;
            $uri_segment = $this->uri->segment(3);
        }
        if (!empty($searchtext)) {
            $searchkeyword = mysql_real_escape_string(html_entity_decode(trim($searchtext)));
            $match = array('name' => $searchkeyword, 'email' => $searchkeyword);
            
            $data['datalist'] = $this->common_function_model->select($this->table_name, '', $match, '', 'like', '', $config['per_page'], $uri_segment, $sortfield, $sortby);
            $config['total_rows'] = $this->common_function_model->select($this->table_name, '', $match, '', 'like', '', '', '', '', '', '', '1', '');
            
        } else {
            
            $data['datalist'] = $this->common_function_model->select($this->table_name, '', '', '', '', '', $config['per_page'], $uri_segment, $sortfield, $sortby);
            $config['total_rows'] = $this->common_function_model->select($this->table_name, '', '', '', '', '', '', '', '', '', '', '1', '');
        }
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        //$data['msg'] = $this->message_session['msg'];
        $data['msg'] = !empty($this->message_session) ? $this->message_session : '';
        $user_sortsearchpage_data = array(
            'sortfield' => $data['sortfield'],
            'sortby' => $data['sortby'],
            'searchtext' => $data['searchtext'],
            'perpage' => trim($data['perpage']),
            'uri_segment' => $uri_segment,
            'total_rows' => $config['total_rows']);
        $this->session->set_userdata('user_sortsearchpage_data', $user_sortsearchpage_data);
        $data['uri_segment'] = $uri_segment;
        if ($this->input->post('result_type') == 'ajax') {
            $this->load->view($this->user_type . '/' . $this->viewName . '/ajax_list', $data);
        } else {
            $data['main_content'] = $this->user_type . '/' . $this->viewName . "/list";
            $this->load->view('admin/include/template', $data);
        }
    }
    
    public function add_record() {
        $data['main_content'] = "admin/" . $this->viewName . "/add";
        $this->load->view('admin/include/template', $data);
    }
    
    /*
      @Description: Function for Insert New User data
      @Author: Megha Shah
      @Input: - Details of new User which is inserted into DB
      @Output: - List of User with new inserted records
      @Date: 07-09-2016
     */

    public function insert_data() {
        $cdata['name']         = $this->input->post('name');
        $cdata['description'] = $this->input->post('description');
        $cdata['password']     = $this->common_function_model->encrypt_script($this->input->post('password'));
        $cdata['email']        = $this->input->post('email');
        $cdata['gender']        = $this->input->post('gender');
        $cdata['country']        = $this->input->post('country');
        $date_time = $this->input->post('date_of_birth');
        if (!empty($date_time))
            $cdata['date_of_birth'] = $this->common_function_model->date_formate($date_time);
        else
            $cdata['date_of_birth'] = '';
        $cdata['created_date']  = date('Y-m-d H:i:s');
        $cdata['modified_date'] = date('Y-m-d H:i:s');
        $cdata['status'] = '1';
        
        $bgImgPath                  = $this->config->item('user_img_big_path');
        $smallImgPath               = $this->config->item('user_img_small_path');

        //Upload image
        if(!empty($_FILES['profile_pic']))
        {  
            $uploadFile = 'profile_pic';
            $thumb = "thumb";
            $hiddenImage = '';
            $cdata['profile_pic'] = $this->imageupload_model->uploadBigImage($uploadFile,$bgImgPath,$smallImgPath,$thumb,$hiddenImage,TRUE);
        }
        //End
        $user_id = '';
        if(!empty($cdata['email']))
        {
            $user_id = $this->common_function_model->insert($this->table_name,$cdata);
            /*$to         = $cdata['email'];
            $subject    = $this->config->item('sitename').' : User Registration Successfully';
            $from_email = $this->config->item('admin_email');
            $loginLink  = $this->config->item('admin_base_url');
            $name       = ucwords(strtolower(($cdata['name'])));
            $pass_variable_activation = array('name' => $name, 'loginLink' => $loginLink, 'email' => $cdata['email']);

            $data['actdata'] = $pass_variable_activation;
            $message = $this->load->view('admin/email_template/new_user_registration', $data, true);
            $this->common_function_model->send_email($to,$subject,$message,$from_email);*/
        }
        
        if($user_id){
            //INTEREST DETAILS
            $user_interest   = $this->input->post('user_interest');
            if(!empty($user_interest))
            {
                foreach($user_interest as $interest)
                { 
                    $user_interest_data = array();
                    $user_interest_data['user_id']   = $user_id;
                    $user_interest_data['interest'] = $interest;
                    $user_interest_data['created_date']= date('Y-m-d H:i:s');
                    $this->common_function_model->insert('user_interests',$user_interest_data);
                }
            }
            //END
        }
        $msg = $this->lang->line('common_add_success_msg');
        $this->session->set_flashdata('message_session', $msg);
        redirect('admin/' . $this->viewName);
    }
    
    /*
      @Description: Get Details of Edit User Profile
      @Author: Megha Shah
      @Input: - Id of User member whose details want to change
      @Output: - Details of user which id is selected for update
      @Date: 07-09-2016
     */

    public function edit_record() {
        $id = $this->uri->segment(4);
        $data['smenu_title'] = $this->lang->line('admin_left_menu15');
        $data['submodule'] = $this->lang->line('admin_left_ssclient');
        $fields = array('*');
        $match = array('id' => $id);
        $result = $this->common_function_model->select($this->table_name, $fields, $match, '', '=');
        $data['editRecord'] = $result;
        $data['main_content'] = "admin/" . $this->viewName . "/add";
        
        //News Field Details List
        $fld_fields = array('interest');
        $fld_match  = array("user_id"=>$id);
        $user_interests = $this->common_function_model->select('user_interests', $fld_fields, $fld_match, '', '=', '', '', '','interest','ASC');
        if(!empty($user_interests)){
            $data['interests_data'] = array_column( $user_interests,'interest');
        }
        $this->load->view("admin/include/template", $data);
    }

    /*
      @Description: Function for Update User Profile
      @Author: Megha Shah
      @Input: - Update details of User
      @Output: - List with updated User details
      @Date: 07-09-2016
     */

    public function update_data() {
        
        $cdata['id'] = $this->input->post('id');
        $cdata['name'] = $this->input->post('name');
        $cdata['description'] = $this->input->post('description');
        $cdata['gender']        = $this->input->post('gender');
        $cdata['country']        = $this->input->post('country');
        $date_time = $this->input->post('date_of_birth');
        if (!empty($date_time))
            $cdata['date_of_birth'] = $this->common_function_model->date_formate($date_time);
        else
            $cdata['date_of_birth'] = '';
        $oldfile = $this->input->post('oldfile');
        
        $bgImgPath                  = $this->config->item('user_img_big_path');
        $smallImgPath               = $this->config->item('user_img_small_path');
        
        //Upload image
        if(isset($_FILES['profile_pic']) && !empty($_FILES['profile_pic']['name']))
        {  
            $uploadFile = 'profile_pic';
            $thumb = "thumb";
            $hiddenImage= !empty($oldfile)?$oldfile:'';
            $image=$this->input->post('oldfile');
            if(file_exists($this->config->item('user_img_big_path').$image))
                unlink($this->config->item('user_img_big_path').$image);

            if(file_exists($this->config->item('user_img_small_path').$image))
                unlink($this->config->item('user_img_small_path').$image);
            $cdata['profile_pic'] = $this->imageupload_model->uploadBigImage($uploadFile,$bgImgPath,$smallImgPath,$thumb,$hiddenImage,TRUE);
        }
        //End
        $this->common_function_model->update($this->table_name, $cdata, array('id' => $cdata['id']));
        
        // Delete all user interest field details 
        $this->common_function_model->delete('user_interests',array('user_id'=>$cdata['id']));
        
        //INTEREST DETAILS
        $user_interest   = $this->input->post('user_interest');
        if(!empty($user_interest))
        {
            foreach($user_interest as $interest)
            { 
                $user_interest_data = array();
                $user_interest_data['user_id']   = $cdata['id'];
                $user_interest_data['interest'] = $interest;
                $user_interest_data['created_date']= date('Y-m-d H:i:s');
                $this->common_function_model->insert('user_interests',$user_interest_data);
            }
        }
        //END
        
        $msg = $this->lang->line('common_edit_success_msg');

        $this->session->set_flashdata('message_session', $msg);
        $searchsort_session = $this->session->userdata('admin_sortsearchpage_data');
        $pagingid = $searchsort_session['uri_segment'];
        redirect('admin/' . $this->viewName . '/' . $pagingid);
        //redirect('admin/'.$this->viewName.'/msg/'.$this->lang->line('common_edit_success_msg'));
    }
    
    
    
    public function check_user() {

        $id = $this->input->post('id');
        $email = $this->input->post('email');

        if ($id == 0) {
            $regex = '/^([a-zA-Z\d_\.\-\+%])+\@(([a-zA-Z\d\-])+\.)+([a-zA-Z\d]{2,4})+$/';
            if (preg_match($regex, $email)) {
                $email1 = strtolower($email);
                $match = array('email' => $email1);
                
                $exist_email = $this->common_function_model->select($this->table_name, '', $match, '', '=');
                
                if (!empty($exist_email)) {
                    echo '1';
                } else {
                    echo '0';
                }
            } else {
                echo '2';
            }
        } else {
            $match = array('id' => $id);
            $exist_id = $this->common_function_model->select($this->table_name, '', $match, '', '=');
            $email_old = $exist_id[0]['email'];
            $regex = '/^([a-zA-Z\d_\.\-\+%])+\@(([a-zA-Z\d\-])+\.)+([a-zA-Z\d]{2,4})+$/';
            if (preg_match($regex, $email)) {
                if ($email == $email_old) {
                    echo "0";
                } else {
                    $match = array('email' => $email);
                    $email_exist    = $this->common_function_model->select($this->table_name, '', $match, '', '=');
                    if (!empty($email_exist)) {
                        echo '1';
                    } else {
                        echo '0';
                    }
                }
            } else {
                echo '2';
            }
        }
    }
    
    /*
      @Description: Function for Unpublish User Profile By Admin
      @Author: Megha Shah
      @Input: - Delete id which User record want to Unpublish
      @Output: - New User list after record is Unpublish.
      @Date: 07-09-2016
     */

    function unpublish_record() {
        $id = $this->uri->segment(4);
		
        $cdata['id'] = $id;
        $cdata['status'] = '0';
        $this->common_function_model->update($this->table_name,$cdata,array('id'=>$cdata['id']));
       
        $searchsort_session = $this->session->userdata('admin_sortsearchpage_data');
        if(!empty($searchsort_session['uri_segment']))
            $pagingid = $searchsort_session['uri_segment'];
        else
            $pagingid = 0;
        echo $pagingid;
    }

    /*
      @Description: Function for publish User Profile By Admin
      @Author: Megha Shah
      @Input: - Delete id which User record want to publish
      @Output: - New User list after record is publish.
      @Date: 07-09-2016
     */

    function publish_record() {
        $id = $this->uri->segment(4);
		
        $cdata['id'] = $id;
        $cdata['status'] = '1';
        $this->common_function_model->update($this->table_name,$cdata,array('id'=>$cdata['id']));
        
        $searchsort_session = $this->session->userdata('admin_sortsearchpage_data');
        if(!empty($searchsort_session['uri_segment']))
            $pagingid = $searchsort_session['uri_segment'];
        else
            $pagingid = 0;
        echo $pagingid;
    }

    public function ajax_delete_all() {
        $admin = $this->session->userdata('junction_studio_admin_session');
       
        $id = $this->input->post('single_remove_id');
        if (!empty($id) && $admin['id'] != $id) {
            
            $fields = array('*');
            $match = array('id' => $id);
            $result = $this->common_function_model->select($this->table_name, $fields, $match, '', '=');
            $image = $result[0]['profile_pic'];
            if(file_exists($this->config->item('user_img_big_path').$image)){
                unlink($this->config->item('user_img_big_path').$image);
            }

            if(file_exists($this->config->item('user_img_small_path').$image)){
                unlink($this->config->item('user_img_small_path').$image);
            }
            
            $this->common_function_model->delete($this->table_name,array('id' => $id));
            unset($id);
        }

        $array_data = $this->input->post('myarray');
        if(!empty($array_data))
        {
            for ($i = 0; $i < count($array_data); $i++) 
            {
                if(!empty($array_data[$i]) && $array_data[$i] != $admin['id'])
                {
                    $fields = array('*');
                    $match = array('id' => $array_data[$i]);
                    $result = $this->common_function_model->select($this->table_name, $fields, $match, '', '=');
                    $image = $result[0]['profile_pic'];
            
                    if(file_exists($this->config->item('user_img_big_path').$image)){
                        unlink($this->config->item('user_img_big_path').$image);
                    }

                    if(file_exists($this->config->item('user_img_small_path').$image)){
                        unlink($this->config->item('user_img_small_path').$image);
                    }
                    $this->common_function_model->delete($this->table_name,array('id' => $array_data[$i]));
                }
                
            }
        }
        $searchsort_session = $this->session->userdata('admin_sortsearchpage_data');
        if(!empty($searchsort_session['uri_segment']))
             $pagingid = $searchsort_session['uri_segment'];
        else
             $pagingid = 0;
      
        //echo 1;
        echo $pagingid;
    }
    
    public function ajax_status_all() {
        $array_data = $this->input->post('myarray');
        $cdata['status'] = $this->input->post('status');
        
        for ($i = 0; $i < count($array_data); $i++) {
            
            if(!empty($array_data[$i]))
                $this->common_function_model->update($this->table_name,$cdata, array('id' => $array_data[$i]));
        }
        //echo 1;
        $searchsort_session = $this->session->userdata('admin_sortsearchpage_data');
        echo $pagingid = !empty($searchsort_session['uri_segment']) ? $searchsort_session['uri_segment'] : 0;
    }
}