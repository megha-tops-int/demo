<?php /*
  @Description: Admin Add
  @Author: Mit Makwana
  @Date: 27-01-2015

 */ ?>
<?php
$viewname = $this->router->uri->segments[2];
$formAction = !empty($editRecord) ? 'update_data' : 'insert_data';
$path = $viewname . '/' . $formAction;
$is_edit = !empty($editRecord) ? "Edit Admin" : "Add New Admin";

$edit_data = !empty($editRecord) ? '1' : '';
?>
<div id="content">
    <div id="content-header">
        <h1><?= $this->lang->line('admin_long') ?></h1>
    </div>
    <div id="content-container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <div class="portlet-header">
                        <h3> <i class="fa fa-user"></i><?=$is_edit?></h3>
                        <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)" title="Back">Back</a> 
                    </div>
                    <div class="portlet-content">
                        <div class="col-sm-8">
                            <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url') ?><?php echo $path ?>" >
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_name') ?><span style="color:#F00">*</span></label>
                                    <input id="name" name="name" placeholder="Name" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['name']) ? htmlentities($editRecord[0]['name']) : ''; ?>" data-required="true">
                                </div>
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_email') ?><?=!empty($edit_data)?'':'<span style="color:#F00">*</span>';?></label>
                                    <?php if(!empty($edit_data)){ ?>
                                    <br><label><?= !empty($editRecord[0]['email']) ? $editRecord[0]['email'] : ''; ?></label>
                                    <?php } else{ ?>
                                    <input id="email" placeholder="Email" class="form-control parsley-validated" type="email" data-required="required"  name="email" value="<?= !empty($editRecord[0]['email']) ? $editRecord[0]['email'] : ''; ?>" onchange="check_email(this.value,<?= !empty($editRecord[0]['id']) ? $editRecord[0]['id'] : '0'; ?>);">
                                    <?php } ?>                                    
                                </div>
                                <?php
                                if (empty($editRecord[0]['id'])) {
                                    ?>
                                    <div class="form-group">
                                        <label for="select-multi-input">New password<span style="color:#F00">*</span></label>
                                        <input id="password" name="password" placeholder="New password" class="form-control parsley-validated" type="password" data-required="required" data-minlength="6" data-required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="select-multi-input">Confirm password<span style="color:#F00">*</span></label>
                                        <input type="password" class="form-control parsley-validated" data-equalto="#password" placeholder="Confirm Password" name="password" id="password" class="form-control parsley-validated" data-required="true" data-minlength="6"/>
                                    </div>
    <?php
}
?>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= !empty($editRecord[0]['id']) ? $editRecord[0]['id'] : ''; ?>" />
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


    function setdefaultdata()
    {
        if ($('#<?php echo $viewname ?>').parsley().isValid()) {
            $.blockUI({message: '<?= '<img src="' . base_url('images') . '/ajaxloader.gif" border="0" align="absmiddle"/>' ?> Please Wait...'});
        }
    }
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
    function check_email(email, id)
    {
        $.ajax({
            type: "POST",
            url: "<?php echo $this->config->item('admin_base_url') . $viewname . '/check_user'; ?>",
            dataType: 'json',
            async: false,
            data: {'email': email, 'id': id},
            success: function(data)
            {

                if (data == '1')
                {
                    $("#save").prop("disabled", true);
                    $.confirm({'title': 'Alert', 'message': " <strong> This email already existing ! Please select other email " + "<strong></strong>", 'buttons': {'ok': {'class': 'btn_center alert_ok', 'action': function() {
                                    $('#email').val('');
                                    $('#email').focus();
                                    $("#save").prop("disabled", false);
                                }}}});
                }
                if (data == '2')
                {
                    $("#save").prop("disabled", true);
                    $.confirm({'title': 'Alert', 'message': " <strong> This email address is not valid ! Please select valid email address" + "<strong></strong>", 'buttons': {'ok': {'class': 'btn_center alert_ok', 'action': function() {
                                    $('#email').val('');
                                    $('#email').focus();
                                    $("#save").prop("disabled", false);
                                }}}});
                }

            }
        });
        return false;

    }

    function cleare_data()
    {
        $("#<?php echo $viewname; ?>").parsley().destroy();
        $("#<?php echo $viewname; ?>").parsley();
    }
</script>