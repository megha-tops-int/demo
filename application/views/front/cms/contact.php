<!--start: slider-->
<link rel="stylesheet" href="<?= $this->config->item('css_path') ?>multiselect/jquery.multiselect.filter.css" type="text/css">
<link rel="stylesheet" href="<?= $this->config->item('css_path') ?>multiselect/jquery.multiselect.css" type="text/css">
<link rel="stylesheet" href="<?= $this->config->item('css_path') ?>multiselect/jquery-ui.css" type="text/css">
<link rel="stylesheet" href="<?= $this->config->item('css_path') ?>front/parsley.css" type="text/css">
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>multiselect/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>multiselect/jquery.multiselect.filter.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>multiselect/jquery.multiselect.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>parsley.js"></script>
<style>input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
.blockMsg 
{
    left: 28% !important;
    width:45% !important;
}
 
</style>
<div class="back_contact">
<section class="hero-area">
    <div class="container-solid">
        <div class="page_tital">
            <h1 class="title">GET IN TOUCH</h1>
        </div>
    </div>
</section>
<!--end: slider--> 

<!--start: main-->
<section class="container-water contact product_detail">
    <div class="container-solid">
        <div class="main-area shadow-clone">
<!--            <div class="page_nav">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home </a><span>/</span></li>          
                    <li>Contact us</li>
                </ul>
            </div>-->
            <div class="pro_detail">
                     
<!--                <div class="subtital">
                    <h4>Contact us</h4>
                </div>-->
                <div class="outer">
                    <div class="conact_left">
                        <form class="form parsley-form" enctype="multipart/form-data" name="contact_us_form" id="contact_us_form" method="post" accept-charset="utf-8" action="<?= $this->config->item('base_url') ?>page/insert_data_cont_us" data-validate="parsley">
                            <div class="form-group">
                                <div class="input_left">

                                    <label for="first_name">First name <span style="color:#F00">*</span> </label>
                                    <input type="text" placeholder="First name" class="form-control parsley-validated" data-required="true" id="first_name" name='first_name'>


                                </div>
                                <div class="input_right">
                                    <label for="last_name">Last name <span style="color:#F00">*</span> </label>
                                    <input type="text" placeholder="Last name" id="last_name" class="form-control parsley-validated" data-required="true" name='last_name'>
                                </div>
                                <div class="input_left">
                                    <label for="contact">Phone number <span style="color:#F00">*</span> </label>
                                    <input type="number" placeholder="Phone number" id="contact" class="form-control parsley-validated" data-required="true" name='contact'  data-maxlength="<?= CONTACT_MAX ?>" data-minlength="<?= CONTACT_MIN ?>">
                                </div>
                                <div class="input_right">
                                    <label for="email">Email <span style="color:#F00">*</span> </label>
                                    <input type="email" placeholder="Email" id="email" class="form-control parsley-validated" data-required="true" name='email'>
                                </div>

