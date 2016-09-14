<?php /*
  @Description: Admin Add
  @Author: Mit Makwana
  @Date: 27-01-2015

 */ ?>
<?php
$viewname = $this->router->uri->segments[2];
$formAction = !empty($editRecord) ? 'update_data' : 'insert_data';
$path = $viewname . '/' . $formAction;
$is_edit = !empty($editRecord) ? "Edit" : "Add New";
$edit_data = !empty($editRecord) ? '1' : '';

$head_title = 'Customer Management';
$sub_title = 'Customer';
?>
<div id="content">
    <div id="content-header">
        <h1><?= $head_title ?></h1>
    </div>
    <div id="content-container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <div class="portlet-header">
                        <h3> <i class="fa fa-users"></i><?= $is_edit . " " . $sub_title; ?></h3>
                        <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)" title="Back">Back</a> 
                    </div>
                    <div class="portlet-content">
                        <div class="col-sm-8">
                            <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url') ?><?php echo $path ?>" >
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_first_name') ?><span style="color:#F00">*</span></label>
                                    <input id="first_name" name="first_name" placeholder="First name" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['first_name']) ? htmlentities($editRecord[0]['first_name']) : ''; ?>" data-required="true">
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_last_name') ?><span style="color:#F00">*</span></label>
                                    <input id="last_name" name="last_name" placeholder="Last name" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['last_name']) ? htmlentities($editRecord[0]['last_name']) : ''; ?>" data-required="true">
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_gender') ?><span style="color:#F00">*</span></label><br>
                                    <input id="gender_m" name="gender" class="parsley-validated" type="radio" data-required="required" <?php if(!empty($editRecord[0]['gender']) && $editRecord[0]['gender'] == 'male')  echo "checked" ; ?> value="male" data-required="true">
                                    <label for="gender_m">Male</label> &nbsp;&nbsp;
                                    <input id="gender_f" name="gender" class="parsley-validated" type="radio" data-required="required" <?php if(!empty($editRecord[0]['gender']) && $editRecord[0]['gender'] == 'female')  echo "checked" ; ?> value="female" data-required="true"> 
                                    <label for="gender_f">Female</label>
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('contact_no') ?><span style="color:#F00">*</span></label>
                                    <input id="contact_no" name="contact_no" placeholder="Contact number" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['contact_no']) ? htmlentities($editRecord[0]['contact_no']) : ''; ?>" data-required="true" maxlength="15" data-maxlength="15" onkeypress="return isNumberKey(event, this);">
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_email') ?><?=!empty($edit_data)?'':'<span style="color:#F00">*</span>';?></label>
                                    <?php if(!empty($edit_data)){ ?>
                                    <br><label><?= !empty($editRecord[0]['email']) ? $editRecord[0]['email'] : ''; ?></label>
                                    <?php } else{ ?>
                                    <input id="email" name="email" placeholder="Email" class="form-control parsley-validated" type="email" data-required="required" value="<?= !empty($editRecord[0]['email']) ? $editRecord[0]['email'] : ''; ?>">
                                    <?php } ?>                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input">Password<?php if(empty($editRecord)) {?><span style="color:#F00">*</span> <?php } ?></label>
                                    <input type="password" class="form-control parsley-validated" placeholder="<?php echo $this->lang->line('password')?>" name="password" id="password" class="form-control parsley-validated" <?php if(empty($editRecord)) {?> data-required="true" <?php } ?> data-minlength="6"/>
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input">Confirm password<?php if(empty($editRecord)) {?><span style="color:#F00">*</span> <?php } ?></label>
                                    <input type="password" class="form-control parsley-validated" data-equalto="#password" placeholder="<?php echo $this->lang->line('confirm_password')?>" name="cpassword" id="cpassword" class="form-control parsley-validated" <?php if(empty($editRecord)) {?> data-required="true"<?php } ?> data-minlength="6"/>
                                </div>
                                
                                <div class="form-group">
                                    <input type="hidden" name="id" id="customer_id" value="<?= !empty($editRecord[0]['id']) ? $editRecord[0]['id'] : ''; ?>" />
                                    <button type="submit" onclick="return setdefaultdata();" class="btn btn-primary" id="save" title="<?php echo $this->lang->line('save_record'); ?>">Save</button>
<?php if (empty($editRecord)) { ?>
                                        <button type="reset" class="btn btn-primary" id="reset" onClick="cleare_data()" title="Reset">Reset</button>
                                    <?php } ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
<!-- #content --> 
<script type="text/javascript">
    function create_slug(pagetitle)
    {
        var string=pagetitle.toLowerCase();
        string=string.replace(/[^a-zA-Z 0-9_\s-]+/g,'');
        string=string.replace(/[\s-]+/g,' ');
        string=string.replace(/[\s_]+/g,'-');
        $('#slug').val(string);
    }

    function setdefaultdata()
    {
        var flag = 1;
        var email = $('#email').val();
        var id = $('#customer_id').val();
        
                
        if ($('#<?php echo $viewname ?>').parsley().isValid()) {
            $.ajax({
                type: "POST",
                url: "<?php echo $this->config->item('admin_base_url') . $viewname . '/check_user'; ?>",
                async:false,
                data: {'email': email,'id':id},
                success: function(data)
                {
                    if(data == '1')
                    {
                        $('#page_name').focus();
                        $('#save').attr('disabled','disabled');

                            $.confirm({'title': 'Alert','message': " <strong> This email already existing. Please select other email. "+"<strong></strong>",'buttons': {'ok'  : {'class'  : 'btn_center alert_ok','action': function(){
                                      $('#email').focus();
                                      $('#save').removeAttr('disabled');
                                      $('#email').val('');
                                    }}}});
                       flag = 2;
                    }
                }
            });
        }
        
        if(flag == 2)
        {
            return false;
        }
        else
        {
            if ($('#<?php echo $viewname ?>').parsley().isValid()) {
                $.blockUI({message: '<?= '<img src="' . base_url('images') . '/ajaxloader.gif" border="0" align="absmiddle"/>' ?> Please Wait...'});
            }
        }
        
        
    }
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
    function cleare_data()
    {
        $("#<?php echo $viewname; ?>").parsley().destroy();
        $("#<?php echo $viewname; ?>").parsley();
    }
</script>