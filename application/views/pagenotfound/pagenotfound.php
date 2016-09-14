<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title><?= $this->config->item('sitename');?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" href="<?=$this->config->item('css_path')?>font-awesome.css" type="text/css">
<link rel="stylesheet" href="<?=$this->config->item('css_path')?>bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?=$this->config->item('css_path')?>css_404.css" type="text/css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/icon">
</head>

<body>
<div id="wrapper">
 
 <h1 id="site-logo"><a href="<?=base_url('admin/dashboard');?>" alt="<?php echo $this->config->item('project_name')?>"><?php /*<img alt="Admin" src="<?php echo $this->config->item('base_url')?>images/logo.png"/>*/ ?> DEMO </a></h1> 
 <header id="header"></header>
 <!-- header -->
 
<div class="container">
<div class="page404">
<h1>Don't worry you will be back on track in some time!</h1>
  

<h2>404<br></h2>

<p>Page doesn't exist or some other error occured. Go to our <a style="text-decoration: none;" href="<?=base_url();?>">homepage</a> or go back to <a style="text-decoration: none;" href="javascript:history.go(-1);">previous page.</a></p>
</div>
</div>
