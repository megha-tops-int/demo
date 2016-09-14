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

$head_title = 'Partner Management';
$sub_title = 'Partner';
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
                        <h3> <i class="fa fa-user-plus"></i><?= $is_edit . " " . $sub_title; ?></h3>
                        <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)" title="Back">Back</a> 
                    </div>
                    <div class="portlet-content">
                        <div class="col-sm-8">
                            <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url') ?><?php echo $path ?>" novalidate >
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('partner_name') ?><span style="color:#F00">*</span></label>
                                    <input id="partner_name" name="partner_name" placeholder="Name of partner" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['partner_name']) ? htmlentities($editRecord[0]['partner_name']) : ''; ?>" data-required="true">
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('website') ?></label>
                                    <input id="website" name="website" placeholder="Website (e.g. http://example.com/)" class="form-control parsley-validated"  type="text" data-type="map_url" data-parsley-type="map_url" value="<?= !empty($editRecord[0]['website']) ? htmlentities($editRecord[0]['website']) : ''; ?>">
                                </div>
                                
                                  <div class="add_image_div">
                                    <label for="select-multi-input">Logo<span style="color:#F00">*</span></label>
                                    <div class="browse"> <span class="text"> </span>
                                      <div class="browse_btn">
                                        <div class="file_input_div">
                                          <input type="button" value="Browse" class="file_input_button"  />
                                          <input type="file" alt="1" name="image" id="image" onchange="showimagepreview(this)" class="file_input_hidden form-control"/>
                                        </div>
                                      </div>
                                      <input class="image_upload" type="hidden"  data-bvalidator="extension[jpg:png:jpeg:bmp:gif]" data-bvalidator-msg="Please upload jpg | jpeg | png | bmp | gif file only" name="hiddenFile" id="hiddenFile" value="" />
                                      <input type="hidden" name="oldfile" id="oldfile" value="<?=(!empty($editRecord[0]['logo'])?$editRecord[0]['logo']:'');?>" />
                                      <input type="hidden" name="oldfile1" id="oldfile1" value="<?=(!empty($editRecord[0]['logo'])?$editRecord[0]['logo']:'');?>" />
                                    </div>
                                    <p> <span class="txt">&nbsp;</span>
                                      <?php if(empty($editRecord)) { ?>
                                      <img id="uploadPreview1" class="noimage" src="<?=base_url('images/no_image.jpg')?>"  width="100" height="100" style="display:none;"/>
                                      <?php } else { ?>
                                      <?php if(empty($editRecord[0]['logo'])) { ?>
                                      <img id="uploadPreview1" src="<?=base_url('images/no_image.jpg')?>"  width="100"  height="100" />
                                      <?php } else { 
                                              //echo "em";
                                              if(!file_exists($this->config->item('partners_img_small_path').$editRecord[0]['logo'])){
                                                ?>
                                      <img id="uploadPreview1" class="noimage" src="<?=base_url('images/no_image.jpg')?>"  width="100" />
                                      <?php }
                                            else
                                            { 
                                              ?>
                                      <img id="uploadPreview1" src="<?=$this->config->item('partners_small_img_url').$editRecord[0]['logo'] ?>"  width="100"  height="100" />
                                      <?php } }  ?>
                                      <?php } ?>
                                      <span id="delete_btn" style="<?php echo !empty($editRecord) ? empty($editRecord[0]['logo']) ? 'display:none' : '' : 'display:none' ?>"> <a title="Delete Image" class="btn btn-xs btn-primary mar_top_con_my delete_food_div_button1" onclick="return delete_image('<?=!empty($editRecord[0]['id'])?$editRecord[0]['id']:''?>','<?=!empty($editRecord[0]['logo'])?$editRecord[0]['logo']:''?>');"> <i class="fa fa-times"></i> </a></span> </p>
                                    <label> To get best resolution preferred image size is 150 X 150.</label>
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_desc') ?></label>
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
                                    <input type="hidden" name="id" id="partner_id" value="<?= !empty($editRecord[0]['id']) ? $editRecord[0]['id'] : ''; ?>" />
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
        var flag = 1;
        var partner_name = $('#partner_name').val();
        var edit_id = $('#partner_id').val();
        
        var old_file = $("#oldfile1").val();
        var file = $("#image").val();
        
        if ($('#<?php echo $viewname ?>').parsley().isValid()) {
            $.ajax({
                type: "POST",
                url: "<?php echo $this->config->item('admin_base_url') . $viewname . '/check_user'; ?>",
                async:false,
                data: {'partner_name': partner_name,'edit_id':edit_id},
                success: function(data)
                {


                    if(data == '1')
                    {
                        $('#partner_name').focus();
                        $('#save').attr('disabled','disabled');

                            $.confirm({'title': 'Alert','message': " <strong> This partner name already existing. Please select other partner name. "+"<strong></strong>",'buttons': {'ok'  : {'class'  : 'btn_center alert_ok','action': function(){
                                      $('#partner_name').focus();
                                      $('#save').removeAttr('disabled');
                                      $('#partner_name').val('');
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
            if (file == '' && old_file == '')
            {
                $.confirm({'title': 'Alert', 'message': " <strong> Please upload an image " + "<strong></strong>", 'buttons': {'ok': {'class': 'btn_center alert_ok'}}});
                return false;
            }
    //        var messageLength = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
    //        
    //        if( !messageLength ) 
    //        {
    //            $.confirm({'title': 'Warning','message': " <strong> Please enter full description."+"<strong></strong>",'buttons': {'ok' : {'class'  : 'btn_center alert_ok'}}});
    //            return false;
    //        }

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
    
    //image upload
    function showimagepreview(input) 
    {
      //console.log(input.files[0]['name']);
//      var maximum = input.files[0].size/1024;
//      //alert(maximum);
//      if (input.files && input.files[0] && maximum <= 4096) 
//      {
        var arr1 = input.files[0]['name'].split('.');
        var arr= arr1[1].toLowerCase(); 
        if(arr == 'jpg' || arr == 'jpeg' || arr == 'png' || arr == 'gif')
        {
          var filerdr = new FileReader();
          filerdr.onload = function(e) {
          $('#uploadPreview1').attr('src', e.target.result);
          $('#uploadPreview1').show();
          $('#delete_btn').show();
          }
          filerdr.readAsDataURL(input.files[0]);
        }
        else
        {
          $.confirm({
              'title': 'CONFIRM','message': " <strong> Please upload jpg | jpeg | png | gif file only </strong>",
              'buttons': {
                'Ok': {'class': 'btn_center alert_ok',  
                    'action': function(){
                      $("#image").val('');
                      $("#uploadPreview1").attr("src", "<?=base_url('images/no_image.jpg')?>");      
                      }}
               }
          });
          return false;
        } 
//      }
//      else
//      {
//        $.confirm({'title': 'Alert','message': " <strong> Maximum upload size 4 MB "+"<strong></strong>",'buttons': {'ok' : {'class'  : 'btn_center alert_ok'}}});
//          return false;
//      }
    }
    // END

    var _URL = window.URL;
    $("#image").change(function(e) {
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {

                if (this.width >= 150 && this.height >= 150)
                {

                }
                else
                {
                    $.confirm({'title': 'Alert', 'message': " <strong>  Invalid image size. Please upload 150 X 150 resolution image.</strong>", 'buttons': {'ok': {'class': 'btn_center alert_ok'}}});
                    $("#image").val('');
                    $('#delete_btn').hide();
                    $('#uploadPreview1').attr('src', "<?php echo base_url() ?>images/no_image.jpg");
                    $('#uploadPreview1').hide();
                    $("#oldfile1").val('');
                    //location.reload();
                    return false;

                }
            };
            img.src = _URL.createObjectURL(file);
        }
    });
                                
    function delete_image(id,image)
    { 
      if(id != '' && image != '')
      {
        $.confirm({
        'title': 'DELETE','message': " <strong> Are you sure want to delete Image?",'buttons': {'Yes': {'class': 'special',
        'action': function(){
            // $.ajax({
            //     type  : "POST",
            //     url   : "<?php echo $this->config->item('admin_base_url').$viewname.'/delete_profile_image';?>",
            //     data  : {
            //       result_type:'ajax','id':id,'image':image
            //     },
            //     success : function(html){
                    $("#image").val('');
                    $("#uploadPreview1").attr("src", "<?=base_url('images/no_image.jpg')?>");
                    $('#uploadPreview1').hide();
                    $('#delete_btn').hide();
                    $("#oldfile1").val('');
              //   }
              // });
              return false;
            }},'No' : {'class'  : ''}}});
      }
      else
      {
        $.confirm({
        'title': 'DELETE','message': " <strong> Are you sure want to delete Image?",'buttons': {'Yes': {'class': 'special',
        'action': function(){
              $("#image").val('');
              $("#uploadPreview1").attr("src", "<?=base_url('images/no_image.jpg')?>");
              $('#uploadPreview1').hide();
              $('#delete_btn').hide();
              $("#oldfile1").val('');
            }},'No' : {'class'  : ''}}});
        return false;
      }
    }
</script>