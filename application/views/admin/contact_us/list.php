<?php 
    /*
        @Description: Tips Management
        @Author: Parag Joshi
        @Date: 25-02-2016
    */
	
if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script language="javascript">
$.blockUI({ message: '<?='<img src="'.base_url('images').'/ajaxloader.gif" border="0" align="absmiddle"/>'?> Please Wait...'});
$(document).ready(function(){
	$.unblockUI();
});
</script>
<?php
$viewname = $this->router->uri->segments[2];
$path_comman = $this->config->item('admin_base_url').$viewname.'/';
$admin_session = $this->session->userdata('junction_studio_admin_session');
$head_title = 'Contact Us';
$sub_title = 'Contact';
?>

<div id="content">
  <div id="content-header">
    <h1>
       <?=$head_title?>
    </h1>
  </div>
  <div id="content-container">
    <div class="row">
      <div class="col-md-12">
        <div class="portlet">
          <div class="portlet-header">
            <h3> <i class="fa fa-send-o"></i>
              <?=$head_title?>
            </h3>
          </div>
          <!-- /.portlet-header -->
          
          <div class="portlet-content">
            <div class="table-responsive">
              <div role="grid" class="dataTables_wrapper" id="DataTables_Table_0_wrapper">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div id="DataTables_Table_0_length" class="dataTables_length">
                      <label>
                        <select class="selec" name="DataTables_Table_0_length" size="1" aria-controls="DataTables_Table_0" onchange="changepages('<?=$path_comman?>');" id="perpage">
                          <option value="">Rows</option>
                          <option <?php if(!empty($perpage) && $perpage == 10){ echo 'selected="selected"';}?> value="10">10</option>
                          <option <?php if(!empty($perpage) && $perpage == 25){ echo 'selected="selected"';}?> value="25">25</option>
                          <option <?php if(!empty($perpage) && $perpage == 50){ echo 'selected="selected"';}?> value="50">50</option>
                          <option <?php if(!empty($perpage) && $perpage == 100){ echo 'selected="selected"';}?> value="100">100</option>
                        </select>
                      </label>
                    </div>
                      <div id="DataTables_Table_0_length" class="dataTables_length">
                      <select class="selec" name="DataTables_Table_0_length" size="1" aria-controls="DataTables_Table_0" id="delete_all">
                        <option value="">Select</option>
                        <option value="delete">Delete</option>
<!--                        <option value="publish">Publish</option>
                        <option value="unpublish">Unpublish</option>-->
                      </select>
                    </div>
                    <div class="dataTables_length" >
                            <select  name="type" id="type"  class="form-control parsley-validated" >
                                <option value="">Select Type</option>
                                <option value="1" <?php if(!empty($type) && $type == 1) echo "selected"; ?>>Event</option>
                                <option value="2" <?php if(!empty($type) && $type == 2) echo "selected"; ?>>Project</option>
                                <option value="3" <?php if(!empty($type) && $type == 3) echo "selected"; ?>>Others</option>
                            </select>
                        </div>
                  </div>
                  
                 <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                  <div class="dataTables_filter" id="DataTables_Table_0_filter">
                      <label>
                        <input class="" type="hidden" name="uri_segment" id="uri_segment" value="<?=!empty($uri_segment)?$uri_segment:'0'?>">
                        <input type="text" name="searchtext" id="searchtext" aria-controls="DataTables_Table_0" placeholder="Search first name, last name,email..." title="Search first name, last name, email..." value="<?=!empty($searchtext)?$searchtext:''?>">
                        <button onclick="search_data('changesearch','<?=$path_comman?>')" class="btn btn-success howler"  title="<?php echo $this->lang->line('search_record');?>">Search </button>
                        <button class="btn btn-success howler flt" title="<?php echo $this->lang->line('view_all');?>" onclick="clearfilter_data('<?=$path_comman?>')">
                        View all
                        </button>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row dt-rt">
                    <div class="col-sm-1">&nbsp;
                    <button class="btn btn-danger howler" id="allcheck" data-type="danger" title="<?php echo $this->lang->line('submit_operation');?>">Submit</button>
                    <?php /*<button class="btn btn-danger howler" data-type="danger" title="Delete <?=$this->lang->line('admin_short')?>" onclick="deletepopup1('0');">Delete
                    <?=$this->lang->line('admin_short')?>
                    </button> */ ?>
                  </div>
                  <div class="col-sm-9">
                    

                        <div class="col-sm-12 text-center" id="div_msg">
                            <?php if(!empty($msg)){?>
                            <?php echo '<label class="error-list-color">'.urldecode ($msg).'</label>';
                            ?>
                            <?php } ?>
                        </div>

                    
                  </div>
                  <div class="col-sm-2"> 
<!--                      <a class="btn  pull-right btn-success howler" title="<?//=$this->lang->line('add_record')?>" href="<?//=base_url('admin/'.$viewname.'/add_record');?>">Add new <?//=  strtolower($sub_title);?>
                    </a> -->
                  </div>
                </div>
                <div id="common_div">
                  <?=$this->load->view('admin/'.$viewname.'/ajax_list')?>
                </div>
              </div>
            </div>
            <!-- /.table-responsive --> 
            
          </div>
          <!-- /.portlet-content --> 
          
        </div>
      </div>
    </div>
  </div>
  <!-- #content-header --> 
  
  <!-- /#content-container --> 
  
</div>
<!-- #content --> 
<script>
	        
    $(document).ready(function(){
           $('#searchtext').keyup(function(event) 
           {
           if (event.keyCode == 13) {
                search_data('changesearch','<?=$path_comman?>');
                   }
           });
          $("#div_msg").css('display','block'); 

           setTimeout(function() {
                   $('#div_msg').fadeOut('slow');
               }, 3000);

           });
	//$("#common_tb a.paginclass_A").click(function() {
        $('body').on('click','#common_tb a.paginclass_A',function(e){
		    $.ajax({
                type: "POST",
                url: $(this).attr('href'),
				data: {
                result_type:'ajax',searchreport:$("#searchreport").val(),perpage:$("#perpage").val(),searchtext:$("#searchtext").val(),sortfield:$("#sortfield").val(),sortby:$("#sortby").val()
            },
			beforeSend: function() {
						$.blockUI({ message: '<?='<img src="'.base_url('images').'/ajaxloader.gif" border="0" align="absmiddle"/>'?> Please Wait...'});
					  },
                success: function(html){
                   
                    $("#common_div").html(html);
					$.unblockUI();
                }
            });
            return false;

        });
	$('body').on('click','#selecctall',function(e){
		 if(this.checked) { // check select status
			 $('.checkbox1').each(function() { //loop through each checkbox
					this.checked = true;  //select all checkboxes with class "checkbox1"              
				});
			}else{
				$('.checkbox1').each(function() { //loop through each checkbox
					this.checked = false; //deselect all checkboxes with class "checkbox1"                      
				});        
			}
		});
		
	 $('#allcheck').click(function(){
	    var val=$('#delete_all').val();
		if(val != '')
    	{
    		delete_all_multipal(val,'<?=$path_comman?>');	
    	}
    	else
    	{
    		$.confirm({'title': 'Alert','message': " <strong> Please select atleast one Oparation (Delete / Publish / Unpublish) "+"<strong></strong>",'buttons': {'ok' : {'class'  : 'btn_center'}}});
    	}    
	});
       </script>
<!--Common JS Function Include       -->
<script type="text/javascript" src="<?=$this->config->item('js_path')?>common_new.js"></script>