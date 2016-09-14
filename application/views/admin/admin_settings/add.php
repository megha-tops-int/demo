<?php
/*
    @Description: CMS Add
    @Author: Parag Joshi
    @Date: 19-02-2016

*/?>
<?php 
$admin_session = $this->session->userdata('junction_studio_admin_session');
$viewname = $this->router->uri->segments[2];
$formAction = !empty($editRecord)?'update_data':'insert_data'; 
$path = $viewname.'/'.$formAction;
$head_title = !empty($editRecord)?'Edit':'Add New';
$msg = $this->session->flashdata('message_session');
//pr($msg);
?>
<div id="content">
  <div id="content-header">
    <h1>Admin Settings</h1>
  </div>
  <div id="content-container">
    <div class="row">
      <div class="col-md-12">
        <div class="portlet">
          <div class="portlet-header">
            <h3> <i class="fa fa-cog"></i>Admin Settings</h3>
          </div>
          <div class="portlet-content">
            <div class="col-sm-8">
              <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname;?>" id="<?php echo $viewname;?>" method="post" accept-charset="utf-8" action="<?php echo $this->config->item('admin_base_url')?><?php echo $path?>" >
                
                <div class="col-sm-12 text-center" id="div_msg">
                    <?php if(!empty($msg)){?>
                    <?php echo '<label class="error-list-color">'.urldecode ($msg).'</label>';
                    ?>
                    <?php } ?>
                </div>
                  
                <div class="form-group">
                  <label for="select-multi-input">Youtube video URL<span style="color:#F00">*</span></label>
                  <input id="video_url" name="video_url" placeholder="Youtube video URL" class="form-control parsley-validated"  type="text" data-type="map_url" data-parsley-type="map_url" value="<?php echo !empty($editRecord[0]['video_url'])?$editRecord[0]['video_url']:'';?>" data-required="required">
                </div>
                  
                    <div class="form-group">
                  <label for="select-multi-input">Instagram URL<span style="color:#F00">*</span></label>
                  <input id="instagram_link" name="instagram_link" placeholder="Instagram URL" class="form-control parsley-validated"  type="text" data-type="map_url" data-parsley-type="map_url" value="<?php echo !empty($editRecord[0]['instagram_link'])?$editRecord[0]['instagram_link']:'';?>" data-required="required">
                </div>
                  
                    <div class="form-group">
                  <label for="select-multi-input">Twitter URL<span style="color:#F00">*</span></label>
                  <input id="twitter_link" name="twitter_link" placeholder="Twitter URL " class="form-control parsley-validated"  type="text" data-type="map_url" data-parsley-type="map_url" value="<?php echo !empty($editRecord[0]['twitter_link'])?$editRecord[0]['twitter_link']:'';?>" data-required="required">
                </div>
                  
                <div class="form-group">
                  <label for="select-multi-input">Address line 1<span style="color:#F00">*</span></label>
                  
                  <input id="address_line_1" name="address_line_1" placeholder="Address line 1" class="form-control parsley-validated" type="text" value="<?php echo !empty($editRecord[0]['address_line_1'])?$editRecord[0]['address_line_1']:'';?>" data-required="required">
                </div>
                  
                  <div class="form-group">
                  <label for="select-multi-input">Address line 2</label>
                  
                  <input id="address_line_2" name="address_line_2" placeholder="Address line 2" class="form-control parsley-validated" type="text" value="<?php echo !empty($editRecord[0]['address_line_2'])?$editRecord[0]['address_line_2']:'';?>" >
                </div>
                  
                  
                  <div class="form-group">
                  <label for="select-multi-input">Email<span style="color:#F00">*</span></label>
                  
                  <input id="email" name="email" placeholder="Email" class="form-control parsley-validated" type="email" value="<?php echo !empty($editRecord[0]['email'])?$editRecord[0]['email']:'';?>" data-required="required">
                </div>
                  
                  
                  <div class="form-group">
                  <label for="select-multi-input">Contact number<span style="color:#F00">*</span></label>
                  
                  <input id="contact_no" name="contact_no" placeholder="Contact number" class="form-control parsley-validated" type="text" value="<?php echo !empty($editRecord[0]['contact_no'])?$editRecord[0]['contact_no']:'';?>" data-required="required" maxlength="15">
                </div>
                  
                
                  <div class="form-group add_image_div">
                        <label for="select-multi-input">Site logo</label>
                        <div class="browse"> 
                            <span class="text"> </span>
                          <div class="browse_btn">
                            <div class="file_input_div">
                              <input type="button" value="Browse" class="file_input_button"  />
                              <input type="file" alt="1" name="image" id="image" onchange="showimagepreview_logo(this)" class="file_input_hidden form-control parsley-validated"/>
                            </div>
                          </div>
                          <input class="image_upload" type="hidden"  data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please upload jpg | jpeg | png  file only" name="hiddenFile" id="hiddenFile" value="" />
                          <input type="hidden" name="oldfile" id="oldfile" value="<?=(!empty($editRecord[0]['site_logo'])?$editRecord[0]['site_logo']:'');?>" />
                          
                        </div>
                        <p> <span class="txt">&nbsp;</span>
                          <?php if(empty($editRecord)) { ?>
                          <img id="uploadPreview" class="noimage" src="<?=base_url('images/logo.png')?>"  width="186" />
                          <?php } else { ?>
                          <?php if(empty($editRecord[0]['site_logo'])) { ?>
                          <img id="uploadPreview" src="<?=base_url('images/logo.png')?>"  width="186"  height="61" />
                          <?php } else { 
                            
                                  if(!file_exists($this->config->item('image_site_logo').$editRecord[0]['site_logo'])){
                                    ?>
                          <img id="uploadPreview" class="noimage" src="<?=base_url('images/logo.png')?>"  width="186" />
                          <?php }
                                else
                                { 
                                  ?>
                          <img id="uploadPreview" src="<?=$this->config->item('image_site_logo_url').$editRecord[0]['site_logo'] ?>"  width="186"  height="61" />
                          <?php } }  ?>
                          <?php } ?>
                         </p>
                        <label> To get best resolution preferred image size is <?=LOGO_WIDGH?> X <?=LOGO_HEIGHT?>. </label>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo !empty($editRecord[0]['id'])?$editRecord[0]['id']:'';?>" />
                    <button type="submit" onclick="return setdefaultdata();" class="btn btn-primary" id="save" title="<?php echo $this->lang->line('save_record');?>">Save</button>

                    <?php /* if(empty($editRecord)){ ?>
                    <button type="reset" class="btn btn-primary" id="reset" onClick="cleare_data()" title="Reset">Reset</button>
                    <?php } */ ?>
                    
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
//image upload
 $(document).ready(function(){
    $("#div_msg").fadeOut(4000); 
});
    
