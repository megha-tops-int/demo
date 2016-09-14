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

$head_title = 'About Us';
$sub_title = 'About Us';
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
                        <h3><i class="webnav aboutus"></i><?= $is_edit . " " . $sub_title; ?></h3>
                        <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)" title="Back">Back</a> 
                    </div>
                    <div class="portlet-content">
                        <div class="col-sm-8">
                            <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url') ?><?php echo $path ?>" >
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('pillar_name') ?><span style="color:#F00">*</span></label>
                                    <input id="pillar_name" name="pillar_name" placeholder="Pillar name" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['pillar_name']) ? htmlentities($editRecord[0]['pillar_name']) : ''; ?>" data-required="true" <?php if(empty($editRecord)) { ?>onkeyup="create_slug(this.value);" <?php } ?>autocomplete="off">
                                </div>
                                
<!--                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('pillar_slug') ?><?=!empty($edit_data)?'':'<span style="color:#F00">*</span>';?></label>
                                    <?php if(!empty($editRecord)) { ?>
                                    <br><label><?= !empty($editRecord[0]['slug']) ? htmlentities($editRecord[0]['slug']) : ''; ?></label>
                                    <?php } else { ?>
                                    <input id="slug" name="slug" placeholder="Page slug" class="form-control parsley-validated" type="text" data-required="required" value="<?= !empty($editRecord[0]['slug']) ? htmlentities($editRecord[0]['slug']) : ''; ?>" data-required="true" onkeyup="create_slug(this.value);" >
                                    <?php } ?>
                                </div>-->
                                
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
                                <div class="add_field_div">
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
                            <span id="url_<?php echo $i ?>">URL<span style="color:#F00">*</span></span> <span class="val" id="url_req_<?php echo $i ?>"></span> </div>
                          <div class="col-sm-4">
                            <label for="url">
                              <input  type="text" data-type="map_url" data-parsley-type="map_url" data-required="true" placeholder="Youtube video URL" class="form-control parsley-validated" data-parsley-group="block1" name="url[]" id="url<?php echo $i ?>" value="<?php echo !empty($fields_data[$i]['field_value'])?$fields_data[$i]['field_value']:''; ?>"/>
                            </label>
                          </div>
                          <div class="col-sm-2 dynamic_dml"> <a title="Delete URL" class="btn btn-xs btn-primary edit_url" onclick="return delete_field_details('<?=!empty($fields_data[$i]['id'])?$fields_data[$i]['id']:''?>','1','<?= $i ?>');"> <i class="fa fa-times"></i> </a> 
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
                            <span id="para<?php echo $i ?>">Text<span style="color:#F00">*</span></span> <span class="val" id="para_req_<?php echo $i ?>"></span> </div>
                          <div class="col-sm-4">
                            <label for="paratext">
                                <textarea name="paratext[]" data-required="true" placeholder="text" class="form-control parsley-validated" id="paratext<?php echo $i ?>"/><?php echo !empty($fields_data[$i]['field_value'])?$fields_data[$i]['field_value']:''; ?></textarea>
                            </label>
                          </div>
                          <div class="col-sm-2 dynamic_dml"> <a href="javascript:void(0);" title="Delete text" class="btn btn-xs btn-primary" onclick="return delete_field_details('<?=!empty($fields_data[$i]['id'])?$fields_data[$i]['id']:''?>','2','<?= $i ?>');"> <i class="fa fa-times"></i> </a> </div>
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
                            <span id="file_<?php echo $i ?>">Image<span style="color:#F00">*</span></span> <span class="val" id="file_req_<?php echo $i ?>"></span> </div>
                          <div class="col-sm-2">
                            <div class="browse_btn">
                                     <div class="file_input_div">
                                         <input type="button" value="Browse" class="file_input_button"  />   
                              <input type="file" class="form-control file_type file_input_hidden" data-parsley-group="block1" name="file_name[]" id="file<?php echo $i ?>"  onchange="showimagepreview2(this,<?php echo $i ?>)"/>
                              
                                     </div>
                                </div>
                           
                          </div>
                          <div class="col-sm-2">
                            <?php 
                                        if(!empty($fields_data[$i]['field_value']) && file_exists($this->config->item('about_fields_img_small_path').$fields_data[$i]['field_value'])) {
                                      ?>
                            <img  id='image_preview_<?=$i?>'  title="image" class="img-responsive" src="<?php echo $this->config->item('about_fields_small_img_url').$fields_data[$i]['field_value']?>"  style="width:80px !important;height:80px !important" />
                            <?php }else{ ?>
                            <img  id='image_preview_<?=$i?>'  title="image" class="img-responsive" src="<?php echo $this->config->item('image_path')."/no_image.jpg" ?>" style="width:80px !important;height:80px !important"/>
                            <?php } ?>
                            <input type="hidden" name="fieldoldfile[]" id="fieldoldfile" value="<?=(!empty($fields_data[$i]['field_value'])?$fields_data[$i]['field_value']:'');?>" />
                          </div>
                          <div class="col-sm-1 dynamic_dml"> <a href="javascript:void(0);" title="Delete image" class="btn btn-xs btn-primary" onclick="return delete_field_details('<?=!empty($fields_data[$i]['id'])?$fields_data[$i]['id']:''?>','3','<?= $i ?>');"> <i class="fa fa-times"></i> </a> </a> </div>
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
                                 </div>
                                <div class="form-group addsavebtn">
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
                var html_inner_html ='';
              //alert($(this).parents("#namediv").children().first().attr("id"));
              html_inner_html +='<div class="row dataTables_filter" id="urldiv">';
              html_inner_html +='<div class="row margin_tab">';
              html_inner_html +='<div class="col-lg-12">';
              html_inner_html +='<div class="col-sm-2">';
              html_inner_html +='<input type="hidden" name="field_count_list[1][]" id="field_count_list" value="'+field_count+'" />';
              html_inner_html +='<span id="url_'+counterFName+'">URL<span style="color:#F00">*</span></span>';
              html_inner_html +='<span class="val" id="url_req_'+counterFName+'"></span>';
              html_inner_html +='</div>';
              html_inner_html +='<div class="col-sm-4">';
              html_inner_html +='<label for="url">';
              html_inner_html +='<input type="text" data-type="map_url" data-parsley-type="map_url" placeholder="Youtube video URL" data-required="true" class="form-control parsley-validated" data-parsley-group="block1" name="url[]" id="url'+counterFName+'" />';
              html_inner_html +='</label>';
              html_inner_html +='</div>';
              html_inner_html +='<div class="col-sm-2 dynamic_dml">';
              html_inner_html +='<a href="javascript:void(0);"  id="remScnt_url" class="btn btn-xs btn-primary">';
              html_inner_html +='<i class="fa fa-times"></i></a>';
              html_inner_html +='</div>';
              html_inner_html +='</div>';
              html_inner_html +='</div>';
              $(html_inner_html).appendTo(scntDiv);
              
              
              
               
                i++;
                counterFName++;
                field_count++;

                $("#<?php echo $viewname;?>").parsley().destroy();
                $("#<?php echo $viewname;?>").parsley();
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
                 var html_inner_text ='';
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
                   html_inner_text +='<a href="javascript:void(0);" id="remScnt_paratext" class="btn btn-xs btn-primary">';
                   html_inner_text +='<i class="fa fa-times"></i>';
                   html_inner_text +='</a>';
                   html_inner_text +='</div>';
                   html_inner_text +='</div>';
                   html_inner_text +='</div>';
                   html_inner_text +='</div>';
                
                    $(html_inner_text).appendTo(scntDiv);
                 
                
                i++;
                counterParatext++;
                field_count++;
                $("#<?php echo $viewname;?>").parsley().destroy();
                $("#<?php echo $viewname;?>").parsley();
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
                
                var html_inner_image = '';
                    html_inner_image +='<div class="row dataTables_filter" id="filediv">';
                    html_inner_image +='<div class="row margin_tab">';
                    html_inner_image +='<div class="col-lg-12">';
                    html_inner_image +='<div class="col-sm-2">';
                    html_inner_image +='<input type="hidden" name="field_count_list[3][]" id="field_count_list" value="'+field_count+'" />';
                    html_inner_image +='<span id="file_'+counterFile+'">Image<span style="color:#F00">*</span></span>';
                    html_inner_image +='<span class="val" id="file_req_'+counterFile+'"></span>';
                    html_inner_image +='</div>';
                    html_inner_image +='<div class="col-sm-2">';
                    html_inner_image +='<div class="browse_btn">';
                    html_inner_image +='<div class="file_input_div">';
                    html_inner_image +='<input type="button" value="Browse" class="file_input_button"  />';
                    html_inner_image +='<input type="file" class="file_input_hidden form-control file_type" data-required="true" data-parsley-group="block1" name="file_name[]" id="file'+counterFile+'" data-error-container="#image_error_msg_'+counterFile+'" onchange="showimagepreview2(this,'+counterFile+')"/>';
                    html_inner_image +='</div>';
                    html_inner_image +='</div>';
                    html_inner_image +='<div id="image_error_msg_'+counterFile+'"></div>';
                    html_inner_image +='</div>';
                    
                    html_inner_image +='<div class="col-sm-2">';
                    html_inner_image +='<img id="image_preview_'+counterFile+'" title="Image" class="img-responsive" src="<?=$this->config->item('image_path')."/no_image.jpg" ?>" style="display: none; width:80px !important;height:80px !important"/>';
                    html_inner_image +='</div>';
                    html_inner_image +='<div class="col-sm-1 dynamic_dml">';
                    html_inner_image +='<a href="javascript:void(0);" id="remScnt_file" class="btn btn-xs btn-primary"><i class="fa fa-times"></i></a>';
                    html_inner_image +='</div>';
                    html_inner_image +='</div>';
                    html_inner_image +='</div>';
                    html_inner_image +='</div>';
                    
                    $(html_inner_image).appendTo(scntDiv);
              i++;
              counterFile++;
              field_count++;
              $("#<?php echo $viewname;?>").parsley().destroy();
                $("#<?php echo $viewname;?>").parsley();
            }
          }
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
    'title': 'DELETE','message': "<strong> Are you sure want to delete " + msg + " ?",'buttons': {'Yes': {'class': '',
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
        $('#<?php echo $viewname ?>').parsley().validate();
        var messageLength = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
        
        if( !messageLength ) 
        {
            $.confirm({'title': 'Warning','message': " <strong> Please enter full description."+"<strong></strong>",'buttons': {'ok' : {'class'  : 'btn_center alert_ok'}}});
            return false;
        }

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
    function cleare_data()
    {
        $("#<?php echo $viewname; ?>").parsley().destroy();
        $("#<?php echo $viewname; ?>").parsley();
    }
    function showimagepreview2(input,id) 
{
  //console.log(input.files[0]['id']);return false;
  /*alert(id);
  return false;*/
  
    var arr1 = input.files[0]['name'].split('.');
    var arr= arr1[arr1.length - 1].toLowerCase(); 
    if(arr == 'jpg' || arr == 'jpeg' || arr == 'png')
    {
//      var maximum = input.files[0].size/1024;
//  //alert(maximum);
//  if (input.files && input.files[0] && maximum <= 5012) 
//  {
            
       var filerdr = new FileReader();
      filerdr.onload = function(e) {
      $('#image_preview_'+id).attr('src', e.target.result);
      $('#image_preview_'+id).show();
          
      }
      filerdr.readAsDataURL(input.files[0]);
//      }
//  else
//  {
//    $.confirm({'title': 'Alert','message': " <strong> Maximum upload size 5 MB "+"<strong></strong>",'buttons': {'ok' : {'class'  : 'btn_center alert_ok'}}});
//      return false;
//  }
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

</script>