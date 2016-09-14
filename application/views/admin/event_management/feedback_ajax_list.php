<?php
/*
  @Description: Tips Module
  @Author: Parag Joshi
  @Date: 25-02-2016
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<?php
$viewname = $this->router->uri->segments[2];
$event_id = $this->router->uri->segments[4];
$path_comman_delete = $this->config->item('admin_base_url') . $viewname . '/';
$path_comman = $this->config->item('admin_base_url').$viewname.'/feedback/'.$event_id.'/';
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
<th width="27%" data-direction="desc" data-sortable="true" data-filterable="true" <?php if (isset($sortfield) && $sortfield == 'first_name') {
    if ($sortby == 'asc') {
        echo "class = 'sorting_desc'";
    } else {
        echo "class = 'sorting_asc'";
    }
} ?> role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column ascending"><a href="javascript:void(0);" onclick="applysortfilte_contact('first_name', '<?php echo $sorttypepass; ?>', '<?= $path_comman ?>')">
    <?= $this->lang->line('common_label_first_name') ?>
    </a></th>
    
<th width="27%" data-direction="desc" data-sortable="true" data-filterable="true" <?php if (isset($sortfield) && $sortfield == 'last_name') {
    if ($sortby == 'asc') {
        echo "class = 'sorting_desc'";
    } else {
        echo "class = 'sorting_asc'";
    }
} ?> role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column ascending"><a href="javascript:void(0);" onclick="applysortfilte_contact('last_name', '<?php echo $sorttypepass; ?>', '<?= $path_comman ?>')">
    <?= $this->lang->line('common_label_last_name') ?>
    </a></th>
  
  <th width="33%" data-direction="desc" data-sortable="true" data-filterable="true" <?php if (isset($sortfield) && $sortfield == 'email') {
    if ($sortby == 'asc') {
        echo "class = 'sorting_desc'";
    } else {
        echo "class = 'sorting_asc'";
    }
} ?> role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column ascending"><a href="javascript:void(0);" onclick="applysortfilte_contact('email', '<?php echo $sorttypepass; ?>', '<?= $path_comman ?>')">
    <?= $this->lang->line('common_label_email') ?>
    </a></th>

<th width="13%" class="hidden-xs hidden-sm sorting_disabled" data-filterable="true" role="columnheader" rowspan="1" colspan="1" aria-label="CSS grade"><?php echo $this->lang->line('common_label_action') ?></th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
if (!empty($datalist) && count($datalist) > 0) {
//pr($datalist);
    $i = !empty($this->router->uri->segments[4]) ? $this->router->uri->segments[4] + 1 : 1;
    foreach ($datalist as $row) {
        ?>
            <tr <? if ($i % 2 == 1) { ?>class="bgtitle" <? } ?> >
                <td class="text-center">
                    <div class="" style="position: relative;">
                        <input type="checkbox" class="checkbox1" name="check[]" value="<?php echo $row['id'] ?>">
                    </div></td>
                <td class="hidden-xs hidden-sm "><?=!empty($row['first_name'])?$row['first_name']:'';?></td>
                <td class="hidden-xs hidden-sm "><?=!empty($row['last_name'])?$row['last_name']:'';?></td>
                <td class="hidden-xs hidden-sm "><?=!empty($row['email'])?$row['email']:'';?></td>
                <td class="hidden-xs hidden-sm text-left">
                    <?php /* if (!empty($row['status']) && $row['status'] == 1) { ?>
                      <a class="btn btn-xs btn-publish" title="<?php echo $this->lang->line('unpublish_record'); ?>" href="javascript:void(0)" onclick="return status_change('0',<?= $row['id'] ?>,'<?=$path_comman?>')"><i class="fa fa-check"></i>
                      </a>
                    <? } else{ ?>
                        <a class="btn btn-xs btn-unpublish" title="<?php echo $this->lang->line('publish_record'); ?>" href="javascript:void(0)" onclick="return status_change('1',<?= $row['id'] ?>,'<?=$path_comman?>')"> 
                            <i class="fa fa-ban"></i>
                       </a>
                    <? } */ ?>
                    <a class="btn btn-xs btn-success" href="<?= $this->config->item('admin_base_url') . $viewname; ?>/view_record_feedback/<?= $row['id'] ?>" title="View record"><i class="fa fa-eye"></i></a>
                    
                    <button class="btn btn-xs btn-primary" title="<?php echo $this->lang->line('delete_record'); ?>"  onclick="delete_feedback('<?php echo $row['id'] ?>', '<?=!empty($row['first_name'])?rawurlencode(ucfirst(strtolower($row['first_name']))):'';?>', '<?= $path_comman_delete ?>', '<?php echo $event_id ?>');"> <i class="fa fa-times"></i> </button>
                    
                    
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