function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;

  return true;
}
    
function setdefaultdata()
{
    if ($('#<?php echo $viewname ?>').parsley().isValid()) 
    {
        $('#<?php echo $viewname ?>').submit();
        $.blockUI({message: '<?= '<img src="' . base_url('images') . '/ajaxloader.gif" border="0" align="absmiddle"/>' ?> Please Wait...'});
    }
//    else
//    {
//        $('#<?php //echo $viewname ?>').submit();
//    }
}

//function cleare_data()
//{
//  CKEDITOR.instances.message.setData('');
//  $("#<?php //echo $viewname;?>").parsley().destroy();
//  $("#<?php //echo $viewname;?>").parsley();
//}

  //image upload
    function showimagepreview_logo(input) 
    {
      var nm = $(input).attr("name");
      var fileUpload = document.getElementById(nm);
        var arr1 = input.files[0]['name'].split('.');
        var arr= arr1[1].toLowerCase(); 
         if(arr == 'jpg' || arr == 'jpeg' || arr == 'png')
        {   
//            //console.log(input.files[0]['name']);
//            var maximum = input.files[0].size/1024;
//            //alert(maximum);
//            if (input.files && input.files[0] && maximum <= 4096) 
//            {
                //Set the Base64 string return from FileReader as source.
                            
                var reader = new FileReader();
                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function(e)
                {
                    //Initiate the JavaScript Image object.
                    var image = new Image();
                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    //Validate the File Height and Width.
                    image.onload = function()
                    {
                        var height = this.height;
                        var width = this.width;                        
                       if ((width != '<?=LOGO_WIDGH?>')  || (height != '<?=LOGO_HEIGHT?>')) {

                   $.confirm({'title': 'Alert', 'message': " <strong> Width and height must exceed <?=LOGO_WIDGH?> X <?=LOGO_HEIGHT?>. " + "<strong></strong>", 'buttons': {'ok': {'class': 'btn_center confirmButtons-1 alert_ok'}}});
                   $('#image').val('');
                   $('#hiddenFile').val('');

                return false;
                    }
                    var filerdr = new FileReader();
                    filerdr.onload = function(e) {
                        $('#uploadPreview').attr('src', e.target.result);
                    }
                    filerdr.readAsDataURL(input.files[0]);
                  }
               }
                           
//            } else
//            {
//              $.confirm({'title': 'Alert','message': " <strong> Maximum upload size 4 MB "+"<strong></strong>",'buttons': {'ok' : {'class'  : 'btn_center alert_ok'}}});
//              $('#image').val('');
//              $('#hiddenFile').val('');
//                return false;
//            }
       }
       else
        {
          $.confirm({
              'title': 'CONFIRM','message': " <strong> Please upload jpg | jpeg | png  file only </strong>",
              'buttons': {
                'Ok': {'class': 'btn_center alert_ok',  
                    'action': function(){
                          
                      $('#image').val('');
                      $('#hiddenFile').val('');
                      
                      }}
               }
          });
          return false;
        } 
    }
    // END
    
</script>
