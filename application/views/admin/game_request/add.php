<?php /*
  @Description: Admin Add
  @Author: Parag Joshi
  @Date: 15-02-2016

 */ ?>
<?php
$viewname = $this->router->uri->segments[2];
$formAction = !empty($editRecord) ? 'update_data' : 'insert_data';
$path = $viewname . '/' . $formAction;
$is_edit = !empty($editRecord) ? "Edit" : "Add New";
$edit_data = !empty($editRecord) ? '1' : '';

$head_title = 'Game Request';
$sub_title = 'Game Request';
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
                        <h3> <i class="fa fa-trophy"></i><?= $is_edit . " " . $sub_title; ?></h3>
                        <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)" title="Back">Back</a> 
                    </div>
                    <div class="portlet-content">
                        <div class="col-sm-8">
                            <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url') ?><?php echo $path ?>" >
                                <div class="form-group">
                                    <label for="select-multi-input">Title<span style="color:#F00">*</span></label>
                                    <input id="title" name="title" placeholder="Title" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['title']) ? htmlentities($editRecord[0]['title']) : ''; ?>" data-required="true">
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input">Date <span style="color:#F00">*</span></label>
                                    <input id="start_date" name="start_date" placeholder="Date" class="form-control parsley-validated" type="text" value="<?php echo  (!empty($editRecord[0]['start_date']) && $editRecord[0]['start_date'] != '0000-00-00')?date(COMMAN_DATE_FORMATE_JS,strtotime($editRecord[0]['start_date'])) : ''; ?>" data-required="true" readonly>
                                </div>
                                
                               
                                <div class="form-group">
                                    <input type="hidden" name="id" id="game_id" value="<?= !empty($editRecord[0]['id']) ? $editRecord[0]['id'] : ''; ?>" />
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
<script src="<?= $this->config->item('js_path') ?>jquery.datetimepicker.js"></script>
<link href="<?= $this->config->item('css_path') ?>jquery.datetimepicker.css" rel="stylesheet">
<script type="text/javascript">


    function setdefaultdata()
    {
        var flag = 1;
        var title = $('#title').val();
        var edit_id = $('#game_id').val();
        
        if ($('#<?php echo $viewname ?>').parsley().isValid()) {
            $.ajax({
                type: "POST",
                url: "<?php echo $this->config->item('admin_base_url') . $viewname . '/check_user'; ?>",
                async:false,
                data: {'title': title,'edit_id':edit_id},
                success: function(data)
                {
                    if(data == '1')
                    {
                        $('#title').focus();
                        $('#save').attr('disabled','disabled');

                            $.confirm({'title': 'Alert','message': " <strong> This title already existing. Please select other title. "+"<strong></strong>",'buttons': {'ok'  : {'class'  : 'btn_center alert_ok','action': function(){
                                      $('#title').focus();
                                      $('#save').removeAttr('disabled');
                                      $('#title').val('');
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
   
    function cleare_data()
    {
        $("#<?php echo $viewname; ?>").parsley().destroy();
        $("#<?php echo $viewname; ?>").parsley();
    }
  $(function()
{
   

    $('#start_date').datetimepicker({
       locale: 'ru',
       minDate: 0,
       timepicker: false,
       format: '<?= COMMAN_DATE_FORMATE_JS ?>',
    });
});
</script>