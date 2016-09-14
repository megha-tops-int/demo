<?php
/*

 *  @Description: Admin Add
  @Author: Parag Joshi
  @Date: 29-02-2016

 */ ?>
<?php
$viewname = $this->router->uri->segments[2];
$formAction = !empty($editRecord) ? 'update_data' : 'insert_data';
$path = $viewname . '/' . $formAction;
$is_edit = !empty($editRecord) ? "View" : "Add New";
$edit_data = !empty($editRecord) ? '1' : '';

$head_title = 'Donation Management';
$sub_title = 'Donation';
?>
<style>
    span{
        word-wrap: break-word;
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
                        <h3> <i class="fa fa-heart-o"></i><?= $is_edit . " " . $sub_title; ?></h3>
                        <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)" title="Back">Back</a> 
                    </div>
                    <div class="portlet-content">
                        <div class="col-sm-8">
                            <form class="form parsley-form" enctype="multipart/form-data" name="<?php echo $viewname; ?>" id="<?php echo $viewname; ?>" method="post" accept-charset="utf-8" action="<?= $this->config->item('admin_base_url') ?><?php echo $path ?>" >
                                <div class="clear col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">    
                                        <label for="select-multi-input"><h3>User Details</h3> </label><br>

                                    </div>
                                </div> 
                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="col-xs-12 col-sm-6 col-md-6">  
                                        <div class="form-group">    
                                            <label for="select-multi-input"><?= $this->lang->line('common_label_first_name') ?></label><br>
                                            <span><?= !empty($editRecord[0]['first_name']) ? htmlentities($editRecord[0]['first_name']) : ''; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">            
                                            <label for="select-multi-input"><?= $this->lang->line('common_label_last_name') ?></label><br>
                                            <span><?= !empty($editRecord[0]['last_name']) ? htmlentities($editRecord[0]['last_name']) : ''; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">     
                                            <label for="select-multi-input">Saints member number</label><br>
                                            <span>
                                                <?php if (!empty($editRecord[0]['saints_applicable']) && $editRecord[0]['saints_applicable'] == 1) {
                                                    ?>
                                                    <?= !empty($editRecord[0]['saints_applicable']) ? 'Not Applicable' : ''; ?>
                                                <?php } else { ?>
                                                    <?= !empty($editRecord[0]['saints_member_no']) ? htmlentities($editRecord[0]['saints_member_no']) : ''; ?>
                                                <?php } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Organisation name</label><br>
                                            <span>
                                                <?php if (!empty($editRecord[0]['organisation_applicable']) && $editRecord[0]['organisation_applicable'] == 1) {
                                                    ?>
                                                    <?= !empty($editRecord[0]['organisation_applicable']) ? 'Not Applicable' : ''; ?>
                                                <?php } else { ?>
                                                    <?= !empty($editRecord[0]['organization_name']) ? htmlentities($editRecord[0]['organization_name']) : ''; ?>
                                                <?php } ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">    
                                            <label for="select-multi-input"><?= $this->lang->line('common_label_email') ?></label><br>
                                            <span><?= !empty($editRecord[0]['email']) ? htmlentities($editRecord[0]['email']) : ''; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Phone number</label><br>
                                            <span><?= !empty($editRecord[0]['phone_no']) ? $editRecord[0]['phone_no'] : ''; ?></span>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Are you a registered charity?</label><br>
                                            <span><?= !empty($editRecord[0]['registered_charity']) && $editRecord[0]['registered_charity'] == '1' ? 'Yes' : 'No' ?></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Street </label><br>
                                            <span>  <?= !empty($editRecord[0]['street']) ? $editRecord[0]['street'] : ''; ?></span>
                                        </div>
                                    </div>   
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Suburb</label><br>
                                            <span><?= !empty($editRecord[0]['suburb_name']) ? $editRecord[0]['suburb_name'] : ''; ?></span>
                                        </div>
                                    </div> 
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Post code</label><br>
                                            <span><?= !empty($editRecord[0]['suburb_code']) ?$editRecord[0]['suburb_code'] : ''; ?></span>
                                        </div>
                                    </div> 

                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">    
                                            <label for="select-multi-input">State </label><br>
                                            <span><?= !empty($state_list[$editRecord[0]['state']]) ? $state_list[$editRecord[0]['state']] : ''; ?>
                                            </span>
                                        </div>
                                    </div> 

                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Date of event </label><br>
                                            <span> 
                                                <?php
                                                if (!empty($editRecord[0]['event_calander'])) {
                                                    echo 'Not Applicable';
                                                } else {
                                                    ?>
                                                    <?php echo (!empty($editRecord[0]['your_event_date']) && $editRecord[0]['your_event_date'] != '0000-00-00 00:00:00') ? date(COMMAN_DATE_FORMATE_JS, strtotime($editRecord[0]['your_event_date'])) : ''; ?>
                                                <?php } ?>
                                            </span>
                                        </div>
                                    </div>        
                                </div>
                                <div class="clear col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">    
                                        <label for="select-multi-input"><h3>Donation request details</h3> </label><br>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">    
                                        <label for="select-multi-input">We’d like to get to know you. Are you a…</label><br>
                                        <span> 
                                            <?= !empty($editRecord[0]['applicant_type']) ? $applicant_type[$editRecord[0]['applicant_type']] : '' ?>
                                            <?= !empty($editRecord[0]['applicant_type']) && $editRecord[0]['applicant_type'] == '5' ? '(' . $editRecord[0]['applicant_title'] . ')' : '' ?>
                                        </span>
                                    </div>
                                </div>   

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">    
                                        <label for="select-multi-input">How can we assist you? </label><br>
                                        <span> 
                                            <?= !empty($editRecord[0]['requesting']) ? $requesting_type[$editRecord[0]['requesting']] : '' ?>
                                        </span>
                                    </div>
                                </div>   

                                <div class="clear col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">    
                                        <label for="select-multi-input"><h3> <?= !empty($editRecord[0]['requesting']) ? $requesting_type[$editRecord[0]['requesting']] : '' ?></h3> </label><br>
                                        <p><?= !empty($requesting_description[$editRecord[0]['requesting']]) ? $requesting_description[$editRecord[0]['requesting']] : '' ?></p>
                                    </div>
                                </div>
                                <?php if (!empty($editRecord[0]['requesting']) && $editRecord[0]['requesting'] == 1) { ?>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">What game does your request relate to? </label><br>
                                            <span> 
                                                <?= !empty($game_name) ? $game_name : '' ?>
                                            </span>
                                        </div>
                                    </div>   
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">How can we assist you?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['type_of_ur_request']) ? $editRecord[0]['type_of_ur_request'] : '' ?>
                                            </span>
                                        </div>
                                    </div>   
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">How many people are attending?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['people_number']) ? $editRecord[0]['people_number'] : '' ?>
                                            </span>
                                        </div>
                                    </div> 
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Is there anything else you want to add?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['game_anything_want_to_add']) ? $editRecord[0]['game_anything_want_to_add'] : '' ?>
                                            </span>
                                        </div>
                                    </div>  
                                <?php
                                } else if (!empty($editRecord[0]['requesting']) && $editRecord[0]['requesting'] == 2) {
                                    ?>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Please describe your event.</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['describe_ur_event']) ? $editRecord[0]['describe_ur_event'] : '' ?>
                                            </span>
                                        </div>
                                    </div>   
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">How many people will be attending your event?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['how_many_people_attending_event']) ? $editRecord[0]['how_many_people_attending_event'] : '' ?>
                                            </span>
                                        </div>
                                    </div>   
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">What are the items you wish to receive?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['wish_item_receive']) ? $editRecord[0]['wish_item_receive'] : '' ?>
                                                <?= !empty($editRecord[0]['wish_item_receive_value']) ? '(' . $editRecord[0]['wish_item_receive_value'] . ')' : '' ?>
                                            </span>
                                        </div>
                                    </div> 
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Is there anything else you want to add, such as the quantity of giveaways you need?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['giveaways_anything_want_to_add']) ? $editRecord[0]['giveaways_anything_want_to_add'] : '' ?>
                                            </span>
                                        </div>
                                    </div> 

                                <?php
                                } elseif (!empty($editRecord[0]['requesting']) && $editRecord[0]['requesting'] == 3) {
                                    ?>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">What item do you wish to receive?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['merchandise_do_u_wish_receive']) ? $editRecord[0]['merchandise_do_u_wish_receive'] : '' ?>
                                            </span>
                                        </div>
                                    </div> 

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">What cause are you raising money for?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['what_case_raising_money']) ? $editRecord[0]['what_case_raising_money'] : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Is there anything else you want to add?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['merchandise_anything_want_to_add']) ? $editRecord[0]['merchandise_anything_want_to_add'] : '' ?>
                                            </span>
                                        </div>
                                    </div>




                                <?php } else if (!empty($editRecord[0]['requesting']) && $editRecord[0]['requesting'] == 4) {
                                    ?>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Please tell us about the occasion?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['occasion']) ? $editRecord[0]['occasion'] : '' ?><?= !empty($editRecord[0]['occasion_count']) ? '(' . $editRecord[0]['occasion_count'] . ')' : '' ?>
                                            </span>
                                        </div>
                                    </div> 
                                    <div class="clear col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input"><h5>Who would you like the letter to be made out to?</h5></label><br>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">    
                                            <label for="select-multi-input">First name</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['occasion_first_name']) ? $editRecord[0]['occasion_first_name'] : '' ?>
                                            </span>
                                        </div>
                                    </div> 
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Last name</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['occasion_last_name']) ? $editRecord[0]['occasion_last_name'] : '' ?>
                                            </span>
                                        </div>
                                    </div> 

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Age</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['occasion_age']) ? $editRecord[0]['occasion_age'] : '' ?>
                                            </span>
                                        </div>
                                    </div> 

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Who would you like the card signed by?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['card_signed_by']) ? $editRecord[0]['card_signed_by'] : '' ?>
                                            </span>
                                        </div>
                                    </div> 

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Is there anything else you want to add?</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['personalised_anything_want_to_add']) ? $editRecord[0]['personalised_anything_want_to_add'] : '' ?>
                                            </span>
                                        </div>
                                    </div> 


                                <?php } else if (!empty($editRecord[0]['requesting']) && $editRecord[0]['requesting'] == 5) {
                                    ?>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">    
                                            <label for="select-multi-input">Please tell us a little bit about your request</label><br>
                                            <span> 
                                                <?= !empty($editRecord[0]['other_type_anything_want_to_add']) ? $editRecord[0]['other_type_anything_want_to_add'] : '' ?>
                                            </span>
                                        </div>
                                    </div> 

                                <?php } ?>
                                
                                <?php if(!empty($editRecord[0]['status']) && ($editRecord[0]['status'] == '1'))
                                {?>
                                        <input type="hidden" name="mail_send" value="1">
                               <?php }
                                ?>
                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">    
                                            <?php
                                            if (!empty($editRecord[0]['status']) && $editRecord[0]['status'] == "1") { 
                                                ?>
                                                <div class="form-group">
                                                    <label for="select-multi-input">Status</label>
                                                    <select name="status" id="status" class="form-control" onchange="return show_hide_div(this.value)" >
                                                        <option value=""> Select status </option>
                                                        <option <?php if (!empty($editRecord[0]['status']) && $editRecord[0]['status'] == "2") {
                                                echo "selected = selected";
                                            } ?>  value="2"> Approved </option>
                                                        <option <?php if (!empty($editRecord[0]['status']) && $editRecord[0]['status'] == "3") {
                                                echo "selected = selected";
                                            } ?>  value="3"> Rejected </option>
                                                        <option <?php if (!empty($editRecord[0]['status']) && $editRecord[0]['status'] == "4") {
                                                echo "selected = selected";
                                            } ?>  value="4"> Offer alternative option </option>
                                                    </select>
                                                </div>
                                                <?php
                                            } else {
                                                ?>
                                                <?php
                                                if (!empty($editRecord[0]['status']) && $editRecord[0]['status'] == "2") {
                                                    $status = "Approved";
                                                }
                                                if (!empty($editRecord[0]['status']) && $editRecord[0]['status'] == "3") {
                                                    $status = "Rejected";
                                                }
                                                if (!empty($editRecord[0]['status']) && $editRecord[0]['status'] == "4") {
                                                    $status = "Offer alternative option";
                                                }
                                                ?>
                                            <input type="hidden" name="status" value="<?=!empty($editRecord[0]['status']) ? $editRecord[0]['status'] :''?>">
                                                <div class="form-group">
                                                   
                                                    <label for="select-multi-input">Status</label><br>
                                                    <span><?= !empty($status) ? $status : ''; ?></span>
                                                </div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if (!empty($editRecord[0]['reason'])) {
                                                ?>
                                                    <div class="form-group">
                                                        <label for="select-multi-input">Alternative option</label><br>
                                                        <span><?= !empty($editRecord[0]['reason']) ? htmlentities($editRecord[0]['reason']) : ''; ?></span>
                                                    </div>
                                                <?php } ?>
                                                 <div id="reason_div" style="display:none;">
                                                    <div class="form-group">
                                                        <label for="select-multi-input">Alternative option</label>
                                                        <textarea name="alternative_option" class="form-control parsley-validated" placeholder="Alternative option"> </textarea>
<!--                                                        <input id="reason" name="alternative_option" placeholder="Alternative option" class="form-control parsley-validated" type="text" value="">-->
                                                    </div>
                                                </div>
                                            
                                           <div class="form-group">
                                                        <label for="select-multi-input">Comment box</label>
                                                        <textarea name="comment_box" id class="form-control" placeholder="Comment Box"><?= !empty($editRecord[0]['comment_box']) ? $editRecord[0]['comment_box'] : ''?></textarea>
                                            </div>
                                            
                                            <?php
                                          //  if (!empty($editRecord[0]['status']) && $editRecord[0]['status'] == "1") {
                                                ?>
                                                <div class="form-group">
                                                    <input type="hidden" name="id" id="content_id" onclick="save_comment('');" value="<?= !empty($editRecord[0]['id']) ? $editRecord[0]['id'] : ''; ?>" />
                                                    <button type="submit" onclick="return setdefaultdata();" class="btn btn-primary" id="save" title="<?php echo $this->lang->line('save_record'); ?>">Save</button>
                                                    <?php if (empty($editRecord)) { ?>
                                                        <button type="reset" class="btn btn-primary" id="reset" onClick="cleare_data()" title="Reset">Reset</button>
                                                <?php } ?>
                                                </div>
                                                <?php
                                           // }
                                            ?>
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
<!-- #content --> 
<script type="text/javascript">

                            function setdefaultdata()
                            {
                                    if ($('#<?php echo $viewname ?>').parsley().isValid())
                                    {
                                        $.blockUI({message: '<?= '<img src="' . base_url('images') . '/ajaxloader.gif" border="0" align="absmiddle"/>' ?> Please Wait...'});
                                    }
                             }

                            function isNumberKey(evt)
                            {
                                var charCode = (evt.which) ? evt.which : evt.keyCode
                                if (charCode > 31 && (charCode < 48 || charCode > 57))
                                    return false;

                                return true;
                            }
                            function cleare_data()
                            {
                                $("#<?php echo $viewname; ?>").parsley().destroy();
                                $("#<?php echo $viewname; ?>").parsley();
                            }

                            function show_hide_div()
                            {
                                var status = $('#status').val();
                                if (status == 4)
                                {
                                    $('#reason_div').show();
                                }
                                else
                                {
                                    $('#reason_div').hide();
                                }
                            }

                            $(document).ready(function() {
                                var type = '<?= !empty($editRecord[0]['status']) ? $editRecord[0]['status'] : '' ?>';
                                //alert(type);
                                if (type != '' && type == 3)
                                {
                                    $('#reason_div').show();
                                }
                            });
                         
</script>