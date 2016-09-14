<?php /*
  @Description: Admin Add
  @Author: Parag Joshi
  @Date: 13-02-2016

 */ ?>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<?php
$viewname = $this->router->uri->segments[2];
$formAction = !empty($editRecord) ? 'update_data' : 'insert_data';
$path = $viewname . '/' . $formAction;
$is_edit = !empty($editRecord) ? "Edit" : "Add New";
$edit_data = !empty($editRecord) ? '1' : '';

$head_title = 'Project Management';
$sub_title = 'Project';
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
                        <h3> <i class="fa fa-delicious"></i><?= $is_edit . " " . $sub_title; ?></h3>
                        <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)" title="Back">Back</a> 
                    </div>
                    <div class="portlet-content">
                        <div class="col-sm-8">
                            <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url') ?><?php echo $path ?>" >
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('project_title') ?><span style="color:#F00">*</span></label>
                                    <input id="project_title" name="project_title" placeholder="Project title" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['project_title']) ? htmlentities($editRecord[0]['project_title']) : ''; ?>" data-required="true">
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?php echo $this->lang->line('select_type');?><span style="color:#F00">*</span></label>
                                    <select name="project_type" id="project_type" class="form-control parsley-validated" data-required="required" data-required="true" >
                                        <option value=""> Select type </option>
                                        <option <?php if(!empty($editRecord[0]['project_type']) && $editRecord[0]['project_type'] == "Diversity") { echo "selected = selected"; } ?>  value="Diversity"> Diversity </option>
                                        <option <?php if(!empty($editRecord[0]['project_type']) && $editRecord[0]['project_type'] == "Leadership") { echo "selected = selected"; } ?>  value="Leadership"> Leadership </option>
                                        <option <?php if(!empty($editRecord[0]['project_type']) && $editRecord[0]['project_type'] == "Creativity") { echo "selected = selected"; } ?>  value="Creativity"> Creativity </option>
                                        <option <?php if(!empty($editRecord[0]['project_type']) && $editRecord[0]['project_type'] == "Wellbeing") { echo "selected = selected"; } ?>  value="Wellbeing"> Wellbeing </option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('location') ?></label>
                                    <input id="location" name="location" placeholder="Location" class="form-control parsley-validated" type="text" value="<?= !empty($editRecord[0]['location']) ? htmlentities($editRecord[0]['location']) : ''; ?>">
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
                                
                                <div class="form-group add_image_div">
                                    <label for="select-multi-input">Featured image<span style="color:#F00">*</span></label>
                                    <div class="browse"> 
                                        <span class="text"> </span>
                                      <div class="browse_btn">
                                        <div class="file_input_div">
                                          <input type="button" value="Browse" class="file_input_button"  />
                                          <input type="file" alt="1" name="image" id="image" onchange="showimagepreview(this)" class="file_input_hidden form-control parsley-validated"/>
                                        </div>
                                      </div>
                                      <input class="image_upload" type="hidden"  data-bvalidator="extension[jpg:png:jpeg:bmp:gif]" data-bvalidator-msg="Please upload jpg | jpeg | png | bmp | gif file only" name="hiddenFile" id="hiddenFile" value="" />
                                      <input type="hidden" name="oldfile" id="oldfile" value="<?=(!empty($editRecord[0]['image'])?$editRecord[0]['image']:'');?>" />
                                      <input type="hidden" name="oldfile1" id="oldfile1" value="<?=(!empty($editRecord[0]['image'])?$editRecord[0]['image']:'');?>" />
                                    </div>
                                    <p> <span class="txt">&nbsp;</span>
                                      <?php if(empty($editRecord)) { ?>
                                        <img id="uploadPreview1" class="noimage" src="<?=base_url('images/no_image.jpg')?>"  width="100" height="100" style="display:none;"/>
                                      <?php } else { ?>
                                      <?php if(empty($editRecord[0]['image'])) { ?>
                                      <img id="uploadPreview1" src="<?=base_url('images/no_image.jpg')?>"  width="100"  height="100" />
                                      <?php } else { 
                                              //echo "em";
                                              if(!file_exists($this->config->item('project_img_small_path').$editRecord[0]['image'])){
                                                ?>
                                      <img id="uploadPreview1" class="noimage" src="<?=base_url('images/no_image.jpg')?>"  width="100" />
                                      <?php }
                                            else
                                            { 
                                              ?>
                                      <img id="uploadPreview1" src="<?=$this->config->item('project_small_img_url').$editRecord[0]['image'] ?>"  width="100"  height="100" />
                                      <?php } }  ?>
                                      <?php } ?>
                                      <span id="delete_btn" style="<?php echo !empty($editRecord) ? empty($editRecord[0]['image']) ? 'display:none' : '' : 'display:none' ?>"> <a title="Delete Image" class="btn btn-xs btn-primary mar_top_con_my delete_food_div_button1" onclick="return delete_image('<?=!empty($editRecord[0]['id'])?$editRecord[0]['id']:''?>','<?=!empty($editRecord[0]['image'])?$editRecord[0]['image']:''?>');"> <i class="fa fa-times"></i> </a></span> </p>
                                    <label> To get best resolution preferred image size is 360 X 150. </label>
                                </div>
                                
                                <div class="form-group add_field_div">
                                    <div class="custom_field">
                                        <div class="col-lg-12 col-md-12 col-xs-12 row">
                                        <label class="addfield">Add fields</label>
                                         </div>
                                        <div class="col-lg-11 col-md-10 col-xs-12 row">
                                            <select  ondblclick="addfieldtoeditor();" id="slt_customfields" name="slt_customfields" class="form-control parsley-validated selectBox" >
                                            <option title="Select Fields" value="">Select field</option>
                                            <option title="Youtube video URL" value="1">Youtube video URL</option>
                                            <option title="Text" value="2">Text</option>
                                            <option title="File" value="3">Image</option>
                                            </select>
                                          </div>  
                                        <input class="btn btn-secondary-green plusbtn" type="button" name="submitbtn1" onclick="addfieldtoeditor();" title="Insert Field" value="+">
                                    </div>
                                <div id="field_details_update">
                                <?php
                                if(!empty($fields_data))
                                {
                                for ($i=0; $i < count($fields_data) ; $i++)
                                { 
                                    if($fields_data[$i]['field_type'] == '1')
                                    {
                                    ?>
                                        <div class="dataTables_filter" id="urldiv<?= $i ?>">
                                        <div class="row margin_tab">
                                        <div class="col-lg-12">
                                            <div class="col-sm-2">
                                                <input type="hidden" name="field_count_list[1][]" id="field_count_list" value="<?=$i+1?>" />
                                                <span id="url_<?php echo $i ?>">URL</span><span style="color:#F00">*</span> <span class="val" id="url_req_<?php echo $i ?>"></span> 
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="url">
                                                <input  type="text" data-type="map_url" data-parsley-type="map_url" data-required="true" placeholder="Youtube video URL" class="form-control parsley-validated" data-parsley-group="block1" name="url[]" id="url<?php echo $i ?>" value="<?php echo !empty($fields_data[$i]['field_value'])?$fields_data[$i]['field_value']:''; ?>"/>
                                                </label>
                                                
                                            </div>
                                            
                                           <div class="col-sm-2"> 
                                               <a title="Delete URL" class="btn btn-xs btn-primary edit_url" onclick="return delete_field_details('<?=!empty($fields_data[$i]['id'])?$fields_data[$i]['id']:''?>','1','<?= $i ?>');"> <i class="fa fa-times"></i> </a> 
                                                <label for="url">
                                                     <?php 
                                                     if(preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $fields_data[$i]['field_value'], $matches))
                                               {
                                                   $youtube_link_code = $matches[1];
                                               }
                                               else
                                               {
                                                   $youtube_link_code = '';
                                               }?>
                                                     
                                                    <a target="_blank" title="Youtube video" href="<?=$fields_data[$i]['field_value']?>" >
                                                   <img src="https://img.youtube.com/vi/<?=$youtube_link_code?>/0.jpg" width='50' height='50'>
                                                    </a>
                                                    
                                                     
                                                </label>
                                           </div>
                                        </div>
                                        </div>
                                        </div>
                                    <?php 
                                    }
                                    elseif($fields_data[$i]['field_type'] == '2')
                                    {
                                    ?>
                                        <div class="dataTables_filter" id="paratextdiv<?= $i ?>">
                                        <div class="row margin_tab">
                                        <div class="col-lg-12">
                                        <div class="col-sm-2">
                                        <input type="hidden" name="field_count_list[2][]" id="field_count_list" value="<?=$i+1?>" />
                                        <span id="para<?php echo $i ?>">Text</span><span style="color:#F00">*</span> <span class="val" id="para_req_<?php echo $i ?>"></span> </div>
                                        <div class="col-sm-4">
                                        <label for="paratext">
                                        <textarea name="paratext[]" data-required="true" placeholder="text" class="form-control parsley-validated" id="paratext<?php echo $i ?>"/><?php echo !empty($fields_data[$i]['field_value'])?$fields_data[$i]['field_value']:''; ?></textarea>
                                        </label>
                                        </div>
                                        <div class="col-sm-2 dynamic_dml"> <a href="javascript:void(0);" title="Delete Text" class="btn btn-xs btn-primary" onclick="return delete_field_details('<?=!empty($fields_data[$i]['id'])?$fields_data[$i]['id']:''?>','2','<?= $i ?>');"> <i class="fa fa-times"></i> </a> </div>
                                        </div>
                                        </div>
                                        </div>
                                    <?php
                                    }

                                    elseif($fields_data[$i]['field_type'] == '3')
                                    {
                                    ?>
                                        <div class="dataTables_filter" id="filediv<?= $i ?>">
                                    <div class="row margin_tab">
                                    <div class="col-lg-12">
                                    <div class="col-sm-2">
                                    <input type="hidden" name="field_count_list[3][]" id="field_count_list" value="<?=$i+1?>" />
                                    <span id="file_<?php echo $i ?>">Image</span><span style="color:#F00">*</span> <span class="val" id="file_req_<?php echo $i ?>"></span> </div>
                                    <div class="col-sm-2">
                                    
                                     <div class="browse_btn">
                                        <div class="file_input_div">
                                            <input type="button" value="Browse" class="file_input_button"  />    
                                                <input type="file" class="file_input_hidden form-control file_type" data-parsley-group="block1" name="file_name[]" id="file<?php echo $i ?>" onchange="showimagepreview2(this,<?=$i?>)"/>
                                        </div>
                                     </div>    
                                    
                                    </div>
                                    <div class="col-sm-2">
                                    <?php 
                                            if(!empty($fields_data[$i]['field_value']) && file_exists($this->config->item('project_fields_img_small_path').$fields_data[$i]['field_value'])) {
                                          ?>
                                    <img id='image_preview_<?=$i?>' title="Image" class="img-responsive" src="<?php echo $this->config->item('project_fields_small_img_url').$fields_data[$i]['field_value']?>"  style="width:80px !important;height:80px !important" />
                                    <?php }else{ ?>
                                    <img id='image_preview_<?=$i?>' title="Image" class="img-responsive" src="<?php echo $this->config->item('image_path')."/no_image.jpg" ?>" style="width:80px !important;height:80px !important"/>
                                    <?php } ?>
                                    <input type="hidden" name="fieldoldfile[]" id="fieldoldfile" value="<?=(!empty($fields_data[$i]['field_value'])?$fields_data[$i]['field_value']:'');?>" />
                                    </div>
                                    <div class="col-sm-1 dynamic_dml"> <a href="javascript:void(0);" title="Delete Image" class="btn btn-xs btn-primary" onclick="return delete_field_details('<?=!empty($fields_data[$i]['id'])?$fields_data[$i]['id']:''?>','3','<?= $i ?>');"> <i class="fa fa-times"></i> </a> </a> </div>
                                    </div>
                                    </div>
                                    </div>
                                    <?php 
                                    }
                                 }
                                }
                                ?>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <div class="tabelbdr tabelbdr_new">
                                        <div class="dataTables_filter dynamic_content_form" id="form"> </div>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="form-group addsavebtn">
                                    <input type="hidden" name="id" id="project_id" value="<?= !empty($editRecord[0]['id']) ? $editRecord[0]['id'] : ''; ?>" />
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
        $('#<?php echo $viewname ?>').parsley().validate();
        var flag = 1;
        var project_title = $('#project_title').val();
        var edit_id = $('#project_id').val();
        
        var old_file = $("#oldfile1").val();
        var file = $("#image").val();
        
        if ($('#<?php echo $viewname ?>').parsley().isValid()) {
            $.ajax({
                type: "POST",
                url: "<?php echo $this->config->item('admin_base_url') . $viewname . '/check_user'; ?>",
                async:false,
                data: {'project_title': project_title,'edit_id':edit_id},
                success: function(data)
                {


                    if(data == '1')
                    {
                        $('#project_title').focus();
                        $('#save').attr('disabled','disabled');

                            $.confirm({'title': 'Alert','message': " <strong> This project title already existing. Please select other project title. "+"<strong></strong>",'buttons': {'ok'  : {'class'  : 'btn_center alert_ok','action': function(){
                                      $('#project_title').focus();
                                      $('#save').removeAttr('disabled');
                                      $('#project_title').val('');
                                    }}}});
                            $("#<?php echo $viewname; ?>").parsley().destroy();
                            $("#<?php echo $viewname; ?>").parsley();
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
    //  console.log(input.files[0]['name']);
     
        var arr1 = input.files[0]['name'].split('.');
        var arr= arr1[1].toLowerCase(); 
        if(arr == 'jpg' || arr == 'jpeg' || arr == 'png' || arr == 'gif')
        {
//            
//         var maximum = input.files[0].size/1024;
//      //alert(maximum);
//            if (input.files && input.files[0] && maximum <= 4096) 
//            {
                var filerdr = new FileReader();
                filerdr.onload = function(e) {
                $('#uploadPreview1').attr('src', e.target.result);
                $('#uploadPreview1').show();
                $('#delete_btn').show();
                }
                filerdr.readAsDataURL(input.files[0]);

//                }
//            else
//            {
//              $.confirm({'title': 'Alert','message': " <strong> Maximum upload size 4 MB "+"<strong></strong>",'buttons': {'ok' : {'class'  : 'btn_center alert_ok'}}});
//                return false;
//            }
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
    
    // Add URL,TEXT AND IMAGES START
  var counterFName    = 0;
  var counterParatext = 0;
  var counterFile     = 0;

  var field_count   = parseInt('<?=!empty($fields_data)?count($fields_data)+1:1?>');
    function addfieldtoeditor()
{
  var abc = $('#slt_customfields').val();
  
  if(abc == ''){
    $.confirm({
    'title': 'WARNING','message': "<strong> Please select fields",'buttons': {
                      'Ok': {'class': 'btn_center alert_ok',  
                          'action': function(){
                            $("#slt_customfields").focus();
                            }}
                     }});
    return false;
  }
  else
  {
    for(counter=0;counter<abc.length;counter++)
    { 
        a = abc[counter];

        if(a == 1)
        {
          var scntDiv = $('#form');
          var i = $('#urldiv').size();
          
          if($('#url'+counterFName).length == 1)
          {
            for (j = 1; j > 0; j++)
            {
              if ($('#url'+counterFName).length == 1){
                counterFName++;
                field_count++;
              }
              else{
                break;
              }
            }
          }
          if ($('#url'+counterFName).length != 1)
          {
            
            //alert($(this).parents("#namediv").children().first().attr("id"));
             var html_inner_url = '';
             
                    html_inner_url +='<div class="row dataTables_filter" id="urldiv">';
                    html_inner_url +='<div class="row margin_tab">';
                    html_inner_url +='<div class="col-lg-12">';
                    html_inner_url +='<div class="col-sm-2">';
                    html_inner_url +='<input type="hidden" name="field_count_list[1][]" id="field_count_list" value="'+field_count+'" />';
                    html_inner_url +='<span id="url_'+counterFName+'">URL<span style="color:#F00">*</span></span><span class="val" id="url_req_'+counterFName+'"></span>';
                    html_inner_url +='</div>';
                    html_inner_url +='<div class="col-sm-4">';
                    html_inner_url +='<label for="url">';
                    html_inner_url +='<input  type="text" data-type="map_url" data-parsley-type="map_url" placeholder="Youtube video URL" data-required="true" class="form-control parsley-validated" data-parsley-group="block1" name="url[]" id="url'+counterFName+'" />';
                    html_inner_url +='</label>';
                    html_inner_url +='</div>';
                    html_inner_url +='<div class="col-sm-2 dynamic_dml">';
                    html_inner_url +='<a href="javascript:void(0);"  id="remScnt_url" class="btn btn-xs btn-primary"><i class="fa fa-times"></i></a>';
                    html_inner_url +='</div>';
                    html_inner_url +='</div>';
                    html_inner_url +='</div>';
             
             $(html_inner_url).appendTo(scntDiv);
             i++;
              counterFName++;
              field_count++;
          }
        }
        else if(a == 2)
        {
          var scntDiv = $('#form');
          var i = $('#paratextdiv').size();
          if($('#paratext'+counterParatext).length == 1)
          {
            for (j = 1; j > 0; j++) 
            {
              if ($('#paratext'+counterParatext).length == 1)
                counterParatext++;
              else
                break;
            }
          }
          if($('#paratext'+counterParatext).length != 1)
          {
              
                var html_inner_text = '';
               
                html_inner_text +='<div class="row dataTables_filter" id="paratextdiv">';
                html_inner_text +='<div class="row margin_tab">';
                html_inner_text +='<div class="col-lg-12">';
                html_inner_text +='<div class="col-sm-2">';
                html_inner_text +='<input type="hidden" name="field_count_list[2][]" id="field_count_list" value="'+field_count+'" />';
                html_inner_text +='<span id="para'+counterParatext+'">Text<span style="color:#F00">*</span></span>';
                html_inner_text +='<span class="val" id="para_req_'+counterParatext+'"></span>';
                html_inner_text +='</div>';
                html_inner_text +='<div class="col-sm-4">';
                html_inner_text +='<label for="paratext">';
                html_inner_text +='<textarea name="paratext[]" placeholder="text" data-required="true" rows="6" cols="50" class="form-control parsley-validated" id="paratext'+counterParatext+'"/></textarea>';
                html_inner_text +='</label>';
                html_inner_text +='</div>';
                html_inner_text +='<div class="col-sm-2 dynamic_dml">';
                html_inner_text +='<a href="javascript:void(0);" id="remScnt_paratext" class="btn btn-xs btn-primary"><i class="fa fa-times"></i></a>';
                html_inner_text +='</div>';
                html_inner_text +='</div>';
                html_inner_text +='</div>';
                html_inner_text +='</div>';
                
              $(html_inner_text).appendTo(scntDiv);
              i++;
              counterParatext++;
              field_count++;
          }
        }   
        else if(a == 3)
        {
          var scntDiv = $('#form');
          var i = $('#filediv').size();
          if($('#file'+counterFile).length == 1)
          {
            for (j = 1; j > 0; j++)
            {
              if ($('#file'+counterFile).length == 1)
                counterFile++;
              else
                break;
            }
          } 
          if ($('#file'+counterFile).length != 1)
          {
            
            
            var html_inner = '';
                html_inner +='<div class="row dataTables_filter" id="filediv">';
                html_inner +='<div class="row margin_tab">';
                html_inner +='<div class="col-lg-12">';
                html_inner +='<div class="col-sm-2">';
                html_inner +='<input type="hidden" name="field_count_list[3][]" id="field_count_list" value="'+field_count+'"/>';
                html_inner +='<span id="file_'+counterFile+'">Image</span><span style="color:#F00">*</span>';
                html_inner +='<span class="val" id="file_req_'+counterFile+'"></span>';
                html_inner +='</div>';
                html_inner +='<div class="col-sm-2">';
                html_inner +='<div class="browse_btn">';
                html_inner +='<div class="file_input_div">';
                html_inner +='<input type="button" value="Browse" class="file_input_button"  />';
                html_inner +='<input type="file" class="file_input_hidden parsley-validated form-control file_type" data-required="true" data-parsley-group="block1" name="file_name[]" data-error-container="#image_error_msg_'+counterFile+'" id="file'+counterFile+'" onchange="showimagepreview2(this,'+counterFile+')"/>';
                html_inner +='</div>';
                html_inner +='</div>';
                html_inner +='<div id="image_error_msg_'+counterFile+'"></div>';
                html_inner +='</div>';   
                html_inner +='<div class="col-sm-2">';
                html_inner +='<img id="image_preview_'+counterFile+'" title="Image" class="img-responsive" src="<?=$this->config->item('image_path')."/no_image.jpg" ?>" style="display:none; width:80px !important;height:80px !important"/>';
                html_inner +='</div>';
                html_inner +='<div class="col-sm-1 dynamic_dml">';
                html_inner +='<a href="javascript:void(0);" id="remScnt_file" class="btn btn-xs btn-primary"><i class="fa fa-times"></i></a>';
                html_inner +='</div>';
                html_inner +='</div>';
                html_inner +='</div>';
                html_inner +='</div>';
                
                $(html_inner).appendTo(scntDiv);
            i++;
            counterFile++;
            field_count++;
            
          }
        }
        
         $("#<?php echo $viewname;?>").parsley().destroy();
         $("#<?php echo $viewname;?>").parsley();
    }
  }
  return false;
}

$('body').on('click', '#remScnt_url', function(){
  var i = $('#urldiv').size();
    if( i > 0 ) {
      $(this).parents('#urldiv').remove();
      i--;
      $("#<?php echo $viewname;?>").parsley().destroy();
      $("#<?php echo $viewname;?>").parsley();
    }
    return false;
});

$('body').on('click', '#remScnt_paratext', function(){
  var i = $('#paratextdiv').size();
    if( i > 0 ) {
        $(this).parents('#paratextdiv').remove();
        i--;
      $("#<?php echo $viewname;?>").parsley().destroy();
      $("#<?php echo $viewname;?>").parsley();
    }
    return false;
});

$('body').on('click', '#remScnt_file', function(){
  var i = $('#filediv').size();
    if( i > 0 ) {
        $(this).parents('#filediv').remove();
        i--;
        $("#<?php echo $viewname;?>").parsley().destroy();
      $("#<?php echo $viewname;?>").parsley();
    }
    return false;
});

// DELETE URL,TEXT AND IMAGES START
function delete_field_details(id,type,div_id)
{ 
  
  if(id != '')
  {
    if(type == '1')
      var msg = 'URL';
    else if(type == '2')
      var msg = 'Text';
    else if(type == '3')
      var msg = 'Image';

    $.confirm({
    'title': 'DELETE','message': "<strong> Are you sure want to delete " + msg + "?",'buttons': {'Yes': {'class': '',
    'action': function(){
        $.ajax({
            type  : "POST",
            url   : "<?php echo $this->config->item('admin_base_url').$viewname.'/delete_record';?>",
            data  : {
              result_type:'ajax','id':id,'type':type
            },
            success : function(html){
              
              if(type == '1')
                $('#urldiv'+div_id).remove();
              else if(type == '2')
                $('#paratextdiv'+div_id).remove();
              else if(type == '3')
                $('#filediv'+div_id).remove();
            }
          });
          return false;
        }},'No' : {'class'  : ''}}});
  }
}
// END
//image upload
function showimagepreview2(input,id) 
{
  //console.log(input.files[0]['id']);return false;
  /*alert(id);
  return false;*/
 
    var arr1 = input.files[0]['name'].split('.');
    var arr= arr1[arr1.length - 1].toLowerCase(); 
    if(arr == 'jpg' || arr == 'jpeg' || arr == 'png')
    {
        
//                var maximum = input.files[0].size/1024;
//  
//            if (input.files && input.files[0] && maximum <= 5012) 
//            { 
                var filerdr = new FileReader();
                filerdr.onload = function(e) {
                $('#image_preview_'+id).attr('src', e.target.result);
                $('#image_preview_'+id).show();

                }
                filerdr.readAsDataURL(input.files[0]);
//            }else
//            {
//              $.confirm({'title': 'Alert','message': " <strong> Maximum upload size 5 MB "+"<strong></strong>",'buttons': {'ok' : {'class'  : 'btn_center alert_ok'}}});
//                return false;
//            }
    }
    else
    {
      $.confirm({
          'title': 'CONFIRM','message': " <strong> Please upload jpg | jpeg | png file only </strong>",
          'buttons': {
            'Ok': {'class': 'btn_center alert_ok',  
                'action': function(){
                  $("#file"+id).val('');
                  }}
           }
      });
      return false;
    } 
  
  
}

$(document).ready(function () {
    display_autocomlete("0");
});

function display_autocomlete(id)
{
    //location google map autocomplete
    var input = document.getElementById("location");
    var options = {types: ['geocode']};
    var autocomplete = new google.maps.places.Autocomplete(input, options);

    var searchBox = new google.maps.places.SearchBox(input);

    google.maps.event.addListener(searchBox, 'places_changed', function () {
        var place = searchBox.getPlaces();
        var latlng = place[0].geometry.location;

        ///////////////

        var componentForm = {locality: 'long_name', postal_code: 'short_name'}

        //var componentForm = { street_number: 'short_name', route: 'long_name', locality: 'long_name', administrative_area_level_1: 'short_name', country: 'long_name', postal_code: 'short_name' }; 

        var new_location_name = '';
        var address_details = {};

        if (place)
        {
            for (var i = 0; i < place[0].address_components.length; i++)
            {
                var addressType = place[0].address_components[i].types[0];
                var val = place[0].address_components[i][componentForm[addressType]]

                address_details[addressType] = val;
            }

//            if (address_details['postal_code'])
//            {
//                var postal_code = address_details['postal_code'];
//                //$("#postcode_"+id).val(postal_code);
//            }
//            if (address_details['locality'])
//            {
//                var locality = address_details['locality'];
//                //$("#target_cities_"+id).val(locality);
//            }

        }
    });

    //////////////////////
}
</script>