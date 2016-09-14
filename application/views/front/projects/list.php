<div class="back_projects">
<!--start: slider-->
<section class="hero-area">
  <div class="container-solid">
    <div class="page_tital">
      <h1 class="title">WHAT WE DO</h1>
    </div>
  </div>
</section>
<!--end: slider-->

<!--start: main-->
<div class="container-water project-list">
  <div class="container-solid" >
    <div class="page-main">
        <div id="comman_div">
            <?=$this->load->view('front/projects/ajax_list');?>
        </div>
    </div>
  </div>
</div>
<!--end: main--> 
</div>

<script type="text/javascript">
    
var ajax_arry=[];
var ajax_index =0;
var sctp = 100;  
$(function()
{
    $(document).scroll(function()
    {
        var height = $('#comman_div').height();

        var scroll_top = $(this).scrollTop();
        if(ajax_arry.length>0)
        {
            $('#comman_div').unblock();
            for(var i=0;i<ajax_arry.length;i++)
            {
                ajax_arry[i].abort();
            }
        }
        var page = $('#comman_div').find('.nextpage').val();
        var isload = $('#comman_div').find('.isload').val();

        if (($(window).scrollTop() == ($(document).height() - $(window).height())) && isload=='true')
        { 
            var ajaxreq = $.ajax({
                url:"<?=base_url().'projects/project_ajax_list'?>",
                type:"POST",
                beforeSend: function()
                {
                    $.blockUI({ message: '<?='<p class="text-center"><img src="'.base_url('images').'/ajaxloader.gif" border="0" align="absmiddle"/></p>'?> <p class="text-center">Please Wait...</p>'});
                },
                data:
                {
                    result_type: 'ajax',perpage: $(".nextpage").val()
                },
                cache: false,
                success: function(response)
                {                   
                    $('#comman_div').find('.nextpage').remove();
                    $('#comman_div').find('.isload').remove();
                    $('#comman_div').append(response);
                    $.unblockUI(); 
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    $.unblockUI();
                }
                });
                ajax_arry[ajax_index++]= ajaxreq;
        }
        return false;
    });   

});               

$(document).ready( function() {
  $(".overlay").click( function() {
      window.location.href = '<?php echo base_url().'projects/details/';?>'+this.id;
    });
  });

</script>
