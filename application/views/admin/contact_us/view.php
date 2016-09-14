<?php /*
  @Description: Admin Add
  @Author: Parag Joshi
  @Date: 25-02-2016

 */ ?>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<?php
$viewname = $this->router->uri->segments[2];
$formAction = !empty($editRecord) ? 'update_data' : 'insert_data';
$path = $viewname . '/' . $formAction;
$is_edit = !empty($editRecord) ? "View" : "Add New";
$edit_data = !empty($editRecord) ? '1' : '';

$head_title = 'Contact Us';
$sub_title = 'Contact';
?>
<style>
div.dataTables_filter label {
    float: left !important;
}
</style>
<div id="content">
    <div id="content-header">
        <h1><?= $head_title ?></h1>
    </div>
    <div id="content-container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <div class="portlet-header">
                        <h3> <i class="fa fa-send-o"></i><?= $is_edit . " " . $sub_title; ?></h3>
                        <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)" title="Back">Back</a> 
                    </div>
                    <div class="portlet-content">
                        <div class="col-sm-8">
                            <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url') ?><?php echo $path ?>" >
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_first_name') ?></label><br>
                                    <span><?= !empty($editRecord[0]['first_name']) ? htmlentities($editRecord[0]['first_name']) : ''; ?></span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_last_name') ?></label><br>
                                    <span><?= !empty($editRecord[0]['last_name']) ? htmlentities($editRecord[0]['last_name']) : ''; ?></span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_email') ?></label><br>
                                    <span><?= !empty($editRecord[0]['email']) ? htmlentities($editRecord[0]['email']) : ''; ?></span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('contact_no') ?></label><br>
                                    <span><?= !empty($editRecord[0]['contact_no']) ? htmlentities($editRecord[0]['contact_no']) : ''; ?></span>
                                </div>
                                
                                <?php 
                                if(!empty($editRecord[0]['type']) && $editRecord[0]['type'] == 1)
                                    $type = "Feedback: Event";
                                if(!empty($editRecord[0]['type']) && $editRecord[0]['type'] == 2)
                                    $type = "Feedback: Project";
                                if(!empty($editRecord[0]['type']) && $editRecord[0]['type'] == 3)
                                    $type = "Other";
                                ?>
                        <!--         <div class="form-group">
                                    <label for="select-multi-input">Type</label><br>
                                    <span><?php // !empty($type) ? $type : ''; ?></span>
                                </div>
                                
                               <div class="form-group">
                                    <label for="select-multi-input">Event/Project title</label><br>
                                    <span><// !empty($editRecord[0]['title']) ? $editRecord[0]['title'] : 'N/A'; ?></span>
                                </div>-->
                                 <div class="form-group">
                                    <label for="select-multi-input">Interested in volunteer?</label><br>
                                    <span><?php 
                                    if(!empty($editRecord[0]['be_volunteer']) && $editRecord[0]['be_volunteer'] == 1)
                                    {
                                        echo 'Yes';
                                    }else
                                    {
                                        echo 'No';
                                    }?></span>
                                </div>
                                <div class="form-group">
                                    <label for="select-multi-input">Message</label><br>
                                    <span><?= !empty($editRecord[0]['message']) ? htmlentities($editRecord[0]['message']) : 'N/A'; ?></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
