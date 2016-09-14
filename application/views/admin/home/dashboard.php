<div id="content">
  <div id="content-header">
    <h1>Dashboard</h1>
  </div>
  <!-- #content-header --> 
  <!-- /#content-container -->
  <div id="content-container">
    <div class="row">
      <div class="col-md-12">
        <div class="portlet">
          <div class="portlet-header">
            <h3><i class="fa fa-dashboard"></i>Welcome to <?php echo $this->config->item('project_name')?> admin panel</h3>
          </div>
          <div class="portlet-content dashboard">
            <div class="row">
              <div class="col-md-4">
                <div class="portlet-header">
                  <h3 style="display: block;float: unset;text-align: center;">User management</h3>
                </div>
                <div class="portlet-content dashmrg"> <a href="<?=base_url('admin/user_management');?>" title="User Management"> <img alt="user_management" width="128" height="128" src="<?php echo $this->config->item('base_url')?>images/project_management.png"/> </a> </div>
              </div>
            </div>
            <?php /*  
            <div class="row">
              <div class="col-md-4">
                <div class="portlet-header">
                  <h3 style="display: block;float: unset;text-align: center;">Project Management</h3>
                </div>
                <div class="portlet-content dashmrg"> <a href="<?=base_url('admin/project_management');?>" title="Project Management"> <img alt="project_management" width="128" height="128" src="<?php echo $this->config->item('base_url')?>images/project_management.png"/> </a> </div>
              </div>
              <div class="col-md-4">
                <div class="portlet-header">
                  <h3 style="display: block;float: unset;text-align: center;">Event Management</h3>
                </div>
                <div class="portlet-content dashmrg"> <a href="<?=base_url('admin/event_management');?>" title="Event Management"> <img alt="event_management" width="128" height="128" src="<?php echo $this->config->item('base_url')?>images/event_management.png"/> </a> </div>
              </div>
              <div class="col-md-4">
                <div class="portlet-header">
                  <h3 style="display: block;float: unset;text-align: center;">Partner Management</h3>
                </div>
                <div class="portlet-content dashmrg"> <a href="<?=base_url('admin/partners_management');?>" title="Partner Management"> <img alt="partner_management" width="128" height="128" src="<?php echo $this->config->item('base_url')?>images/partner_management.png"/> </a> </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="portlet-header">
                  <h3 style="display: block;float: unset;text-align: center;">About us</h3>
                </div>
                <div class="portlet-content mbdashmrg"> <a href="<?=base_url('admin/about_us');?>" title="About us"> <img alt="about_management" width="128" height="128" src="<?php echo $this->config->item('base_url')?>images/about_management.png"/> </a> </div>
              </div>
              <div class="col-md-4">
                <div class="portlet-header">
                  <h3 style="display: block;float: unset;text-align: center;">Content Management</h3>
                </div>
                <div class="portlet-content mbdashmrg"> <a href="<?=base_url('admin/content_management');?>" title="Content Management"> <img alt="content_management" width="128" height="128" src="<?php echo $this->config->item('base_url')?>images/content_management.png"/> </a> </div>
              </div>
              <div class="col-md-4">
                <div class="portlet-header">
                  <h3 style="display: block;float: unset;text-align: center;">Settings</h3>
                </div>
                <div class="portlet-content mbdashmrg"> <a href="<?=base_url('admin/admin_settings');?>" title="Settings"> <img alt="setting_management" width="128" height="128" src="<?php echo $this->config->item('base_url')?>images/setting_management.png"/> </a> </div>
              </div>
            </div>
              
              */ ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #content --> 