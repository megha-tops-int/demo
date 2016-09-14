<?php
/*
  @Description: Truncate list
  @Author: Parth Khatri
  @Date: 28-04-15
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
$admin_session = $this->session->userdata('junction_studio_admin_session');
$head_title = 'Truncate Database';
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
                        <h3> <i class="fa fa-table"></i><?= $head_title ?></h3>
                    </div>
                    <!-- /.portlet-header -->

                    <div class="portlet-content">
                        <div class="table-responsive">
                            <div role="grid" class="dataTables_wrapper" id="DataTables_Table_0_wrapper">
                                <?php
                                $this->message_session = $this->session->userdata('message_session');
                                if (!empty($this->message_session)) {
                                    ?>
                                    <p>
                                    <div id="div_msg" class="message" style="display:none; text-align:center;"> <?php
                                        echo '<label class="error">' . $this->message_session['msg'] . '</label>';
                                        $newdata = array('msg' => '');
                                        $this->session->set_userdata('message_session', $newdata);
                                        ?> </div>
                                    </p>
                                    <? } ?>
                                <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url') . $viewname ?>/truncate" >

                                    <?php
                                    $querytables = $this->db->query("SHOW TABLES");
                                    $resulttables = $querytables->result();
                                    $object = $resulttables[0];
                                    $key = key((array) $object);
                                    ?>
                                    <!-- End of Query For showing database every tables -->
                                    <div class="form-group">
                                        <label for="select-multi-input">Select table</label>
                                        <select id="db_table" name="db_table" class="form-control parsley-validated">
                                            <option value=""> Select Table </option>
                                            <?php for ($i = 0; $i < (count($resulttables)); $i++) {
                                                ?>
                                                <option value="<?= $resulttables[$i]->$key; ?>"><?= $resulttables[$i]->$key; ?></option>
<?php } ?>
                                        </select>
                                    </div>


                                    <div class="col-sm-4">
                                        <button type="submit" name="truncate" value="truncate" class="btn btn-danger howler" data-type="danger" onclick="validation_check();">Truncate</button>
                                    </div>


                                    <div class="col-sm-4">
                                        <button type="submit" name="truncate_all" value="truncate_all" class="btn btn-danger howler" data-type="danger"><?= $head_title ?> All</button>
                                    </div>



                                </form>
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
<!--<script type="text/javascript" src="<?= $this->config->item('js_path') ?>script.js"></script> -->
<script>

    $(document).ready(function() {

        $("#div_msg").css('display', 'block');

        setTimeout(function() {
            $('#div_msg').fadeOut('slow');
        }, 3000);
    });

    function validation_check()
    {
        if ($("#db_table").val() == '')
        {
            alert("Please select table");
            return false;

        }

    }
</script>