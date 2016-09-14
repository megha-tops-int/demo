<?php
/*
  @Description: Tips Management
  @Author: Parag Joshi
  @Date: 29-02-2016
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<script language="javascript">
    $.blockUI({message: '<?= '<img src="' . base_url('images') . '/ajaxloader.gif" border="0" align="absmiddle"/>' ?> Please Wait...'});
    $(document).ready(function() {
        $.unblockUI();
    });
</script>
<?php
$viewname = $this->router->uri->segments[2];
$path_comman = $this->config->item('admin_base_url') . $viewname . '/';
$admin_session = $this->session->userdata('junction_studio_admin_session');
$head_title = 'Donation Management';
$sub_title = 'Donation';
?>

<div id="content">
    <div id="content-header">
        <h1>
            <?= $head_title ?>
        </h1>
    </div>
    <div id="content-container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <div class="portlet-header">
                        <h3> <i class="fa fa-heart-o"></i>
                            <?= $head_title ?>
                        </h3>
                    </div>
                    <!-- /.portlet-header -->

                    <div class="portlet-content">
                        <div class="table-responsive">
                            <div role="grid" class="dataTables_wrapper" id="DataTables_Table_0_wrapper">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 top-sel-group">
                                      <div class="inner-row">
                                        <div id="DataTables_Table_0_length" class="dataTables_length">
                                            <label>
                                                <select class="selec" name="DataTables_Table_0_length" size="1" aria-controls="DataTables_Table_0" onchange="changepages('<?= $path_comman ?>');" id="perpage">
                                                    <option value="">Rows</option>
                                                    <option <?php
                                                    if (!empty($perpage) && $perpage == 10) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?> value="10">10</option>
                                                    <option <?php
                                                    if (!empty($perpage) && $perpage == 25) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?> value="25">25</option>
                                                    <option <?php
                                                    if (!empty($perpage) && $perpage == 50) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?> value="50">50</option>
                                                    <option <?php
                                                    if (!empty($perpage) && $perpage == 100) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?> value="100">100</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="dataTables_length">
                                            <select name="requesting" id="requesting" class="form-control parsley-validated selcwidth">
                                                <option value="">Select type</option>
                                                <?php
                                                if (!empty($requesting_type)) {
                                                    foreach ($requesting_type as $key => $value) {
                                                        ?>
                                                        <option type="<?= $value ?>" value="<?= $key ?>"><?= $value ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="dataTables_length">
                                            <select name="state" id="state" class="form-control parsley-validated selcwidth">
                                                <option value="">Select state</option>
                                                <?php
                                                if (!empty($state_list) && count($state_list) > 0) {
                                                    foreach ($state_list as $key => $value) {
                                                        ?>
                                                        <option title="<?= $value ?>" value="<?= $key ?>">
                                                            <?php
                                                            if (strlen($value) > 25) {
                                                                echo substr(trim($value), 0, 25) . "...";
                                                            } else {
                                                                echo trim($value);
                                                            }
                                                            ?>
                                                        </option>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="dataTables_length">
                                            <select name="type" id="type"  class="form-control parsley-validated selcwidth">
                                                <option value="">Select status</option>
                                                <option value="1" <?php if (!empty($status) && $status == 1) echo "selected"; ?>>Received</option>
                                                <option value="2" <?php if (!empty($status) && $status == 2) echo "selected"; ?>>Approved</option>
                                                <option value="3" <?php if (!empty($status) && $status == 3) echo "selected"; ?>>Rejected</option>
                                                <option value="3" <?php if (!empty($status) && $status == 4) echo "selected"; ?>>Offer alternative option</option>
                                            </select>
                                        </div>
                                        <div class="dataTables_length new_length">
                                            <select name="applicant_type" id="applicant_type" class="styled selectric form-control parsley-validated" data-required="true">
                                                <option value="">Select organisation</option>
                                                <option value="1">Not for Profit Organisation</option>
                                                <option value="2">Community Organisation</option>
                                                <option value="3">For Profit Organisation</option>
                                                <option value="4">Individual</option>
                                                <option value="5">Other</option>
                                            </select>
                                        </div>
                                        <div class="text-field">
                                            <input type="text" value="<?php echo!empty($to_date) ? $to_date : '' ?>" id="to_date" readonly="readonly" placeholder="To date" class="form-control">  
                                        </div>
                                        <div class="text-field">
                                            <input type="text" value="<?php echo!empty($from_date) ? $from_date : '' ?>" readonly="readonly" placeholder="From date" class="form-control" id="from_date">      
                                    	</div>
                                       </div>	
                                    </div>
                                 </div>

                                <div class="row">
	                                <form  name="export_excel" id="export_excel" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url').'donations/export'?>">
	                                    <input type="hidden" name="export_data[]" value="sr_no">
                                            <div class="col-xs-12 col-sm-4 col-md-4 top-left-export-block">
	                                         <div class="sel-box">
	                                         <select class="selectBox form-control" name='export_data[]' multiple="multiple" id='export_val'>
	                                             <option value="first_name" selected="selected"> First name</option>
	                                             <option value="last_name" selected="selected"> last name</option>
	                                             <option value="saints_member_no" selected="selected"> Saints member number</option>
	                                             <option value="organization_name" selected="selected"> Organisation name</option>
	                                             <option value="email" selected="selected"> Email</option>
	                                             <option value="phone_no" selected="selected"> Phone number</option>
	                                             <option value="registered_charity" selected="selected"> Are you a registered charity?</option>
	                                             <option value="street" selected="selected"> Street</option>
	                                             <option value="suburb_name" selected="selected"> Suburb</option>
	                                             <option value="suburb_code" selected="selected"> Post code</option>
	                                             <option value="state" selected="selected"> State</option>
	                                             <option value="your_event_date" selected="selected"> Date of event</option>
	                                             <?php 
                                                        $are_like ="We&apos;d like to get to know you. Are you a...";
                                                     ?>
                                                     <option value="applicant_type" selected="selected"> <?= $are_like ?> </option>
	                                             <option value="requesting" selected="selected"> How can we assist you? </option>
	                                         </select>
	                                         </div>
	                                         <input type="submit" name="Export" class="btn btn-success howler" title="Export" value="Export">    
	                                    </div>
                                          </form>  
	                                   
	                                    <div class="col-xs-12 col-sm-8 col-md-8 pull-right top-right-srch-block">
	                                        <div class="dataTables_filter" id="DataTables_Table_0_filter">
	                                            <label>
	                                                <input class="" type="hidden" name="uri_segment" id="uri_segment" value="<?= !empty($uri_segment) ? $uri_segment : '0' ?>">
	                                                <input type="text" name="searchtext" id="searchtext" aria-controls="DataTables_Table_0" placeholder="Search first name, last name,type ,location,email..." title="Search first name, last name,type ,street,suburb name,post code,state,email,..." value="<?= !empty($searchtext) ? $searchtext : '' ?>">
	                                                <button onclick="search_advance_data('changesearch', '<?= $path_comman ?>')" class="btn btn-success howler"  title="<?php echo $this->lang->line('search_record'); ?>">Search </button>
	                                                <button class="btn btn-success howler flt" title="<?php echo $this->lang->line('view_all'); ?>" onclick="clearfilter_advance_data('<?= $path_comman ?>')">
	                                                    View all
	                                                </button>
	                                            </label>
	                                        </div>
	                                    </div>
	                            
                       			 </div>
                                    
                                 <div class="row">
                                    <div class="col-xs-5 col-sm-5 col-md-12 text-center">
                                        <div class="text-center" id="div_msg">
                                            <?php if (!empty($msg)) { ?>
                                                <?php echo '<label class="error-list-color">' . urldecode($msg) . '</label>';
                                                ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                 </div>
                                </div>

                                <div id="common_div">
                                    <?= $this->load->view('admin/' . $viewname . '/ajax_list') ?>
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

    $(document).ready(function() {
        $('#searchtext').keyup(function(event)
        {
            if (event.keyCode == 13) {
                search_data('changesearch', '<?= $path_comman ?>');
            }
        });
        $("#div_msg").css('display', 'block');

        setTimeout(function() {
            $('#div_msg').fadeOut('slow');
        }, 3000);

    });
    //$("#common_tb a.paginclass_A").click(function() {
    $('body').on('click', '#common_tb a.paginclass_A', function(e) {
        $.ajax({
            type: "POST",
            url: $(this).attr('href'),
            data: {
                result_type: 'ajax', searchreport: $("#searchreport").val(), perpage: $("#perpage").val(), searchtext: $("#searchtext").val(), sortfield: $("#sortfield").val(), sortby: $("#sortby").val()
            },
            beforeSend: function() {
                $.blockUI({message: '<?= '<img src="' . base_url('images') . '/ajaxloader.gif" border="0" align="absmiddle"/>' ?> Please Wait...'});
            },
            success: function(html) {

                $("#common_div").html(html);
                $.unblockUI();
            }
        });
        return false;

    });
    $('body').on('click', '#selecctall', function(e) {
        if (this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        } else {
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });
        }
    });

    $('#allcheck').click(function() {
        var val = $('#delete_all').val();
        if (val != '')
        {
            change_status(val, '<?= $path_comman ?>');
        }
        else
        {
            $.confirm({'title': 'Alert', 'message': " <strong> Please select atleast one statue (Approved / Rejected) " + "<strong></strong>", 'buttons': {'ok': {'class': 'btn_center'}}});
        }
    });

    function change_status(val, viewname)
    {
        var status = '';
        var msg = 'Are you sure want to ' + val + ' record(s)';

        var boxes = $('input[name="check[]"]:checked');
        if (boxes.length == '0')
        {
            $.confirm({'title': 'Alert', 'message': " <strong> Please select record(s) to " + val + ". " + "<strong></strong>", 'buttons': {'ok': {'class': 'btn_center alert_ok'}}});
            $('#selecctall').focus();
            return false;
        }
        $.confirm({'title': 'CONFIRM', 'message': " <strong> " + msg + " " + "<strong></strong>", 'buttons': {'Yes': {'class': '',
                    'action': function() {
                        var div_msg = '';
                        var myarray = new Array;
                        var i = 0;
                        var boxes = $('input[name="check[]"]:checked');
                        $(boxes).each(function() {
                            myarray[i] = this.value;
                            i++;
                        });
                        if (val == 'approved')
                        {
                            var url = viewname + "ajax_status_all";
                            div_msg = "<label class='error-list-color'>" + "Status changed to approved" + "</label>";
                            status = '2';
                        }
                        if (val == 'rejected')
                        {
                            var url = viewname + "ajax_status_all";
                            div_msg = "<label class='error-list-color'>" + "Status changed to rejected" + "</label>";
                            status = '3';
                        }

                        $.ajax({
                            type: "POST",
                            url: url,
                            dataType: 'json',
                            async: false,
                            data: {'myarray': myarray, status: status},
                            success: function(data) {
                                $.ajax({
                                    type: "POST",
                                    url: viewname + "/" + data,
                                    data: {
                                        result_type: 'ajax', searchreport: $("#searchreport").val(), perpage: $("#perpage").val(), searchtext: $("#searchtext").val(), sortfield: $("#sortfield").val(), sortby: $("#sortby").val(), allflag: ''
                                    },
                                    beforeSend: function() {
                                        $('#common_div').block({message: 'Loading...'});
                                    },
                                    success: function(html) {
                                        $('#delete_all').val('');
                                        $("#common_div").html(html);
                                        $('#common_div').unblock();
                                        $("#div_msg").css('display', 'block');
                                        $("#div_msg").html(div_msg);
                                        setTimeout(function() {
                                            $('#div_msg').fadeOut('slow');
                                        }, 3000);
                                    }
                                });
                                return false;
                            }
                        });
                    }}, 'No': {'class': 'special'}}});
    }

    /*
     @Description: Function For Searching Data
     @Author: Kaushik Valiya
     @Input: String 
     @Output: Data list
     @Date: 11-12-2015
     */
    function search_advance_data(allflag, view_name)
    {
        var uri_segment = $("#uri_segment").val();
        var type = $("#type").val();
        var requesting = $("#requesting").val();
        var state = $("#state").val();

        $.ajax({
            type: "POST",
            url: view_name + "" + uri_segment,
            data: {
                result_type: 'ajax', searchreport: $("#searchreport").val(), perpage: $("#perpage").val(), searchtext: $("#searchtext").val(), sortfield: $("#sortfield").val(), sortby: $("#sortby").val(), type: type, requesting: requesting, state: state, allflag: allflag, from_date: $("#from_date").val(), to_date: $("#to_date").val(), applicant_type: $("#applicant_type").val()
            },
            beforeSend: function() {
                $('#common_div').block({message: 'Loading...'});
            },
            success: function(html) {
                $("#common_div").html(html);
                $('#common_div').unblock();
            }
        });
        return false;
    }
    /*
     @Description: Function For Searching Reset
     @Author: Kaushik Valiya
     @Input : 
     @Output: 
     @Date: 11-12-2015
     */
    function clearfilter_advance_data(viewname)
    {
        $("#searchtext").val("");
        $("#type").val("");
        $("#requesting").val("");
        $("#state").val("");
        $("#from_date").val("");
        $("#to_date").val("");
        applysortfilte_contact('', '', viewname);
    }

    $('#from_date').datetimepicker({
        locale: 'ru',
        timepicker: false,
        format: '<?= COMMAN_DATE_FORMATE_JS_VIEW ?>',
        onSelectDate: function() {
            $('#to_date').focus();
        }
    });
    $('#to_date').datetimepicker({
        locale: 'ru',
        timepicker: false,
        format: '<?= COMMAN_DATE_FORMATE_JS_VIEW ?>',
        //closeOnDateSelect: true,
        onShow: function() {
            this.setOptions({
                minDate: $("#from_date").val() ? $("#from_date").val() : false,
                formatDate: '<?= COMMAN_DATE_FORMATE_JS_VIEW ?>'
            });
        }
    });

$("select#export_val").multiselect({
        selectedList: 2
    }).multiselectfilter();
    
    
</script>
<!--Common JS Function Include       -->
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>common_new.js"></script>