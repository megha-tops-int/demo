<?php
/*
  @Description: Tips Module
  @Author: Kaushik Valiya
  @Date: 12-12-15
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
<!--            <th width="5%" class="sorting_disabled text-center" role="columnheader" rowspan="1" colspan="1" aria-label=""> <div class="">
        <input type="checkbox" class="selecctall" id="selecctall">
    </div>
</th>-->
<th width="18%" data-direction="desc" data-sortable="true" data-filterable="true" <?php if (isset($sortfield) && $sortfield == 'pillar_name') {
    if ($sortby == 'asc') {
        echo "class = 'sorting_desc'";
    } else {
        echo "class = 'sorting_asc'";
    }
} ?> role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column ascending"><a href="javascript:void(0);" onclick="applysortfilte_contact('pillar_name', '<?php echo $sorttypepass; ?>', '<?= $path_comman ?>')">
    <?= $this->lang->line('pillar_name') ?>
    </a></th>
    
<!--<th data-direction="desc" data-sortable="true" data-filterable="true" <?php if (isset($sortfield) && $sortfield == 'slug') {
    if ($sortby == 'asc') {
        echo "class = 'sorting_desc'";
    } else {
        echo "class = 'sorting_asc'";
    }
} ?> role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column ascending"><a href="javascript:void(0);" onclick="applysortfilte_contact('slug', '<?php echo $sorttypepass; ?>', '<?= $path_comman ?>')">
    <?= $this->lang->line('pillar_slug') ?>
    </a></th>-->

    <th width="55%" data-direction="desc" data-sortable="true" data-filterable="true" <?php if (isset($sortfield) && $sortfield == 'description') {
    if ($sortby == 'asc') {
        echo "class = 'sorting_desc'";
    } else {
        echo "class = 'sorting_asc'";
    }
} ?> role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column ascending"><a href="javascript:void(0);" onclick="applysortfilte_contact('description', '<?php echo $sorttypepass; ?>', '<?= $path_comman ?>')">
    <?= $this->lang->line('common_label_desc') ?>
    </a></th>

  <th width="17%" data-direction="desc" data-sortable="true" data-filterable="true" <?php if(isset($sortfield) && $sortfield == 'modified_date'){if($sortby == 'asc'){echo "class = 'sorting_desc'";}else{echo "class = 'sorting_asc'";}} ?> role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column ascending"><a href="javascript:void(0);" onclick="applysortfilte_contact('modified_date','<?php echo $sorttypepass;?>', '<?= $path_comman ?>')">
    <?php echo "Last modified";?>
    </a>
  </th>

<th width="10%" class="hidden-xs hidden-sm sorting_disabled" data-filterable="true" role="columnheader" rowspan="1" colspan="1" aria-label="CSS grade"><?php echo $this->lang->line('common_label_action') ?></th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
if (!empty($datalist) && count($datalist) > 0) {

    $i = !empty($this->router->uri->segments[4]) ? $this->router->uri->segments[4] + 1 : 1;
    foreach ($datalist as $row) {
        ?>
            <tr <? if ($i % 2 == 1) { ?>class="bgtitle" <? } ?> >
<!--                <td class="text-center">
                    <div class="" style="position: relative;">
                        <input type="checkbox" class="checkbox1" name="check[]" value="<?php //echo $row['id'] ?>">
                    </div></td>-->
                <td class="hidden-xs hidden-sm "><?=!empty($row['pillar_name'])?$row['pillar_name']:'';?></td>
                <!--<td class="hidden-xs hidden-sm "><?=!empty($row['slug'])?$row['slug']:'';?></td>-->
                <td class="hidden-xs hidden-sm " title="Description upto 160 characters">
                    <?php 
                        if(!empty($row['description']))
                          echo substr(strip_tags((trim($row['description']))),0,160)."...";
                        else
                          echo 'N/A';
                    ?>
                </td>
                <td class="hidden-xs hidden-sm "><?php echo  (empty($row['modified_date']) || $row['modified_date'] == '0000-00-00 00:00:00')?date(COMMAN_DATE_FORMATE_VIEW,strtotime($row['created_date'])) : date(COMMAN_DATE_FORMATE_VIEW,strtotime($row['modified_date'])); ?></td>
                <td class="hidden-xs hidden-sm text-left">
                    <?php /* if (!empty($row['status']) && $row['status'] == 1) { ?>
                      <a class="btn btn-xs btn-publish" title="<?php echo $this->lang->line('unpublish_record'); ?>" href="javascript:void(0)" onclick="return status_change('0',<?= $row['id'] ?>,'<?=$path_comman?>')"><i class="fa fa-check"></i>
                      </a>
                    <? } else{ ?>
                        <a class="btn btn-xs btn-unpublish" title="<?php echo $this->lang->line('publish_record'); ?>" href="javascript:void(0)" onclick="return status_change('1',<?= $row['id'] ?>,'<?=$path_comman?>')"> 
                            <i class="fa fa-ban"></i>
                       </a>
                    <? } */ ?>
                    <a class="btn btn-xs btn-success" href="<?= $this->config->item('admin_base_url') . $viewname; ?>/edit_record/<?= $row['id'] ?>" title="<?php echo $this->lang->line('edit_record'); ?>"><i class="fa fa-pencil"></i></a>
                    
                    <!--<button class="btn btn-xs btn-primary" title="<?php //echo $this->lang->line('delete_record'); ?>"  onclick="deletepopup1('<?php //echo $row['id'] ?>', '<?//=!empty($row['title'])?rawurlencode(ucfirst(strtolower($row['title']))):'';?>', '<?//= $path_comman ?>');"> <i class="fa fa-times"></i> </button>-->
                    
                    
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
