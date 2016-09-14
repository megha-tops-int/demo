<?php /*
  @Description: User Add
  @Author: Megha Shah
  @Date: 07-09-2016

 */ ?>
<?php
$viewname = $this->router->uri->segments[2];
$formAction = !empty($editRecord) ? 'update_data' : 'insert_data';
$path = $viewname . '/' . $formAction;
$is_edit = !empty($editRecord) ? "Edit User" : "Add New User";

$edit_data = !empty($editRecord) ? '1' : '';
?>
<div id="content">
    <div id="content-header">
        <h1><?php echo $this->lang->line('user_long') ?></h1>
    </div>
    <div id="content-container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <div class="portlet-header">
                        <h3> <i class="fa fa-user"></i><?php echo $is_edit ?></h3>
                        <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)" title="Back">Back</a> 
                    </div>
                    <div class="portlet-content">
                        <div class="col-sm-8">
                            <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?php echo $this->config->item('admin_base_url') ?><?php echo $path ?>" >
                                <div class="form-group">
                                    <label for="select-multi-input"><?php echo $this->lang->line('common_label_name') ?><span style="color:#F00">*</span></label>
                                    <input id="name" name="name" placeholder="Name" class="form-control parsley-validated" type="text" data-required="required" value="<?php echo!empty($editRecord[0]['name']) ? htmlentities($editRecord[0]['name']) : ''; ?>" data-required="true">
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?php echo $this->lang->line('common_label_email') ?><?php echo!empty($edit_data) ? '' : '<span style="color:#F00">*</span>'; ?></label>
                                    <?php if (!empty($edit_data)) { ?>
                                        <br><label><?php echo!empty($editRecord[0]['email']) ? $editRecord[0]['email'] : ''; ?></label>
                                    <?php } else { ?>
                                        <input id="email" placeholder="Email" class="form-control parsley-validated" type="email" data-required="required"  name="email" value="<?php echo!empty($editRecord[0]['email']) ? $editRecord[0]['email'] : ''; ?>" onchange="check_email(this.value,<?php echo!empty($editRecord[0]['id']) ? $editRecord[0]['id'] : '0'; ?>);">
                                    <?php } ?>                                    
                                </div>
                                <?php
                                if (empty($editRecord[0]['id'])) {
                                    ?>
                                    <div class="form-group">
                                        <label for="select-multi-input">Password<span style="color:#F00">*</span></label>
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
                                    <label for="select-multi-input"><?php echo $this->lang->line('common_label_dob') ?><span style="color:#F00">*</span></label>
                                    <input id="date_of_birth" name="date_of_birth" placeholder="Date of birth" class="form-control parsley-validated" type="text" data-required="required" value="<?php echo (!empty($editRecord[0]['date_of_birth']) &&  $editRecord[0]['date_of_birth'] != '0000-00-00 00:00:00' && $editRecord[0]['date_of_birth'] != '1970-01-01 00:00:00') ? date(COMMAN_DATE_FORMATE_JS, strtotime($editRecord[0]['date_of_birth'])) : ''; ?>" data-required="true">
                                </div>
                                <div class="form-group">
                                    <label for="select-multi-input"><?php echo $this->lang->line('common_label_country') ?><span style="color:#F00">*</span></label>
                                    <select id="country" name="country" class="form-control parsley-validated" data-required="true">
                                        <option value="">Select Country</option>
                                        <option value="india" <?php if(!empty($editRecord[0]['country']) && $editRecord[0]['country'] == 'india')  echo "selected='selected'" ; ?>>India</option>
                                        <option value="china" <?php if(!empty($editRecord[0]['country']) && $editRecord[0]['country'] == 'china')  echo "selected='selected'" ; ?>>China</option>
                                        <option value="usa" <?php if(!empty($editRecord[0]['country']) && $editRecord[0]['country'] == 'usa')  echo "selected='selected'" ; ?>>USA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="select-multi-input"><?php echo $this->lang->line('common_label_profile_pic') ?><?php if (empty($editRecord)) { ?><span style="color:#F00">*</span><?php } ?></label>
                                    <div class="browse"> 
                                        <span class="text"> </span>
                                      <div class="browse_btn">
                                        <div class="file_input_div">
                                          <input type="button" value="Browse" class="file_input_button"  />
                                          <input type="file" alt="1" name="profile_pic" id="image" onchange="showimagepreview(this)" class="file_input_hidden form-control parsley-validated" <?php if (empty($editRecord)) { ?> data-required="true" <?php } ?>/>
                                        </div>
                                      </div>
                                      <input class="image_upload" type="hidden"  data-bvalidator="extension[jpg:png:jpeg:bmp:gif]" data-bvalidator-msg="Please upload jpg | jpeg | png | bmp | gif file only" name="hiddenFile" id="hiddenFile" value="" />
                                      <input type="hidden" name="oldfile" id="oldfile" value="<?php echo (!empty($editRecord[0]['profile_pic'])?$editRecord[0]['profile_pic']:'');?>" />
                                      <input type="hidden" name="oldfile1" id="oldfile1" value="<?php (!empty($editRecord[0]['profile_pic'])?$editRecord[0]['profile_pic']:'');?>" />
                                    </div>
                                    <?php /*<input id="profile_pic" name="profile_pic" class="form-control parsley-validated" type="file" <?php if (empty($editRecord)) { ?> data-required="true" <?php } ?>> */ ?>
                                    
                                    <p> <span class="txt">&nbsp;</span>
                                      <?php if(empty($editRecord)) { ?>
                                      <img id="uploadPreview1" class="noimage" src="<?php echo base_url('images/no_image.jpg')?>"  width="100" height="100" style="display:none;"/>
                                      <?php } else { ?>
                                      <?php if(empty($editRecord[0]['profile_pic'])) { ?>
                                      <img id="uploadPreview1" src="<?php echo base_url('images/no_image.jpg')?>"  width="100"  height="100" />
                                      <?php } else { 
                                              //echo "em";
                                              if(!file_exists($this->config->item('user_img_small_path').$editRecord[0]['profile_pic'])){
                                                ?>
                                      <img id="uploadPreview1" class="noimage" src="<?php echo base_url('images/no_image.jpg')?>"  width="100" />
                                      <?php }
                                            else
                                            { 
                                              ?>
                                      <img id="uploadPreview1" src="<?php echo $this->config->item('user_small_img_url').$editRecord[0]['profile_pic'] ?>"  width="100"  height="100" />
                                      <?php } }  ?>
                                      <?php } ?>
                                    </p>
                                    <label> To get best resolution preferred image size is 360 X 150. </label>
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?php echo  $this->lang->line('common_label_gender') ?><span style="color:#F00">*</span></label><br>
                                    <input id="gender_m" name="gender" class="parsley-validated" type="radio" data-required="required" <?php if(!empty($editRecord[0]['gender']) && $editRecord[0]['gender'] == 'male')  echo "checked" ; ?> value="male" data-required="true">
                                    <label for="gender_m">Male</label> &nbsp;&nbsp;
                                    <input id="gender_f" name="gender" class="parsley-validated" type="radio" data-required="required" <?php if(!empty($editRecord[0]['gender']) && $editRecord[0]['gender'] == 'female')  echo "checked" ; ?> value="female" data-required="true"> 
                                    <label for="gender_f">Female</label>
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?php echo  $this->lang->line('common_label_user_interest') ?></label><br>
                                    <div>
                                        <input id="user_interest_technology" name="user_interest[]" class="parsley-validated" type="checkbox" value="technology" <?php if(isset($interests_data) && !empty($interests_data) && in_array('technology', $interests_data))  echo "checked" ; ?>>
                                        <label for="user_interest_technology">Technology</label> &nbsp;&nbsp;
                                        <input id="user_interest_science" name="user_interest[]" class="parsley-validated" type="checkbox" value="science" <?php if(isset($interests_data) && !empty($interests_data) && in_array('science', $interests_data))  echo "checked" ; ?>>
                                        <label for="user_interest_science">Science</label> &nbsp;&nbsp;
                                        <input id="user_interest_cooking" name="user_interest[]" class="parsley-validated" type="checkbox"  value="cooking" <?php if(isset($interests_data) && !empty($interests_data) && in_array('cooking', $interests_data))  echo "checked" ; ?>>
                                        <label for="user_interest_cooking">Cooking</label> &nbsp;&nbsp;
                                        <input id="user_interest_arts_craft" name="user_interest[]" class="parsley-validated" type="checkbox"  value="arts_craft" <?php if(isset($interests_data) && !empty($interests_data) && in_array('arts_craft', $interests_data))  echo "checked" ; ?>>
                                        <label for="user_interest_arts_craft">Arts & Craft</label> &nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="select-multi-input"><?php echo $this->lang->line('common_label_desc') ?></label>
                                    <textarea id="description" name="description" placeholder="Description" class="form-control parsley-validated" type="text"><?php echo  !empty($editRecord[0]['description']) ? htmlentities($editRecord[0]['description']) : ''; ?></textarea>
                                    <script type="text/javascript">
                                      CKEDITOR.replace('description',
                                       {
                                        fullPage : false,

                                        toolbar:[['Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat'],[ 'NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ],[ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ],[ 'Find','Replace','-','SelectAll','-' ],[ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar' ],[ 'TextColor','BGColor' ],[ 'Maximize', 'ShowBlocks'],[ 'Font','FontSize'],[ 'Link','Unlink','Anchor' ],['Source']],

                                        baseHref : '<?php echo $this->config->item('ck_editor_path')?>',
                                        filebrowserUploadUrl : '<?php echo $this->config->item('ck_editor_path')?>ckupload.php',
                                        filebrowserImageUploadUrl : '<?php echo $this->config->item('ck_editor_path')?>ckupload.php'
                                      }, {width: 200});                           
                                    </script> 
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo!empty($editRecord[0]['id']) ? $editRecord[0]['id'] : ''; ?>" />
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
        $('#date_of_birth').datetimepicker({
            format:'<?php echo COMMAN_DATE_FORMATE_JS; ?>',
            timepicker:false,
            scrollInput:false,
            scrollMonth:false,
            maxDate:'+<?php echo date('d/m/Y'); ?>'//tomorrow is maximum date calendar
        });
    });

    function setdefaultdata()
    {
        if ($('#<?php echo $viewname ?>').parsley().isValid()) {
            $.blockUI({message: '<?php echo '<img src="' . base_url('images') . '/ajaxloader.gif" border="0" align="absmiddle"/>' ?> Please Wait...'});
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
            success: function (data)
            {

                if (data == '1')
                {
                    $("#save").prop("disabled", true);
                    $.confirm({'title': 'Alert', 'message': " <strong> This email already existing ! Please select other email " + "<strong></strong>", 'buttons': {'ok': {'class': 'btn_center alert_ok', 'action': function () {
                                    $('#email').val('');
                                    $('#email').focus();
                                    $("#save").prop("disabled", false);
                                }}}});
                }
                if (data == '2')
                {
                    $("#save").prop("disabled", true);
                    $.confirm({'title': 'Alert', 'message': " <strong> This email address is not valid ! Please select valid email address" + "<strong></strong>", 'buttons': {'ok': {'class': 'btn_center alert_ok', 'action': function () {
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
    
    //image upload
    function showimagepreview(input) 
    {
      
        var arr1 = input.files[0]['name'].split('.');
        var arr= arr1[1].toLowerCase(); 
        if(arr == 'jpg' || arr == 'jpeg' || arr == 'png' || arr == 'gif')
        {
            
            //console.log(input.files[0]['name']);
//      var maximum = input.files[0].size/1024;
//      //alert(maximum);
//      if (input.files && input.files[0] && maximum <= 4096) 
//      {
//        
          var filerdr = new FileReader();
          filerdr.onload = function(e) {
          $('#uploadPreview1').attr('src', e.target.result);
          $('#uploadPreview1').show();
          $('#delete_btn').show();
          }
          filerdr.readAsDataURL(input.files[0]);
//      } else
//      {
//        $.confirm({'title': 'Alert','message': " <strong> Maximum upload size 4 MB "+"<strong></strong>",'buttons': {'ok' : {'class'  : 'btn_center alert_ok'}}});
//          return false;
//      }
       }
       else
        {
          $.confirm({
              'title': 'CONFIRM','message': " <strong> Please upload jpg | jpeg | png | gif file only </strong>",
              'buttons': {
                'Ok': {'class': 'btn_center alert_ok',  
                    'action': function(){
                      $("#image").val('');
                      $("#uploadPreview1").attr("src", "<?php echo base_url('images/no_image.jpg'); ?>");      
                      }}
               }
          });
          return false;
        } 
      
     
    }
    // END
    
    var _URL = window.URL;
    $("#image").change(function(e) {
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {

                if (this.width >= 360 && this.height >= 150)
                {

                }
                else
                {
                    $.confirm({'title': 'Alert', 'message': " <strong>  Invalid image size. Please upload 360 X 150 resolution image.</strong>", 'buttons': {'ok': {'class': 'btn_center alert_ok'}}});
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
</script>