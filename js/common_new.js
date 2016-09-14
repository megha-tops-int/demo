/*
 @Description: Comman JS Functions
 @Author: Kaushik Valiya
 @Date: 11-12-15
 */

var all_delete_action_msg = 'Records deleted successfully';
var all_published_action_msg = 'Records published successfully';
var all_unpublished_action_msg = 'Records unpublished successfully';
var all_active_action_msg = 'Records active successfully';
var all_deactive_action_msg = 'Records deactive successfully';
var confirm_active_msg = 'Are you sure want to inactive record';
var confirm_inactive_msg = 'Are you sure want to active record';
var confirm_sigle_delete_msg = 'Are you sure want to delete record(s)? If you choose yes then it will delete all associated records also';
var confirm_multi_delete_msg = 'Are you sure want to delete record(s)? If you choose yes then it will delete all associated records also.';
/*
 @Description: Function For Searching Data
 @Author: Kaushik Valiya
 @Input: String 
 @Output: Data list
 @Date: 11-12-2015
 */
function search_data(allflag, view_name)
{
    var uri_segment = $("#uri_segment").val();
    var type = $("#type").val();
    
    $.ajax({
        type: "POST",
        url: view_name + "" + uri_segment,
        data: {
            result_type: 'ajax', searchreport: $("#searchreport").val(), perpage: $("#perpage").val(), searchtext: $("#searchtext").val(), sortfield: $("#sortfield").val(), sortby: $("#sortby").val(), type:type, allflag: allflag
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
 @Description: Function For Confirm Box
 @Author: Kaushik Valiya
 @Input: 
 @Output: 
 @Date: 11-12-2015
 */

function deletepopup1(id, name, viewname)
{

    var boxes = $('input[name="check[]"]:checked');
    if (boxes.length == '0' && id == '0')
    {
        $.confirm({'title': 'Alert', 'message': " <strong> Please select record(s) to delete. " + "<strong></strong>", 'buttons': {'ok': {'class': 'btn_center alert_ok'}}});
        $('#selecctall').focus();
        return false;

    }
    if (id == '0')
    {
        var msg = confirm_multi_delete_msg;
    }
    else
    {
        var msg = confirm_sigle_delete_msg;
    }
    $.confirm({'title': 'CONFIRM', 'message': " <strong> " + msg + " " + "<strong></strong>", 'buttons': {'Yes': {'class': '',
                'action': function() {
                    delete_all(id, viewname);
                }}, 'No': {'class': 'special'}}});
}
/*
 @Description: Function For After Confirm Then Delele data
 @Author: Kaushik Valiya
 @Input: 
 @Output: 
 @Date: 11-12-2015
 */
function delete_all(id, viewname)
{
    var div_msg = "<label class='error-list-color'>" + all_delete_action_msg + "</label>";
    var myarray = new Array;
    var i = 0;
    var boxes = $('input[name="check[]"]:checked');

    if (id != '0')
    {
        var single_remove_id = id;
    }
    else
    {
        $(boxes).each(function() {
            myarray[i] = this.value;
            i++;
        });
    }
    $.ajax({
        type: "POST",
        url: viewname + "/ajax_delete_all",
        dataType: 'json',
        async: false,
        data: {'myarray': myarray, 'single_remove_id': id},
        success: function(data) {
            $.ajax({
                type: "POST",
                url: viewname + '/' + data,
                data: {
                    result_type: 'ajax', searchreport: $("#searchreport").val(), perpage: $("#perpage").val(), searchtext: $("#searchtext").val(), sortfield: $("#sortfield").val(), sortby: $("#sortby").val(), allflag: ''
                },
                beforeSend: function() {
                    $('#common_div').block({message: 'Loading...'});
                },
                success: function(html) {
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
}

/*
 @Description: Function For Multiple Delete,published and unpublished
 @Author: Kaushik Valiya
 @Input : Id Array
 @Output: 
 @Date: 11-12-2015
 */
function delete_all_multipal(val, viewname)
{
   var status = '';
    if (val == 'delete')
    {
        var msg = 'Are you sure want to ' + val + ' record(s)? If you choose yes then it will delete all associated records also. ';
    } else {
        var msg = 'Are you sure want to ' + val + ' record(s)';
    }
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
                    if (val == 'delete')
                    {
                        var url = viewname + "ajax_delete_all";
                        div_msg = "<label class='error-list-color'>" + all_delete_action_msg + "</label>";
                    }
                    if (val == 'publish' || val == 'active')
                    {
                        var url = viewname + "ajax_status_all";
                        if(val == 'active'){
                            div_msg = "<label class='error-list-color'>" + all_active_action_msg + "</label>";
                        }else{
                            div_msg = "<label class='error-list-color'>" + all_published_action_msg + "</label>";
                        }
                        status = '1';
                    }
                    if (val == 'unpublish' || val == 'deactive')
                    {
                        var url = viewname + "ajax_status_all";
                        if(val == 'active'){
                            div_msg = "<label class='error-list-color'>" + all_deactive_action_msg + "</label>";
                        }else{
                            div_msg = "<label class='error-list-color'>" + all_unpublished_action_msg + "</label>";
                        }
                        status = '0';
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
 @Description: Function For Searching Reset
 @Author: Kaushik Valiya
 @Input : 
 @Output: 
 @Date: 11-12-2015
 */
function clearfilter_data(viewname)
{
    $("#searchtext").val("");
    $("#type").val("");
    applysortfilte_contact('', '', viewname);

}
/*
 @Description: Function For Per Page Record
 @Author: Kaushik Valiya
 @Input : 
 @Output: 
 @Date: 11-12-2015
 */
function changepages(viewname)
{

    search_data('', viewname);
}
/*
 @Description: Function For Sorting Field
 @Author: Kaushik Valiya
 @Input : 
 @Output: 
 @Date: 11-12-2015
 */
function applysortfilte_contact(sortfilter, sorttype, viewname)
{
    $("#sortfield").val(sortfilter);
    $("#sortby").val(sorttype);
    search_data('changesorting', viewname);
}


  function status_change(status,id,viewname)
        {
            var path='';

            if(status == 0)
            {
                path = viewname+"unpublish_record/"+id;
                msg = confirm_active_msg;
                div_msg = "<label class='error-list-color'>" + all_deactive_action_msg + "</label>";
            }else
            {
                path = viewname+"publish_record/"+id;
                msg = confirm_inactive_msg;
                div_msg = "<label class='error-list-color'>" + all_active_action_msg + "</label>";
            }

            $.confirm({'title': 'CONFIRM','message': " <strong> "+msg+""+"<strong>?</strong>",'buttons': {'Yes': {'class': '',
       'action': function(){
            $.ajax({
                type: "POST",
                url: path,
                dataType: 'json',
                beforeSend: function() {
                 $('#common_div').block({ message: 'Loading...' }); 
                },
                success: function(result){
                    $('#common_div').unblock(); 
                    $.ajax({
                        type: "POST",
                        url: viewname+result,
                        data: {
                        result_type:'ajax',searchreport:$("#searchreport").val(),perpage:$("#perpage").val(),searchtext:$("#searchtext").val(),sortfield:$("#sortfield").val(),sortby:$("#sortby").val()
                        },
                        beforeSend: function() {
                            $('#common_div').block({ message: 'Loading...' }); 
                        },
                        success: function(html){
                            $("#common_div").html(html);
                            //$("#reload_td"+id).html(html);
                            $('#common_div').unblock(); 
                            $("#div_msg").css('display','block'); 
                            $("#div_msg").html(div_msg);
                            setTimeout(function() {
                            $('#div_msg').fadeOut('slow');
                            }, 3000);
                        }
                    });
                    return false;
                },error: function(jqXHR, textStatus, errorThrown) {
                    $.unblockUI();
                }
            });
    }},'No'	: {'class'	: 'special'}}});
      }    
      
function delete_feedback(id, name, viewname, field_id)
{
    var boxes = $('input[name="check[]"]:checked');
    if (boxes.length == '0' && id == '0')
    {
        $.confirm({'title': 'Alert', 'message': " <strong> Please select record(s) to delete. " + "<strong></strong>", 'buttons': {'ok': {'class': 'btn_center alert_ok'}}});
        $('#selecctall').focus();
        return false;

    }
    if (id == '0')
    {
        var msg = confirm_multi_delete_msg;
    }
    else
    {
        var msg = confirm_sigle_delete_msg;
    }
    $.confirm({'title': 'CONFIRM', 'message': " <strong> " + msg + " " + "<strong></strong>", 'buttons': {'Yes': {'class': '',
                'action': function() {
                    delete_all_feedback(id, viewname, field_id);
                }}, 'No': {'class': 'special'}}});
}

function delete_all_feedback(id, viewname, field_id)
{
    var div_msg = "<label class='error-list-color'>" + all_delete_action_msg + "</label>";
    var myarray = new Array;
    var i = 0;
    var boxes = $('input[name="check[]"]:checked');

    if (id != '0')
    {
        var single_remove_id = id;
    }
    else
    {
        $(boxes).each(function() {
            myarray[i] = this.value;
            i++;
        });
    }
    $.ajax({
        type: "POST",
        url: viewname + "ajax_delete_all_feedback",
        dataType: 'json',
        async: false,
        data: {'myarray': myarray, 'single_remove_id': id},
        success: function(data) {
            $.ajax({
                type: "POST",
                url: viewname + 'feedback/' + field_id + '/' + data,
                data: {
                    result_type: 'ajax', searchreport: $("#searchreport").val(), perpage: $("#perpage").val(), searchtext: $("#searchtext").val(), sortfield: $("#sortfield").val(), sortby: $("#sortby").val(), allflag: ''
                },
                beforeSend: function() {
                    $('#common_div').block({message: 'Loading...'});
                },
                success: function(html) {
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
}

function delete_all_feedback_multipal(val, viewname, field_id)
{
   var status = '';
    if (val == 'delete')
    {
        var msg = 'Are you sure want to ' + val + ' record(s)? If you choose yes then it will delete all associated records also. ';
    } else {
        var msg = 'Are you sure want to ' + val + ' record(s)';
    }
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
                    if (val == 'delete')
                    {
                        var url = viewname + "ajax_delete_all_feedback";
                        div_msg = "<label class='error-list-color'>" + all_delete_action_msg + "</label>";
                    }
                    if (val == 'publish')
                    {
                        var url = viewname + "ajax_status_all";
                        div_msg = "<label class='error-list-color'>" + all_published_action_msg + "</label>";
                        status = '1';
                    }
                    if (val == 'unpublish')
                    {
                        var url = viewname + "ajax_status_all";
                        div_msg = "<label class='error-list-color'>" + all_unpublished_action_msg + "</label>";
                        status = '0';
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
                                url: viewname + 'feedback/' + field_id + '/' + data,
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