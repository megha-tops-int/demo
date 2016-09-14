<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class=""><!--<![endif]-->

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Dashboard - Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="<?= $this->config->item('css_path') ?>css.css" type="text/css">
        <link rel="stylesheet" href="<?= $this->config->item('css_path') ?>runtime.css" type="text/css">
        <link rel="stylesheet" href="<?= $this->config->item('css_path') ?>font-awesome.css" type="text/css">
        <link rel="stylesheet" href="<?= $this->config->item('css_path') ?>bootstrap.css" type="text/css">
        <link rel="stylesheet" href="<?= $this->config->item('css_path') ?>jquery-ui-1.css" type="text/css">
        <link rel="stylesheet" href="<?= $this->config->item('css_path') ?>blue.css" type="text/css">
        <link rel="stylesheet" href="<?= $this->config->item('css_path') ?>App.css" type="text/css">
        <link rel="stylesheet" href="<?= $this->config->item('css_path') ?>buttons.css" type="text/css">
        <link rel="stylesheet" href="<?= $this->config->item('css_path') ?>jquery.datetimepicker.css" type="text/css">
        <!-- Logout confirm -->
        <link rel="stylesheet" type="text/css" href="<?= $this->config->item('css_path') ?>jquery.confirm.css"/>

        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.datetimepicker.js"></script>
        <script src="<?= $this->config->item('js_path') ?>jquery.blockUI.js" type="text/javascript"></script>
        <!--confirm box css-->
        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.confirm.js"></script> 
        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>common.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('ck_editor_path') ?>ckeditor.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.maskedinput.js"></script>

    </head>
<style>
#content{
            
    margin-left: 31px !important;
    margin-right: 20px !important;
    margin-top: 50px !important;
}
</style>
    <body>
        <div id="wrapper">
            <h1 id="site-logo">
                <a href="<?=base_url('admin');?>"> <img alt="Tournament" src="<?php echo $this->config->item('base_url') ?>images/logo.png"></a>
            </h1>
            <header id="header"> 
                <a href="javascript:;" data-toggle="collapse" data-target=".top-bar-collapse" id="top-bar-toggle" class="navbar-toggle collapsed"> <i class="fa fa-cog"></i> </a> 
                <a href="javascript:;" data-toggle="collapse" data-target=".sidebar-collapse" id="sidebar-toggle" class="navbar-toggle collapsed"> <i class="fa fa-reorder"></i> </a> 
            </header>
            <!-- header -->

          
            <!-- /#top-bar -->