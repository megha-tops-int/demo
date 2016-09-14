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

$head_title = 'Manage Slider';
$sub_title = 'Slider';
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
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_title') ?><span style="color:#F00">*</span></label>
                                    <input id="title" name="title" placeholder="Title" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['title']) ? htmlentities($editRecord[0]['title']) : ''; ?>" data-required="true">
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?php echo $this->lang->line('slider_type');?><span style="color:#F00">*</span></label>
                                    <select name="slider_type" id="slider_type" class="form-control parsley-validated" data-required="required" data-required="true" onchange="return show_hide_div(this.value)">
                                        <option <?php if(!empty($editRecord[0]['type']) && $editRecord[0]['type'] == "1") { echo "selected = selected"; } ?>  value="1"> Image </option>
                                        <option <?php if(!empty($editRecord[0]['type']) && $editRecord[0]['type'] == "2") { echo "selected = selected"; } ?>  value="2"> Video</option>
                                        
                                    </select>
                                    <input type="hidden" name="slider_type_old" id="slider_type_old" value="<?=!empty($editRecord[0]['type'])?$editRecord[0]['type']:''?>">
                                </div>
                                
                                <div class="video_url_div" <?php if(!empty($editRecord[0]['type']) && $editRecord[0]['type'] == 2) { ?>  style="display:block" <?php }else { ?>  style="display:none" <?php }?>>
                                    <?php 
                                    $youtube_url='';
                                    if(!empty($editRecord[0]['type']) && $editRecord[0]['type'] == 2)
                                    {
                                        $youtube_url = $editRecord[0]['field_value'];
                                    }else
                                    {
                                        $youtube_url = '';
                                    } ?>
                                    
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('video_url') ?><span style="color:#F00">*</span></label>
                                    <input id="field_value" name="field_value" placeholder="<?= $this->lang->line('video_url') ?>" class="form-control parsley-validated" type="text" data-type="map_url" data-parsley-type="map_url" value="<?= !empty($youtube_url)? $youtube_url : ''; ?>" disabled="disabled" data-required="true"><br>
                                    
                                  <?php 
                                  
                                  if(!emptY($editRecord[0]['type']) && $editRecord[0]['type'] == 2)
                                            { $youtube_link_code = explode('v=', $editRecord[0]['field_value']);
                                            
                                            ?>
                        <iframe  width="100%" height="300px" src="https://www.youtube.com/embed/<?=!empty($youtube_link_code[1])?$youtube_link_code[1]:''; ?>?rel=0&fs=1" frameborder="0" allowfullscreen></iframe>
                                      <?php }   ?>
                                </div>
                                </div>
                                
                                <div class="image_div form-group" <?php if(!empty($editRecord[0]['type']) && $editRecord[0]['type'] == 2) { ?>  style="display:none" <?php }?>>
                                    <label for="select-multi-input">Image<span style="color:#F00">*</span></label>
                                    <div class="browse"> <span class="text"> </span>
                                      <div class="browse_btn">
                                        <div class="file_input_div">
                                          <input type="button" value="Browse" class="file_input_button"  />
                                          <input type="file" alt="1" name="image" id="image" onchange="showimagepreview(this)" class="file_input_hidden form-control parsley-validated"/>
                                        </div>
                                          
                                      </div>
                                          
                                      <input class="image_upload" type="hidden"  data-bvalidator="extension[jpg:png:jpeg:bmp:gif]" data-bvalidator-msg="Please upload jpg | jpeg | png | bmp | gif file only" name="hiddenFile" id="hiddenFile" value="" />
                                      
                                       <?php 
                                    $image_name='';
                                    if(!empty($editRecord[0]['type']) && $editRecord[0]['type'] == 1)
                                    {
                                        $image_name = $editRecord[0]['field_value'];
                                    }else
                                    {
                                        $image_name = '';
                                    } ?>
                                      <input type="hidden" name="oldfile" id="oldfile" value="<?=!empty($image_name)?$image_name:'';?>" />
                                      <input type="hidden" name="oldfile1" id="oldfile1" value="<?=!empty($image_name)?$image_name:'';?>" />
                                    </div>
                                    
                                    <p> <span class="txt">&nbsp;</span>
                                  <?php 
                                            if(!empty($editRecord[0]['field_value']) && !empty($editRecord[0]['type']) && $editRecord[0]['type'] == 1)
                                            {
                                              if(file_exists($this->config->item('slider_img_small_path').$editRecord[0]['field_value'])){
                                                ?>
                                                <img id="uploadPreview1" src="<?=$this->config->item('slider_small_img_url').$editRecord[0]['field_value'] ?>"  width="100"  height="100" />
                                      <?php }else {  ?>
                                                <img id="uploadPreview1" src="<?=base_url('images/no_image.jpg')?>"  width="100"  height="100" />
                                            <?php } } else { ?>
                                                <img id="uploadPreview1" src="<?=base_url('images/no_image.jpg')?>"  width="100"  height="100" />
                                            <?php } ?>
                                 
                           </p>
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

    $(document).ready(function(){
         <?php
          if(!empty($editRecord[0]['type']) && $editRecord[0]['type'] == 2) { ?>
                show_hide_div('2');
          <?php } ?>
      });
  
    function setdefaultdata()
    {
       var type = $( "#slider_type option:selected" ).val();
       var old_file = $("#oldfile1").val();
       var file = $("#image").val();
      
            if(type == 1)
            {
                if (file == '' && old_file == '')
                {
                    $.confirm({'title': 'Alert', 'message': " <strong> Please upload image " + "<strong></strong>", 'buttons': {'ok': {'class': 'btn_center alert_ok'}}});
                    return false;
                }
            }
            $('#<?php echo $viewname ?>').parsley('validate');
            if ($('#<?php echo $viewname ?>').parsley().isValid()) {
                $.blockUI({message: '<?= '<img src="' . base_url('images') . '/ajaxloader.gif" border="0" align="absmiddle"/>' ?> Please Wait...'});
            }
    
    }
    
    function cleare_data()
    {
        $("#<?php echo $viewname; ?>").parsley().destroy();
        $("#<?php echo $viewname; ?>").parsley();
    }
    
    //image upload
    function showimagepreview(input) 
    {
     // console.log(input.files[0]['name']);
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
    function show_hide_div(id)
    {
        if(id == 1)
        {
            $('.video_url_div').hide();
            $('.image_div').show();
            $('#field_value').attr('disabled','disabled');
            $('#field_value').attr('data-required','false');
          
            
             
        }else if(id == 2)
        {   
           
            $('.video_url_div').show();
            $('.image_div').hide();
            
            $('#field_value').removeAttr('disabled');
            
        }
         $("#<?php echo $viewname; ?>").parsley().destroy();
            $("#<?php echo $viewname; ?>").parsley();
      
    }
</script>