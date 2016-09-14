<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class=""><!--<![endif]-->

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title><?php echo ucwords(!empty($this->page_title)?$this->page_title:$this->config->item('project_name')); ?> - Admin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" href="<?php echo $this->config->item('css_path')?>css.css" type="text/css">
<link rel="stylesheet" href="<?php echo $this->config->item('css_path')?>runtime.css" type="text/css">
<link rel="stylesheet" href="<?php echo $this->config->item('css_path')?>font-awesome.css" type="text/css">
<link rel="stylesheet" href="<?php echo $this->config->item('css_path')?>bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo $this->config->item('css_path')?>jquery-ui-1.css" type="text/css">
<link rel="stylesheet" href="<?php echo $this->config->item('css_path')?>blue.css" type="text/css">
<link rel="stylesheet" href="<?php echo $this->config->item('css_path')?>select2.css" type="text/css">
<!--<link rel="stylesheet" href="<?php echo $this->config->item('css_path')?>fullcalendar.css" type="text/css">-->
<link rel="stylesheet" href="<?php echo $this->config->item('css_path')?>App.css" type="text/css">
<link rel="stylesheet" href="<?php echo $this->config->item('css_path')?>buttons.css" type="text/css">
<link rel="stylesheet" href="<?php echo $this->config->item('css_path')?>jquery.datetimepicker.css" type="text/css">

<!--Multi select css and javascript-->
<style>
.ui-multiselect { width: 100%!important; }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/multiselect/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/multiselect/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/multiselect/jquery.multiselect.filter.css" />
<!-- end of Multi select css and javascript-->

<!-- Favicon Icon -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/icon">

<!-- Logout confirm -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('css_path')?>jquery.confirm.css"/>

<script type="text/javascript" src="<?php echo $this->config->item('js_path')?>jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('js_path')?>jquery.datetimepicker.js"></script>
<script src="<?php echo $this->config->item('js_path')?>jquery.blockUI.js" type="text/javascript"></script>
<!--confirm box css-->
<script type="text/javascript" src="<?php echo $this->config->item('js_path')?>jquery.confirm.js"></script> 
<script type="text/javascript" src="<?php echo $this->config->item('js_path')?>common.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('ck_editor_path')?>ckeditor.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('js_path')?>jquery.maskedinput.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('js_path')?>/multiselect/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('js_path')?>/multiselect/jquery.multiselect.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('js_path')?>/multiselect/jquery.multiselect.filter.js"></script>

</head>

<body>
<div id="wrapper">
  
 <header id="header">
 <h1 class="site-logo"><a href="<?php echo base_url('admin/dashboard');?>" alt="<?php echo $this->config->item('project_name')?>">
        <?php /*<img alt="Admin" src="<?php echo !empty($this->site_info[0]['site_logo']) && file_exists($this->config->item('image_site_logo').$this->site_info[0]['site_logo'])?$this->config->item('image_site_logo_url').$this->site_info[0]['site_logo']:$this->config->item('base_url').'images/logo.png'?>"/> */ ?>
         DEMO
     </a></h1> 
  <a href="javascript:;" data-toggle="collapse" data-target=".top-bar-collapse" id="top-bar-toggle" class="navbar-toggle collapsed"> <i class="fa fa-cog"></i> </a>
  <a href="javascript:;" data-toggle="collapse" data-target=".sidebar-collapse" id="sidebar-toggle" class="navbar-toggle collapsed"> <i class="fa fa-reorder"></i> </a>
  <nav id="top-bar" class="collapse top-bar-collapse">
  <ul class="nav navbar-nav pull-right">
   <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;"> <i class="fa fa-user"></i> 
   <?php
   $SessionData = $this->session->userdata('junction_studio_admin_session');
   
	 if(!empty($SessionData['name'])){ 
	  $name=$SessionData['name'];
	  $email=$SessionData['useremail'];
	 echo $name; 
	 }?> <span class="caret"></span> </a>
    <ul class="dropdown-menu" role="menu">     
    <?php /* <li><a href="<?php echo base_url('admin/admin_settings')?>"> <i class="fa fa-cog"></i> &nbsp;&nbsp;Settings </a> </li> */ ?>
     <li><a href="javascript:void(0);" onClick="logout();"> <i class="fa fa-sign-out"></i> &nbsp;&nbsp;Log out </a> </li>
    </ul>
   </li>
  </ul>
 </nav>
</header>
 <!-- header --> 