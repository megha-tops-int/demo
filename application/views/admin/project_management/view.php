<?php /*
  @Description: Admin Add
  @Author: Parag Joshi
  @Date: 13-02-2016

 */ ?>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<?php
$viewname = $this->router->uri->segments[2];
$event_id = $this->router->uri->segments[4];
$formAction = !empty($editRecord) ? 'update_data' : 'insert_data';
$path = $viewname . '/' . $formAction;
$is_edit = !empty($editRecord) ? "View" : "Add New";
$edit_data = !empty($editRecord) ? '1' : '';
$head_title_1 = 'Details';
$head_title = 'Project Management';
$sub_title = 'Project';

$previous = "javascript:history.go(-1)";
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>

<style>
div.dataTables_filter label {
    float: left !important;
}
</style>
<div id="content">
    <div id="content-header">
        <h1><?= $head_title ?></h1>
    </div>
    <div id="content-container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <div class="portlet-header">
                        <h3> <i class="fa fa-delicious"></i><?=$head_title_1?> - <?php echo !empty($editRecord[0]['project_title'])?$editRecord[0]['project_title']:'';?></h3>
                        <!--<a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)" title="Back">Back</a>--> 
                        <a class="btn btn-primary pull-right" href="<?php echo $previous;?>" title="Back">Back</a> 
                    </div>
                    <div class="portlet-content">
                        <div class="col-sm-12">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-2">
                                <a class="btn btn-primary howler" title="Details" href="<?= base_url('admin/' . $viewname . '/view_record') . '/' . $event_id; ?>">Details</a>
                            </div>
                            <div class="col-sm-6">
                                <a class="btn btn-default howler" title="Feedback" href="<?= base_url('admin/' . $viewname . '/feedback') . '/' . $event_id; ?>">Feedback</a> 
                            </div>
                        </div>
                        <div class="clear"><br><hr style="border: 1px solid #E0DFE3"></div>
                        <div class="col-sm-8">
                            <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url') ?><?php echo $path ?>" >
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('event_name') ?></label><br>
                                    <span><?= !empty($editRecord[0]['project_title']) ? htmlentities($editRecord[0]['project_title']) : ''; ?></span>
                                
                                </div>
                                <div class="form-group">
                                    <label for="select-multi-input">Project type</label><br>
                                    <span><?= !empty($editRecord[0]['project_type']) ? htmlentities($editRecord[0]['project_type']) : ''; ?></span>
                                 
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input">Date & time</label><br>
                                    <span><?php if (!empty($editRecord[0]['created_date']) && $editRecord[0]['created_date'] != '0000-00-00 00:00:00' && $editRecord[0]['created_date'] != '1970-01-01 00:00:00'){ echo date(COMMAN_DATE_FORMATE_VIEW, strtotime($editRecord[0]['created_date']));}?></span>
                                </div>
                                
                                <div class="form-group add_image_div">
                                    <label for="select-multi-input">Featured image</label>
                                   
                                    <p> <span class="txt">&nbsp;</span>
                                      <?php if(empty($editRecord)) { ?>
                                      <img id="uploadPreview1" class="noimage" src="<?=base_url('images/no_image.jpg')?>"  width="100%" />
                                      <?php } else { ?>
                                      <?php if(empty($editRecord[0]['image'])) { ?>
                                      <img id="uploadPreview1" src="<?=base_url('images/no_image.jpg')?>"  width="100%"  height="100%" />
                                      <?php } else { 
                                              //echo "em";
                                              if(!file_exists($this->config->item('project_img_big_path').$editRecord[0]['image'])){
                                                ?>
                                      <img id="uploadPreview1" class="noimage" src="<?=base_url('images/no_image.jpg')?>"  width="100%" />
                                      <?php }
                                            else
                                            { 
                                              ?>
                                      <img class="img-responsive" id="uploadPreview1" src="<?=$this->config->item('project_big_img_url').$editRecord[0]['image'] ?>" style="width:360px;"/>
                                      <?php } }  ?>
                                      <?php } ?>
                                      </p>
                                   
                                </div>
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('location') ?></label><br>
                                    <span><?= !empty($editRecord[0]['location']) ? htmlentities($editRecord[0]['location']) : ''; ?></span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="select-multi-input"><?= $this->lang->line('common_label_desc') ?></label><br>
                                    <spna><?= !empty($editRecord[0]['description']) ? $editRecord[0]['description'] : ''; ?></span>
                                   
                                </div>
                                
                                
                                
                                <div class="form-group add_field_div">
                                    <div class="custom_field">
                                        <div class="col-lg-12 col-md-12 col-xs-12 row">
                                        <label class="addfield">Fields</label>
                                         </div>
                                       
                                    </div>
                                
                                <?php
                                if(!empty($fields_data))
                                {
                                for ($i=0; $i < count($fields_data) ; $i++)
                                { 
                                    if($fields_data[$i]['field_type'] == '1')
                                    {
                                    ?>
                                        <div class="dataTables_filter">
                                        <div class="row margin_tab">
                                        <div class="col-lg-12">
                                            <div class="col-sm-1">
                                               <label>URL</label>
                                            </div>
                                           <div class="col-sm-2 dynamic_dml"> 
                                             
                                                <label for="url">
                                                     <?php 
                                                     $url = $fields_data[$i]['field_value'];
                                                    parse_str( parse_url( $url, PHP_URL_QUERY )); ?>
                                                    <a target="_blank" title="Youtube video" href="<?=$url?>" >
                                                   <img src="http://img.youtube.com/vi/<?=$v?>/0.jpg" width='50' height='50'>
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
                                        <div class="dataTables_filter">
                                        <div class="row margin_tab">
                                          <div class="col-lg-12">
                                                <div class="col-sm-1">
                                                    <label>Text</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <span>
                                                    <?php echo !empty($fields_data[$i]['field_value'])?$fields_data[$i]['field_value']:''; ?>
                                                    </span>
                                                </div>
                
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
                                                <div class="col-sm-1">
                                                    <label>Image</label> 
                                                </div>
                                                <div class="col-sm-3">
                                            <?php 
                                                    if(!empty($fields_data[$i]['field_value']) && file_exists($this->config->item('project_fields_img_small_path').$fields_data[$i]['field_value'])) {
                                                  ?>
                                            <img id='image_preview_<?=$i?>' title="Image" class="img-responsive" src="<?php echo $this->config->item('project_fields_small_img_url').$fields_data[$i]['field_value']?>"  style="width:80px !important;height:80px !important" />
                                            <?php }else{ ?>
                                            <img id='image_preview_<?=$i?>' title="Image" class="img-responsive" src="<?php echo $this->config->item('image_path')."/no_image.jpg" ?>" style="width:80px !important;height:80px !important"/>
                                            <?php } ?>
                                            <input type="hidden" name="fieldoldfile[]" id="fieldoldfile" value="<?=(!empty($fields_data[$i]['field_value'])?$fields_data[$i]['field_value']:'');?>" />
                                            </div>

                                            </div>
                                          </div>
                                    </div>
                                    <?php 
                                    }
                                 }
                                }
                                
                                ?>
                                
                               
                                </div>
                                
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
