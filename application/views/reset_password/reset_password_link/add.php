<?php
/*
    @Description: Template add/edit page
    @Author: Kaushik Valiya
    @Date: 17-09-2014

*/?>
<?php 
$viewname = $this->router->uri->segments[2];
$id = $this->router->uri->segments[3];

?>
<div id="content" class="content_nomar">
  <div id="content-header">
   <h1><?=$this->lang->line('reset_password');?></h1>
  </div>
  <div id="content-container" class="addnewcontact">
   <div class="">
    <div class="col-md-12">
	
     <div class="portlet portlet1">
      <div class="portlet-header">
       <h3> <i class="fa fa-tasks"></i> <?=$this->lang->line('reset_password');?> </h3>
       
	  </div>
    
      <div class="portlet-content">

<div class="tab-content" id="myTab1Content">
 
 <div class="tab-pane fade in active" id="home">
  
  <!--<form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname;?>" id="<?php echo $viewname;?>" method="" accept-charset="utf-8" action="<?php echo base_url();?><?php echo $viewname?>" >
-->  
<form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname;?>" id="<?php echo $viewname;?>" method="post" accept-charset="utf-8" action="<?php echo $this->config->item('base_url').'reset_password/change_password';?>" novalidate >
     <div class="col-sm-8">      
           <?php
                            $this->message_session = $this->session->userdata('message_session');
                        if (!empty($this->message_session['msg'])) { ?>
                            <div class="col-sm-12 text-center" id="div_msg">
                                <?php echo '<label class="error-list-color">' . urldecode($this->message_session['msg']) . '</label>';
                                $newdata = array('msg'  => '');
                                $this->session->set_userdata('message_session', $newdata);
                                ?> 
                            </div>
                        <?php } ?>
    </div>
<div class="row"> 

             <div class="col-sm-8">
     <div class="row">
          <div class="col-sm-12 form-group pull-center">
           <label for="validateSelect">New Password <span style="color:#F00" class="mandatory_field margin-left-5px">*</span></label>
           <input id="txt_npassword" data-minlength="6"  name="txt_npassword" class="form-control parsley-validated" type="password" data-required="true">
          </div>
          <div class="col-sm-12 form-group">
          <label for="validateSelect">Confirm Password <span style="color:#F00" class="mandatory_field margin-left-5px">*</span></label>
            <input id="txt_cpassword" data-minlength="6"  name="txt_cpassword" class="form-control parsley-validated" type="password" data-equalto="#txt_npassword" data-required="true">
              </div>
         <div class="col-sm-12 form-group" style="margin-top: 2%;">
             <input id="hiddan" name="id" type="hidden" value="<?=!empty($id)?$id:'';?>" >
             <button  type="submit" class="btn btn-secondary" >Save</button>
             <a  href="<?=base_url('admin');?>" class="btn btn-secondary" title="Click here to login"> Click here to login</a>
         </div>

             </div>
             </div>
     </div>
	
  
</form>
</div>
</div>

 </div>
    </div>
   </div>
  </div>
  
 </div>
<script type="text/javascript">

       $(document).ready(function() {
           $("#div_msg").fadeOut(4000);
       });


function reset_password()
{
	//alert("<?=base_url().'unsubscribe/'.$viewname?>/unsubscribe");
	var id = '<?php echo $this->uri->segment(4); ?>';
	var pass = $("#txt_npassword").val();
	//alert(pass);
	if($("#txt_npassword").val().trim() != '')
	{
		$.ajax({
			type: "POST",
			url: "<?=base_url().'reset_password/'.$viewname?>/reset_password",
			data: {
			result_type:'ajax',email_id:$("#email_to").val()
		},
		beforeSend: function() {
					$('#home').block({ message: 'Loading...' }); 
				  },
			success: function(html){
				$(".com_div").html(html);
				$('#home').unblock();
			}
		});
	}
	else
	{
		$('.parsley-form').submit();
	}
	//return false;
}
</script>
