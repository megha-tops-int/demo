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

$head_title = 'Content Management';
$sub_title = 'Content';
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
                        <h3> <i class="fa fa-file"></i><?= $is_edit . " " . $sub_title; ?></h3>
                        <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)" title="Back">Back</a> 
                    </div>
                    <div class="portlet-content">
                        <div class="col-sm-8">
                            <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url') ?><?php echo $path ?>" >
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('page_title') ?><span style="color:#F00">*</span></label>
                                    <input id="page_name" name="page_name" placeholder="Page title" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['page_name']) ? htmlentities($editRecord[0]['page_name']) : ''; ?>" data-required="true" <?php if(empty($editRecord)) { ?>onkeyup="create_slug(this.value);" <?php } ?>autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('page_name') ?><?=!empty($edit_data)?'':'<span style="color:#F00">*</span>';?></label>
                                    <?php if(!empty($editRecord)) { ?>
                                    <br><label><?= !empty($editRecord[0]['slug']) ? htmlentities($editRecord[0]['slug']) : ''; ?></label>
                                    
                                    <?php } else { ?>
                                    <input id="slug" name="slug" placeholder="Page name" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['slug']) ? htmlentities($editRecord[0]['slug']) : ''; ?>" data-required="true" onkeyup="create_slug(this.value);" >
                                    <?php } ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_desc') ?><span style="color:#F00">*</span></label>
                                    <textarea id="description" name="description" placeholder="Description" class="form-control parsley-validated" type="text"><?= !empty($editRecord[0]['description']) ? htmlentities($editRecord[0]['description']) : ''; ?></textarea>
                                    <script type="text/javascript">
                                      CKEDITOR.replace('description',
                                       {
                                        fullPage : false,

                                        toolbar:[['Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat'],[ 'NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ],[ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ],[ 'Find','Replace','-','SelectAll','-' ],[ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar' ],[ 'TextColor','BGColor' ],[ 'Maximize', 'ShowBlocks'],[ 'Font','FontSize'],[ 'Link','Unlink','Anchor' ],['Source']],

                                        baseHref : '<?=$this->config->item('ck_editor_path')?>',
                                        filebrowserUploadUrl : '<?=$this->config->item('ck_editor_path')?>ckupload.php',
                                        filebrowserImageUploadUrl : '<?=$this->config->item('ck_editor_path')?>ckupload.php'
                                      }, {width: 200});                           
                                    </script> 
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?php echo $this->lang->line('meta_title');?></label>
                                    <input id="meta_title" name="meta_title" placeholder="<?php echo $this->lang->line('meta_title');?>" class="form-control parsley-validated" type="text" value="<?php echo !empty($editRecord[0]['meta_title'])?$editRecord[0]['meta_title']:'';?>">
                                </div>
                                <div class="form-group">
                                      <label for="select-multi-input"><?php echo $this->lang->line('meta_keyword');?></label>
                                      <textarea id="meta_keyword" name="meta_keyword" placeholder="<?php echo $this->lang->line('meta_keyword');?>" class="form-control parsley-validated"><?php echo !empty($editRecord[0]['meta_keyword'])?$editRecord[0]['meta_keyword']:'';?></textarea>
                                </div>
                                <div class="form-group">
                                      <label for="select-multi-input"><?php echo $this->lang->line('meta_description');?></label>
                                      <textarea id="meta_description" name="meta_description" placeholder="<?php echo $this->lang->line('meta_description');?>" class="form-control parsley-validated"><?php echo !empty($editRecord[0]['meta_description'])?$editRecord[0]['meta_description']:'';?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <input type="hidden" name="id" id="content_id" value="<?= !empty($editRecord[0]['id']) ? $editRecord[0]['id'] : ''; ?>" />
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
        var page_name = $('#page_name').val();
        var edit_id = $('#content_id').val();
        
        var messageLength = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
        
        if ($('#<?php echo $viewname ?>').parsley().isValid()) {
            $.ajax({
                type: "POST",
                url: "<?php echo $this->config->item('admin_base_url') . $viewname . '/check_user'; ?>",
                async:false,
                data: {'page_name': page_name,'edit_id':edit_id},
                success: function(data)
                {


                    if(data == '1')
                    {
                        $('#page_name').focus();
                        $('#save').attr('disabled','disabled');

                            $.confirm({'title': 'Alert','message': " <strong> This page name already existing. Please select other page name. "+"<strong></strong>",'buttons': {'ok'  : {'class'  : 'btn_center alert_ok','action': function(){
                                      $('#page_name').focus();
                                      $('#save').removeAttr('disabled');
                                      $('#page_name').val('');
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
            if( !messageLength ) 
            {
                $.confirm({'title': 'Warning','message': " <strong> Please enter full description."+"<strong></strong>",'buttons': {'ok' : {'class'  : 'btn_center alert_ok'}}});
                return false;
            }

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