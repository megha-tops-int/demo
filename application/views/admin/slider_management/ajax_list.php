<?php
/*
  @Description: Tips Module
  @Author: Parag Joshi
  @Date: 15-02-2016
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<?php
$viewname = $this->router->uri->segments[2];
$path_comman = $this->config->item('admin_base_url') . $viewname . '/';
$admin_session = $this->session->userdata('junction_studio_admin_session');
?>
<?php if (isset($sortby) && $sortby == 'asc') {
    $sorttypepass = 'desc';
} else {
    $sorttypepass = 'asc';
} ?>

<table class="table table-striped table-bordered table-hover table-highlight table-checkable dataTable-helper dataTable datatable-columnfilter" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
    <thead>
        <tr role="row">
            <th  width="5%" class="sorting_disabled text-center" role="columnheader" rowspan="1" colspan="1" aria-label=""> <div class="">
        <input type="checkbox" class="selecctall" id="selecctall">
    </div>
</th>
<th data-direction="desc" data-sortable="true" data-filterable="true" <?php if (isset($sortfield) && $sortfield == 'title') {
    if ($sortby == 'asc') {
        echo "class = 'sorting_desc'";
    } else {
        echo "class = 'sorting_asc'";
    }
} ?> role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column ascending"><a href="javascript:void(0);" onclick="applysortfilte_contact('title', '<?php echo $sorttypepass; ?>', '<?= $path_comman ?>')">
    <?= $this->lang->line('common_label_title') ?>
    </a></th>

    
    <th data-direction="desc" data-sortable="true" data-filterable="true" <?php if (isset($sortfield) && $sortfield == 'type') {
    if ($sortby == 'asc') {
        echo "class = 'sorting_desc'";
    } else {
        echo "class = 'sorting_asc'";
    }
} ?> role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column ascending"><a href="javascript:void(0);" onclick="applysortfilte_contact('type', '<?php echo $sorttypepass; ?>', '<?= $path_comman ?>')">
    <?php echo $this->lang->line('slider_type');?>
    </a></th>

<th data-direction="desc" data-sortable="true" data-filterable="true" <?php if (isset($sortfield) && $sortfield == 'field_value') {
    if ($sortby == 'asc') {
        echo "class = 'sorting_desc'";
    } else {
        echo "class = 'sorting_asc'";
    }
} ?> role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column ascending"><a href="javascript:void(0);" onclick="applysortfilte_contact('field_value', '<?php echo $sorttypepass; ?>', '<?= $path_comman ?>')">
   Image / video 
    </a></th>
    
  

<th width="13%" class="hidden-xs hidden-sm sorting_disabled" data-filterable="true" role="columnheader" rowspan="1" colspan="1" aria-label="CSS grade"><?php echo $this->lang->line('common_label_action') ?></th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
if (!empty($datalist) && count($datalist) > 0) {

    $i = !empty($this->router->uri->segments[4]) ? $this->router->uri->segments[4] + 1 : 1;
    foreach ($datalist as $row) {
        ?>
            <tr <? if ($i % 2 == 1) { ?>class="bgtitle" <? } ?> >
                <td class="text-center">
                    <div class="" style="position: relative;">
                        <input type="checkbox" class="checkbox1" name="check[]" value="<?php echo $row['id'] ?>">
                    </div></td>
                <td class="hidden-xs hidden-sm "><?=!empty($row['title'])?$row['title']:'';?></td>
                <td class="hidden-xs hidden-sm ">
                        <?=!empty($row['type']) && $row['type'] == 1 ?'Image':''?>
                        <?=!empty($row['type']) && $row['type'] == 2 ?'Video':''?>
                </td>
                <td class="hidden-xs hidden-sm ">
                    <?php 
                    if($row['type'] && $row['type'] == 1)
                    { 
                        
                    if(!empty($row['field_value']) && file_exists($this->config->item('slider_img_big_path').$row['field_value']))
                    {
                         $path = $this->config->item('slider_big_img_url').$row['field_value'];
                    }
                    else
                    {
                        $path = base_url('images/no_image.jpg');
                    } ?>
                    
                    <a target="_blank" title="Youtube video" href="<?=$path?>">
                        <img title="Image" src='<?= !empty($row['field_value'])?file_exists($this->config->item('slider_img_small_path').$row['field_value'])?$this->config->item('slider_small_img_url').$row['field_value']:base_url('images/no_image.jpg'):base_url('images/no_image.jpg')?>' width='50' height='50'>
                        </a>
                        <?php 
                    }else if($row['type'] && $row['type'] == 2)
                    {
                        $url = $row['field_value'];
                        parse_str( parse_url( $url, PHP_URL_QUERY ));?>
                        <a target="_blank" title="Youtube video" href="<?=$url?>" >
                       <img src="http://img.youtube.com/vi/<?=$v?>/0.jpg" width='50' height='50'>
                        </a>
                         
                        
                    <?php }
                        ?>
                  
                </td>
                <td class="hidden-xs hidden-sm text-left">
                    <?php if (!empty($row['status']) && $row['status'] == 1) { ?>
                      <a class="btn btn-xs btn-publish" title="<?php echo $this->lang->line('unpublish_record'); ?>" href="javascript:void(0)" onclick="return status_change('0',<?= $row['id'] ?>,'<?=$path_comman?>')"><i class="fa fa-check"></i>
                      </a>
                    <? } else{ ?>
                        <a class="btn btn-xs btn-unpublish" title="<?php echo $this->lang->line('publish_record'); ?>" href="javascript:void(0)" onclick="return status_change('1',<?= $row['id'] ?>,'<?=$path_comman?>')"> 
                            <i class="fa fa-ban"></i>
                       </a>
                    <? } ?>
                    <a class="btn btn-xs btn-success" href="<?= $this->config->item('admin_base_url') . $viewname; ?>/edit_record/<?= $row['id'] ?>" title="<?php echo $this->lang->line('edit_record'); ?>"><i class="fa fa-pencil"></i></a>
                    
                    <button class="btn btn-xs btn-primary" title="<?php echo $this->lang->line('delete_record'); ?>"  onclick="deletepopup1('<?php echo $row['id'] ?>', '<?=!empty($row['title'])?rawurlencode(ucfirst(strtolower($row['title']))):'';?>', '<?= $path_comman ?>');"> <i class="fa fa-times"></i> </button>
                    
                    
                    <input type="hidden" id="sortfield" name="sortfield" value="<?php if (isset($sortfield)) echo $sortfield; ?>" />
                    <input type="hidden" id="sortby" name="sortby" value="<?php if (isset($sortby)) echo $sortby; ?>" /></td>
            </tr>
    <?php }
} else { ?>
        <tr>
            <td class="text-center" colspan="100%">
                <?=$this->lang->line('common_list_not_found');?>
            </td>
        </tr> 
<?php } ?>
</tbody>
</table>
<div class="row dt-rb">
    <div class="col-sm-6"> </div>
    <div class="col-sm-6">
        <div class="dataTables_paginate paging_bootstrap float-right" id="common_tb">
<?php
if (isset($pagination)) {
    echo $pagination;
}
?>
        </div>
    </div>
</div>
