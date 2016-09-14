<?php

/*
  @Description: Left File
  @Author: Kaushik Valiya
  @Input:
  @Output:
  @Date: 14-12-2015
 */

$admin = $this->session->userdata('junction_studio_admin_session'); 
/*---------- Listing And Searching Session Destroy -------------*/
if($this->uri->segment(2)!= 'admin_management')
{
    $this->session->unset_userdata('admin_sortsearchpage_data');
}
if($this->uri->segment(2)!= 'content_management')
{
    $this->session->unset_userdata('content_sortsearchpage_data');
}
if($this->uri->segment(2)!= 'project_management')
{
    $this->session->unset_userdata('project_sortsearchpage_data');
}
if($this->uri->segment(2)!= 'partners_management')
{
    $this->session->unset_userdata('partners_sortsearchpage_data');
}
if($this->uri->segment(2)!= 'about_us')
{
    $this->session->unset_userdata('about_sortsearchpage_data');
}
if($this->uri->segment(2)!= 'slider_management')
{
    $this->session->unset_userdata('slider_sortsearchpage_data');
}
if($this->uri->segment(2)!= 'customer_management')
{
    $this->session->unset_userdata('customer_sortsearchpage_data');
}
if($this->uri->segment(2)!= 'contact_us')
{
    $this->session->unset_userdata('contact_us_sortsearchpage_data');
}
if($this->uri->segment(2)!= 'event_management')
{
    $this->session->unset_userdata('feedback_sortsearchpage_data');
}
if($this->uri->segment(2)!= 'donations')
{
    $this->session->unset_userdata('donation_sortsearchpage_data');
}
if($this->uri->segment(2)!= 'game_request')
{
    $this->session->unset_userdata('game_request_sortsearchpage_data');
}
if($this->uri->segment(2)!= 'user_management')
{
    $this->session->unset_userdata('user_sortsearchpage_data');
}
/*----------End Session destroy-------------*/
?>

<div id="sidebar-wrapper" class="collapse sidebar-collapse">   
  <nav id="sidebar">
    <ul id="main-nav" class="open-active">
      <li<?php if($this->uri->segment(2)=='dashboard'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/dashboard');?>"> <i class="fa fa-dashboard"></i> Dashboard </a> </li>      
      <?php /*<li<?php if($this->uri->segment(2)=='project_management'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/project_management');?>"> <i class="fa fa-delicious"></i>Project Management</a> </li>      
      <li<?php if($this->uri->segment(2)=='event_management'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/event_management');?>"> <i class="fa fa-calendar-check-o"></i>Event Management</a> </li>
      <li<?php if($this->uri->segment(2)=='partners_management'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/partners_management');?>"> <i class="fa fa-user-plus"></i>Partner Management</a> </li>
      <li<?php if($this->uri->segment(2)=='about_us'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/about_us');?>"> <i class="webnav aboutus"></i>About Us</a> </li>
      <li<?php if($this->uri->segment(2)=='content_management'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/content_management');?>"> <i class="fa fa-file"></i>Content Management</a> </li>
      <li<?php if($this->uri->segment(2)=='contact_us'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/contact_us');?>"> <i class="fa fa-send-o"></i>Contact Us</a> </li>
      <li<?php if($this->uri->segment(2)=='donations'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/donations');?>"> <i class="fa fa-heart-o"></i>Donation Management</a> </li> */ ?>
      <li<?php if($this->uri->segment(2)=='user_management'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/user_management');?>"> <i class="fa fa-user"></i>User management</a> </li>
      <?php /*<li<?php if($this->uri->segment(2)=='game_request'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/game_request');?>"> <i class="fa fa-trophy"></i>Game Request</a> </li>
      <li<?php if($this->uri->segment(2)=='customer_management'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/customer_management');?>"> <i class="fa fa-users"></i>Customer Management</a> </li>
      <li<?php if($this->uri->segment(2)=='slider_management'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/slider_management');?>"> <i class="fa fa-sliders"></i>Manage Slider</a> </li> 
      <li<?php if($this->uri->segment(2)=='admin_management'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/admin_management');?>"> <i class="fa fa-user"></i>Admin Management</a> </li>
      <li <?php if($this->uri->segment(2)=='change_password'){?> class="active" <?php } ?>> <a href="<?php echo base_url('admin/change_password');?>"><i class="fa fa-key"></i>Change Password</a> </li> */ ?>
      <li class="dropdown"><a href="javascript:void(0);" onclick="logout();"><i class="fa fa-power-off"></i><span>Log out</span></a>
    </ul>
  </nav>
</div>
<script>
function logout()
{
  $.confirm({
    'title': 'Log out','message': " <strong> Are you sure want to log out?",'buttons': {'Yes': {'class': 'special',
    'action': function(){
      <?php //if(!empty($admin['id'])){ ?>
        window.location="<?php echo  base_url('admin/logout') ?>";
        <?php //}?>
        
      }},'No'	: {'class'	: ''}}});
}
</script>