<!--                                <div class="full_ara">
                                    <label for="events_id">Issues and feedback <span style="color:#F00">*</span></label><br/>
                                    <input type="radio" name="issue" class="parsley-validated" value="event" data-required="true" id="events_id"><label for="events_id">Event</label><br>
                                    <input type="radio" name="issue" class="parsley-validated" value="project" data-required="true" id="project_id"><label for="project_id"> Project</label> <br>
                                    <input type="radio" checked="checked" name="issue" class="parsley-validated" value="other" data-required="true"  id="other_id"><label for="other_id">  Other</label> 

                                </div>-->
                                <div class="full_ara">
                                    <div id="project_drop_down" style="display: none">
                                        <div class="col-md-6 form-group">
                                            <select multiple disabled="disabled"  data-error-container="#msg_error" class="selectBox form-control parsley-validated" data-required="true" multiple="multiple"  name="projects_id" id="projects_id">

                                                <?php
                                                if (!empty($project_list)) {
                                                    for ($i = 0; $i < count($project_list); $i++) {
                                                        ?>
                                                <option title="<?=$project_list[$i]['project_title']?>" value="<?php echo $project_list[$i]['id']; ?>">
                                                        <?php if(!empty($project_list[$i]['project_title']))
                                                               { 
                                                                if (strlen($project_list[$i]['project_title']) > 55)
                                                                    {
                                                                     echo substr(strip_tags(trim($project_list[$i]['project_title'])),0,55)."...";
                                                                    }else
                                                                    {
                                                                        echo strip_tags(trim($project_list[$i]['project_title']));
                                                                    }
                                                                }  
                                                                else
                                                                  echo 'N/A';
                                                                 ?>
                                                        </option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div id="msg_error"></div>
                                        </div>
                                    </div>

                                    <div id="event_drop_down" style="display: none">
                                        <div class="col-md-6 form-group">

                                            <select  disabled="disabled" multiple  data-error-container="#msg_error_event" class="selectBox form-control parsley-validated" data-required="true" multiple="multiple"  name="event_id" id="event_id" >

                                                <?php
                                                if (!empty($event_list)) {
                                                    for ($i = 0; $i < count($event_list); $i++) {
                                                        ?>
                                                <option title="<?=$event_list[$i]['event_name']?>" value="<?php echo $event_list[$i]['id']; ?>">
                                                            <?php if(!empty($event_list[$i]['event_name']))
                                                            {
                                                                if (strlen($event_list[$i]['event_name']) > 55)
                                                                {
                                                                 echo substr(strip_tags(trim($event_list[$i]['event_name'])),0,55)."...";
                                                                }else
                                                                {
                                                                    echo strip_tags(trim($event_list[$i]['event_name']));
                                                                }
                                                            }  
                                                            else
                                                              echo 'N/A';
                                                             ?>
                                                        
                                                        </option>
                                                        <?php
                                                  }}
                                                ?>
                                            </select>
                                            <div id="msg_error_event"></div>
                                        </div>
                                    </div>
                                </div>      
                                <div class="full_ara">
                                    <label for="your_message">Your message to us</label>
                                    <textarea id="your_message" placeholder="Your message to us" class="form-control parsley-validated" name='your_message'></textarea>
                                </div>
                                <div class="full_ara">
                                    <input type="checkbox" id="be_volunteer" value='1' name='be_volunteer'> <label for="be_volunteer">Interested in volunteering with Junction Studio? <br>Please check this box and we will get in touch.</label>
                                </div>
                                <div class="full_ara">
                                    <div class="capcha">
                                        <label class="verify" for="message">Verify <span style="color:#F00">*</span> </label>
                                        <input type="hidden" name="hiddencaptcha" id="hiddencaptcha" value="<?php echo $captcha['word']; ?>">
                                        <input  data-required="true" type="text" aria-invalid="false" class="form-control" maxlength="5" size="5" value="" name="captcha" data-equalto="#hiddencaptcha">
                                    </div>   
                                    <div class="capcha_img"><?php echo $captcha['image']; ?></div>
                                </div>

                                <div class="full_ara">
                                    <input type="submit" onclick="return setdefaultdata();"  value="SEND">
                                </div>
                            </div>
                        </form>        
                    </div>
                    <div class="contact_right">
                        <div class="map">
   
                            
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3139.4835424234607!2d145.1537442148232!3d-38.10568357970053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad60cbebc4f33bd%3A0x25f0365d0e123b82!2s151+East+Rd%2C+Seaford+VIC+3198%2C+Australia!5e0!3m2!1sen!2sin!4v1457519515430" height="200" allowfullscreen></iframe>
                        </div>
                        <div class="subtital">
                            <h4>GET IN TOUCH</h4>
                        </div>
                        <div class="col1">

                            <div class="col_inn"> <!--<img alt="" src="<?=!empty($this->site_info[0]['site_logo']) && file_exists($this->config->item('image_site_logo').$this->site_info[0]['site_logo'])?$this->config->item('image_site_logo_url').$this->site_info[0]['site_logo']:$this->config->item('base_url').'images/logo.png'?>">-->
                                <div class="finfo">
                                    <span>
                                    <?=!empty($this->site_info[0]['address_line_1'])?$this->site_info[0]['address_line_1']:$this->config->item('address1')?><br>
                                    <?=!empty($this->site_info[0]['address_line_2'])?$this->site_info[0]['address_line_2']:$this->config->item('address2')?>
                                    </span>
                                </div>
                                <div class="fphone">
                                    <span>
                                     <?=!empty($this->site_info[0]['contact_no'])?$this->site_info[0]['contact_no']:$this->config->item('contact_number')?>
                                    </span>
                                </div>
                                <div class="femail">
                                    <span>
                                        <a href="mailto:<?=!empty($this->site_info[0]['email'])?$this->site_info[0]['email']:$this->config->item('contact_email')?>"><?=!empty($this->site_info[0]['email'])?$this->site_info[0]['email']:$this->config->item('contact_email')?></a>
                                    </span>
                                </div>
                                <div class="twitter">
                                    <span>
                                     <a href="<?=!empty($this->site_info[0]['twitter_link'])?$this->site_info[0]['twitter_link']:$this->config->item('twitter_profile')?>" target="_blank"> @junctionstudio</a>
                                     </span>
                                </div>
                            <div class="instagram">
                                    <span>
                                     <a href="<?=!empty($this->site_info[0]['instagram_link'])?$this->site_info[0]['instagram_link']:$this->config->item('instagram_profile')?>" target="_blank"> <i class="fa fa-instagram" aria-hidden="true"></i>   @junctionstudio</a>
                                     </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end: main--> 
</div>
<script>
$("select#projects_id").multiselect({
    multiple: false,
    selectedList: 1,
    noneSelectedText: 'Select project'
}).multiselectfilter();
$("select#event_id").multiselect({
    multiple: false,
    selectedList: 1,
    noneSelectedText: 'Select event'
}).multiselectfilter();

$('input:radio[name="issue"]').change(
        function() {

            if ($(this).is(':checked') && $(this).val() == 'project') {
                $('#event_drop_down').hide();
                $('#project_drop_down').show();

//                    $('#event_id').attr('disabled','disabled');
//                    $('#projects_id').removeAttr('disabled');

                $('#event_id').multiselect('disable');
                $('#projects_id').multiselect('enable');


            } else if ($(this).is(':checked') && $(this).val() == 'event') {

                $('#project_drop_down').hide();
                $('#event_drop_down').show();

                //$('#disable').attr('disabled','disabled');
                $('#event_id').multiselect('enable');
                $('#projects_id').multiselect('disable');


            } else if ($(this).is(':checked') && $(this).val() == 'other') {
                $('#project_drop_down').hide();
                $('#event_drop_down').hide();
            }
            $('#projects_id').multiselect('refresh');
            $('#event_id').multiselect('refresh');
            $("#contact_us_form").parsley().destroy();
            $("#contact_us_form").parsley();
        });

$(document).ready(function() {
    
     <?php 
        $msg = $this->session->flashdata('message_session'); 
        if(!empty($msg))
        {?>
            $.blockUI({message: '<span><?=$msg?></span>'});
        <?php } ?>
   
    $("#contact_us_form").parsley();
    
    setTimeout(function() {
        $.unblockUI();
    }, 8000);
});
function setdefaultdata()
{

    $('#contact_us_form').parsley('validate');
    if ($('#contact_us_form').parsley().isValid()) {
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
</script>