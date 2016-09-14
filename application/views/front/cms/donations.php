<!--end: main--> 
<script src="<?= $this->config->item('js_path') ?>front/jquery.selectric.min.js"></script>
<script src="<?= $this->config->item('js_path') ?>jquery.datetimepicker.js"></script>
<link href="<?= $this->config->item('css_path') ?>jquery.datetimepicker.css" rel="stylesheet">
<link href="<?= $this->config->item('css_path') ?>selectric.css" rel="stylesheet">
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>parsley.js"></script>
<link rel="stylesheet" href="<?= $this->config->item('css_path') ?>front/parsley.css" type="text/css">
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
<!--start: slider-->
<div class="back_donation">
<section class="hero-area">
    <div class="container-solid">
        <div class="page_tital">
            <h1 class="title">HOW CAN WE HELP?</h1>
        </div>
    </div>
</section>
<!--end: slider-->

<!--start: main-->
<section class="container-water product_detail donations">
    <div class="container-solid">
        <div class="main-area shadow-clone">
<!--            <div class="page_nav">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home </a><span>/</span></li>
                    <li>Donation requests</li>
                </ul>
            </div>-->
            <div class="pro_detail">
                <div class="right_about">
                    <div class="subtital">
                        <h4>HOW CAN WE HELP?</h4>
                    </div>
                   
                    <p>Junction Studio is excited to support individuals, community organisations and sports clubs each year through a range of different means. For us, it’s about giving back to the communities that do such a great job in supporting the Saints while contributing to a positive social legacy.</p>
                    <p> We appreciate the time you take to send us a donation request. We receive a huge number of requests each year and we will do our best to help you out. Whether your request is small or big, we welcome the chance to connect and hear about what you are doing.</p>
                    
                    <div class="subtital">
                        <h4>Please read this first!</h4>
                    </div>
                    <p>Junction Studio will consider supporting requests that:</p>
                    <ul>
                        <li>Are aligned with one or more of our quarters – diversity, leadership, wellbeing and creativity.</li>
                        <li>Generate positive social outcomes in one or more of our communities, from Port Melbourne to Portsea.</li>
                        <li>Are requested by St Kilda Football Club members or long-time supporters.</li>
                    </ul>
                    <p>We kindly ask that you direct all requests through this brief application form. Unfortunately we cannot accept personal items in the mail for signing – there are great opportunities at open training sessions and public events to get your Saints gear autographed.</p>
                    <p>If any of these dot points apply to you please fill out this form and we will get back to you within three weeks – we promise!</p>

                    <form class="form parsley-form" enctype="multipart/form-data" name="donations" id="donations" method="post" accept-charset="utf-8" action="<?= $this->config->item('base_url') ?>page/donations_inseart_data" >
                        <div class="form-group">
                            <div class="donation_form">
                                <div class="subtital grid">
                                    <h4>Your details</h4>
                                </div>
                                <div class="grid">
                                    <div class="grid_1">
                                        <label>First name <span style="color:#F00">*</span></label>
                                        <input type="text" name="first_name" placeholder="First name" class="form-control parsley-validated" id="first_name" data-required="true">
                                    </div>
                                    <div class="grid_2 no_space no_height">
                                        <label>Last name <span style="color:#F00">*</span></label>
                                        <input type="text" placeholder="Last name" name="last_name" class="form-control parsley-validated" id="last_name" data-required="true">
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="grid_1">
                                        <label id="lable_saints_member_no">Saints member number<span style="color:#F00">*</span></label>
                                        <input type="number" name="saints_member_no" id="saints_member_no" placeholder="Saints member number" class="form-control parsley-validated" data-required="true"  data-maxlength="20" >
                                        
<!--                                          <input type="number" min="0" name="saints_member_no" id="saints_member_no" placeholder="Saints member number" class="form-control parsley-validated" data-required="true" maxlength="20"  onkeypress="return limit(this,'20')">-->
                                    </div>
                                    <div class="grid_2">
                                        <label for="saints_applicable">
                                            <input type="checkbox" name="saints_applicable" id="saints_applicable" value="1" class="form-control">Not Applicable
                                        </label>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="grid_1"><label id="label_organization_name">Organisation name<span style="color:#F00">*</span></label>
                                        <input type="text" placeholder="Organisation name" name="organization_name" id="organization_name" class="form-control parsley-validated" data-required="true">
                                    </div>
                                    <div class="grid_2">
                                        <label for="organisation_applicable">
                                            <input type="checkbox" name="organisation_applicable" id="organisation_applicable" value="1" class="form-control">Not Applicable
                                        </label>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="grid_1">
                                        <label>Are you a registered charity?<span style="color:#F00">*</span></label>
                                        <select class="styled selectric" name="registered_charity"  id="registered_charity" data-required="true">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="grid">
                                    <div class="grid_1">
                                        <label>Email  <span style="color:#F00">*</span></label>
                                        <input type="email" placeholder="Email" name="email" id="email" class="form-control parsley-validated" data-required="true">
                                    </div>
                                    <div class="grid_2  no_space no_height">
                                        <label>Phone number  <span style="color:#F00">*</span></label>
<!--                                        <input type="text" placeholder="Phone number" name="phone_no" id="phone_no" class="form-control parsley-validated" data-required="true"  maxlength="<?php// CONTACT_MAX ?>" minlength="<?php // CONTACT_MIN ?>" onkeypress="return isNumberKey(event)">-->
                                        
                                        <input type="number" placeholder="Phone number" name="phone_no" id="phone_no" class="form-control parsley-validated" data-required="true"   data-minlength="<?=CONTACT_MIN?>" data-maxlength="<?=CONTACT_MAX ?>" >
                                    </div>
                                </div>

                                <div class="grid">
                                    <div class="grid_1">
                                        <label>Street <span style="color:#F00">*</span></label>
                                        <input type="text" name="street" placeholder="Street" class="form-control parsley-validated" id="street" data-required="true">
                                    </div>
                                    <div class="grid_2  no_space no_height">
                                          <label>Suburb <span style="color:#F00">*</span></label>
                                        <input type="text" name="suburb_name" placeholder="Suburb" class="form-control parsley-validated" id="suburb_name" data-required="true">
                                    </div>
                                </div>
                                
                                 <div class="grid">
                                    <div class="grid_1">
                                        <label>State<span style="color:#F00">*</span> </label>
                                        <select name="state" id="state" class="styled selectric form-control parsley-validated" data-required="true">
                                            <?php 
                                            if(!empty($state_list))
                                            {
                                                foreach($state_list as $key => $value)
                                                { 
                                                  if(!empty($value))
                                                  { ?>
                                                  <option value="<?=$key?>"><?=$value?></option>
                                                 <?php 
                                                  }
                                                }
                                            }
                                            ?>
                                            
                                            
                                        </select>
                                    </div>
                                    <div class="grid_2  no_space no_height">
                                        <label>Post code <span style="color:#F00">*</span></label>
                                        <input type="number" placeholder="Post code" name="suburb_code" class="form-control parsley-validated" id="suburb_code" data-required="true" data-maxlength="4" >
                                    </div>
                                </div>
                                
                                <div class="grid">
                                        <label id="label_your_event_date">If your application relates to an event, please tell us the date of your event<span style="color:#F00">*</span>  <br><span>(Note: we ask for minimum six week notice period)</span> </label>
                                </div>
                                <div class="grid">
                                    <div class="grid_1"> <input readonly placeholder="Date of your event" type="text" name="your_event_date" id="your_event_date" data-required="true">
                                    </div>
                                    <div class="grid_2 no_space"> <i id="event_datepiker" class="fa fa-calendar"></i>&nbsp; &nbsp; <label for="event_calander">
                                            <input type="checkbox" name="event_calander" id="event_calander" value="1" class="form-control">Not Applicable
                                        </label></div>
                                    
                                </div>
                                <div class="subtital grid">
                                    <h4>Your request</h4>
                                </div>
                                <div class="grid">
                                    <div class="grid_1">
                                        <label>We&apos;d like to get to know you. Are you a...<span style="color:#F00">*</span> </label>
                                        <select name="applicant_type" id="applicant_type" class="styled selectric form-control parsley-validated" data-required="true">
                                            <option value="1">Not for Profit Organisation</option>
                                            <option value="2">Community Organisation</option>
                                            <option value="3">For Profit Organisation</option>
                                            <option value="4">Individual</option>
                                            <option value="5">Other</option>
                                        </select>
                                    </div>
                                    <div class="grid_2" id="applicant_title_div" style="display: none;">
                                        <input type="text" name="applicant_title" id="applicant_title" disabled class="form-control parsley-validated" data-required="true" value="">
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="grid_1">
                                        <label>How can we assist?<span style="color:#F00">*</span></label>
                                        <select name="requesting" id="requesting" class="styled selectric form-control parsley-validated" data-required="true">
                                            <option value="1">Game day tickets</option>
                                            <option value="2">Giveaways</option>
                                            <option value="3">Fundraising items</option>
                                            <option value="4">Personalised letter or certificate</option>
                                            <option value="5">Other</option>
                                        </select>
                                    </div>
                                </div>  
                                
                                <!--Game day tickets start-->
                                <div id="requesting_1">  
                                    <div class="subtital grid">
                                        <h4>Game day tickets</h4>
                                        <P>Game day tickets are available for limited reserved level 1 seating at Etihad Stadium for home games and general administration tickets for all games. Tickets are always subject to availability.</P>
                                    </div>
                                    <div class="grid">
                                        <label>What game does your request relate to?<span style="color:#F00">*</span></label>
                                        <select name="game_ur_request_related_to" id="game_ur_request_related_to" class="styled selectric form-control parsley-validatedclass" data-required="true">
                                           <?php 
                                           if(!empty($game_request))
                                           { 
                                               for($i = 0; $i < count($game_request); $i++)
                                               { ?>
                                                    <option value="<?=$game_request[$i]['id']?>"><?=$game_request[$i]['title']?></option>
                                              <?php 
                                               }
                                          }            
                                         ?>
                                        </select>
                                    </div>
                                    <div class="grid">
                                        <label>How can we assist you<?=$this->lang->line('chars_max')?>?<span style="color:#F00">*</span></label>
                                        <select name="type_of_ur_request" id="type_of_ur_request" class="styled selectric form-control parsley-validatedclass" data-required="true">
                                            <option value="Reserved seating tickets (maximum group size is 10)">Reserved seating tickets (maximum group size is 10)</option>
                                            <option value="General administration tickets">General administration tickets</option>                                            
                                        </select>
                                    </div>                                    
                                    <div class="grid">
                                        <label>How many people are attending?<span style="color:#F00">*</span> </label>
                                        <input type="number" placeholder="How many people are attending?" name="people_number" id="phone_no" class="form-control parsley-validated" data-required="true"  maxlength="<?= AGE_DIGIT ?>" >
                                    </div>
                                    <div class="grid">
                                        <label>Is there anything else you want to add<?=$this->lang->line('chars_max')?>?<span style="color:#F00">*</span></label>
                                        <textarea  maxlength="<?=TEXTAREAT_MAX_LENGTH?>" rows="4" cols="50" placeholder="Is there anything else you want to add?" name="game_anything_want_to_add" id="game_anything_want_to_add" class="form-control parsley-validatedclass" data-required="true"></textarea>
                                    </div>
                                </div>    
                                <!--Game day tickets end-->
                                
                                <!--Giveaways start-->
                                <div id="requesting_2" style="display: none;">  
                                    <div class="subtital grid">
                                        <h4>Giveaways </h4>
                                        <P>Giveaway items are generally provided for community events as gifts for guests.</P>
                                    </div>
                                    <div class="grid">
                                        <label>Please describe your event. <?=$this->lang->line('chars_max')?> <span style="color:#F00">*</span></label>
                                        <textarea  maxlength="<?=TEXTAREAT_MAX_LENGTH?>" rows="4" cols="50" placeholder="Please describe your event" name="describe_ur_event" id="describe_ur_event" class="form-control parsley-validatedclass" data-required="true"></textarea>
                                    </div>
                                    <div class="grid">
                                        <label>How many people will be attending your event? <span style="color:#F00">*</span></label>
                                        <select name="how_many_people_attending_event" id="how_many_people_attending_event" class="styled selectric form-control parsley-validatedclass" data-required="true">
                                            <option value="Under 20">Under 20</option>
                                            <option value="Between 21-50">Between 20-50</option>
                                            <option value="Over 50">Over 50</option>
                                            
                                        </select>
                                    </div>
                                    <div class="grid">
                                        <div class="grid_1">
                                            <label>What are the items you wish to receive? <span style="color:#F00">*</span></label>
<!--                                            <select multiple="multiple"  name="wish_item_receive[]" id="wish_item_receive" class="selectBox form-control parsley-validatedclass" data-required="true" >
                                                <option value="Jumpers (will be charged at cost price)">Jumpers (will be charged at cost price)</option>
                                                <option value="Footballs (will be charged at cost price)">Footballs (will be charged at cost price)</option>
                                                <option value="Posters">Posters</option>
                                                <option value="Stickers">Stickers</option>
                                                <option value="Game day tickets">Game day tickets</option>
                                                <option value="Other">Other</option>
                                            </select>-->
                                       <label for="jumpers">
                                           <input type="checkbox" disabled name="wish_item_receive[]" id="jumpers" value="Jumpers (will be charged at cost price)" class="form-control group_checkbox" data-mincheck="1" data-error-container="#error_msg_div">2016 Signed Guernsey (charged at cost - $65 each)
                                       </label>
                                       <label for="footballs">
                                            <input type="checkbox" disabled name="wish_item_receive[]" id="footballs" value="Footballs (will be charged at cost price)" class="form-control group_checkbox">Junior Footballs (charged at cost - $15 each)
                                       </label></br>
                                       <label for="posters">
                                            <input type="checkbox" disabled name="wish_item_receive[]" id="posters" value="Posters" class="form-control group_checkbox">Posters
                                       </label></br>
                                       <label for="stickers">
                                            <input type="checkbox" disabled name="wish_item_receive[]" id="stickers" value="Stickers" class="form-control group_checkbox">Stickers
                                       </label></br>
                                       <label for="game_day_tickets">
                                            <input type="checkbox" disabled name="wish_item_receive[]" id="game_day_tickets" value="Game day tickets" class="form-control group_checkbox">Game day tickets
                                       </label></br>
                                       <label for="other_receive">
                                            <input type="checkbox" disabled name="wish_item_receive[]" id="other_receive" value="Other" class="form-control group_checkbox_other">Other
                                       </label>
                                            <div id="error_msg_div"></div>     
                                       
                                        </div>
                                        <div id="wish_item_receive_div" style="display:none;"> 
                                            <div class="grid_2">
                                                <input type="text" disabled="disabled" name="wish_item_receive_value" placeholder="Other Value" id="wish_item_receive_value" class="form-control parsley-validatedclass" data-required="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid">
                                        <label>Is there anything else you want to add, such as the quantity of giveaways you need<?=$this->lang->line('chars_max')?>?<span style="color:#F00">*</span></label>
                                        <textarea  maxlength="<?=TEXTAREAT_MAX_LENGTH?>" rows="4" cols="50" placeholder="Is there anything else you want to add, such as the quantity of giveaways you need?" name="giveaways_anything_want_to_add" id="giveaways_anything_want_to_add" class="form-control parsley-validatedclass" data-required="true"></textarea>
                                    </div>
                                </div>  
                                <!--Giveaways end-->
                                
                                <!--Fundraising items start-->
                                <div id="requesting_3" style="display: none;">  
                                    <div class="subtital grid">
                                        <h4>Fundraising items </h4>
                                        <P>Fundraising items will be provided at cost and must be used by the recipient to raise funds for a community cause.</P>
                                    </div>
                                    <div class="grid">
                                        <label>What item do you wish to receive?<span style="color:#F00">*</span></label>
                                        <select name="merchandise_do_u_wish_receive" id="merchandise_do_u_wish_receive" class="styled selectric form-control parsley-validatedclass" data-required="true">
                                            <option value="2016 Signed Guernsey (charged at cost - $65 each)">2016 Signed Guernsey (charged at cost - $65 each)</option>
                                            <option value="2016 Print Signed Team Poster (charged at cost- $10 each)">2016 Print Signed Team Poster (charged at cost - $10 each)</option>
                                        </select>
                                    </div>
                                    <div class="grid">                                        
                                        <label>What cause are you raising money for<?=$this->lang->line('chars_max')?>?<span style="color:#F00">*</span></label>
                                        <textarea  maxlength="<?=TEXTAREAT_MAX_LENGTH?>" placeholder="What cause are you raising money for?" rows="4" cols="50" name="what_case_raising_money" id="what_case_raising_money" class="form-control parsley-validatedclass" data-required="true"></textarea>
                                    </div>
                                    <div class="grid">
                                        <label>Is there anything else you want to add<?=$this->lang->line('chars_max')?>?<span style="color:#F00">*</span></label>
                                        <textarea maxlength="<?=TEXTAREAT_MAX_LENGTH?>" placeholder="Is there anything else you want to add?" rows="4" cols="50" name="merchandise_anything_want_to_add" id="merchandise_anything_want_to_add" class="form-control parsley-validatedclass" data-required="true"></textarea>
                                    </div>
                                </div>
                                <!--Fundraising items end-->
                                
                                <!--Personalised letter, card or certificate start-->
                                <div id="requesting_4" style="display: none;">  
                                    <div class="subtital grid">
                                        <h4>Personalised letter or certificate</h4>
                                        <P>These items are generally provided to members or supporters to mark a special occasion or achievement, to wish our best for an upcoming adventure or for offering our condolences.</P>
                                    </div>
                                    <div class="grid">
                                        <div class="grid_1">
                                            <label>Please tell us about the occasion?<span style="color:#F00">*</span></label>
                                            <select name="occasion" id="occasion" class="styled selectric form-control parsley-validatedclass" data-required="true">
                                                <option value="Birthday">Birthday</option>
                                                <option value="Congratulations">Congratulations</option>
                                                <option value="Get well">Get well</option>
                                                <option value="Best wishes">Best wishes</option>
                                                <option value="Condolence">Condolence</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div id="occasion_textbox_div" style="display:none;">
                                            <div class="grid_2">
                                                <input type="text" disabled name="occasion_count" placeholder="Other Value" id="occasion_count" class="form-control parsley-validatedclass" data-required="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid">
                                        
                                        <div class="grid_1">
                                            <label>Who would you like the letter or certificate to be made out to?<span style="color:#F00">*</span></label>
                                        </div>
                                       
                                        </div>
                                        <div class="grid">
                                        <div class="grid_1">
                                             <input type="text" placeholder="First name" name="occasion_first_name" id="occasion_first_name" placeholder="First name" class="form-control parsley-validatedclass" data-required="true">
                                        </div>    
                                        <div class="grid_1"><input type="text" name="occasion_last_name" id="occasion_last_name"  placeholder="Last name" class="form-control parsley-validatedclass" data-required="true"></div>
                                        <div class="grid_1"><input type="number" name="occasion_age" id="occasion_age"  placeholder="Age" class="form-control parsley-validatedclass" data-required="true" data-maxlength="<?= AGE_DIGIT ?>"></div>
                                    </div>                                    
                                    <div class="grid">
                                        
                                        <label id="label_certificate_applicable">Who would you like the letter or certificate signed by?<span style="color:#F00">*</span></label>
                                       
                                        
                                        </div>
                                        <div class="grid">
                                            <div class="grid_1">
                                        <select name="card_signed_by" id="card_signed_by" class="styled selectric form-control parsley-validatedclass" data-required="true">
                                            <option value="Coach">Coach</option>
                                            <option value="CEO">CEO</option>
                                            <option value="Player">Player</option>                                            
                                        </select>
                                            </div>
                                            <div class="grid_1">
                                            <label for="certificate_applicable" class="certificate_lab">
                                                 <input type="checkbox" name="certificate_applicable" id="certificate_applicable" value="1" class="form-control">Not Applicable
                                            </label>
                                            </div>
                                        </div>
                                    
                                    <div class="grid">
                                        <label>Is there anything else you want to add<?=$this->lang->line('chars_max')?>?<span style="color:#F00">*</span></label>
                                        <textarea  maxlength="<?=TEXTAREAT_MAX_LENGTH?>" rows="4" cols="50" placeholder="Is there anything else you want to add?" name="personalised_anything_want_to_add" id="personalised_anything_want_to_add" class="form-control parsley-validatedclass" data-required="true"></textarea>
                                    </div>
                                </div>
                                <!--Personalised letter, card or certificate end-->
                                
                                <!--Other start-->
                                <div id="requesting_5" style="display: none;">
                                    <div class="subtital grid">
                                        <h4>Other</h4>
                                    </div>
                                    <div class="grid">
                                        <label>Please tell us a little bit about your request<?=$this->lang->line('chars_max_CASE')?>.<span style="color:#F00">*</span></label>
                                        <textarea  maxlength="<?=TEXTAREAT_MAX_LENGTH_CASE?>" rows="4" cols="50" placeholder="Please tell us a little bit about your request."  name="other_type_anything_want_to_add" id="other_type_anything_want_to_add" class="form-control parsley-validatedclass" data-required="true"></textarea>
                                    </div>
                                </div>  
                                <!--Other end-->
                                
                                <div class="grid">
                                    <input type="submit" value="SEND" onclick="return setdefaultdata();"  >
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end: main--> 

<!--start: main-->
<div class="container-water project-list">
    <div class="container-solid">
        <div class="page-main">
            <div class="project-box">

                <?php
                if (!empty($projects)) {
                    foreach ($projects as $row) {
                        ?>              
                        <div ontouchstart="this.classList.toggle('hover');" class="flip-container">
                            <div class="flipper">
                                <div class="box-con">
                                    <div class="box_list">
                                        <div class="front">
                                            <div class="tital">
                                                <?php
                                                if (!empty($row['project_title'])) {
                                                    if (strlen($row['project_title']) > 50) {
                                                        echo substr(strip_tags(trim($row['project_title'])), 0, 50) . "...";
                                                    } else {
                                                        echo strip_tags(trim($row['project_title']));
                                                    }
                                                }
                                                else
                                                    echo 'N/A';
                                                ?>
                                            </div>
                                            <img src="<?= !empty($row['image']) ? file_exists($this->config->item('project_img_big_path') . $row['image']) ? $this->config->item('project_big_img_url') . $row['image'] : base_url('images/no_image.jpg')  : base_url('images/no_image.jpg') ?>" alt="">
                                        </div>
                                        <div class="back">
                                            <div class="box_info">
                                                <p>
                                                    <?php
                                                    if (!empty($row['description'])) {
                                                        if (strlen($row['description']) > 210) {
                                                            echo substr(strip_tags(trim($row['description'])), 0, 210) . "...";
                                                        } else {
                                                            echo strip_tags(trim($row['description']));
                                                        }
                                                    }
                                                    else
                                                        echo 'N/A';
                                                    ?>
                                                </p>
                                                <span><i class="fa fa-map-marker"></i><?= $row['location'] ?></span> <a href="<?php echo base_url() . 'projects/details/' . $row['id']; ?>" class="read-more">Read more</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>          
                        <?php
                    }
                }
                ?>  
            </div>
        </div>
    </div>
</div>

</div>
<script type="text/javascript">

$(document).ready(function()
{
     <?php $msg = $this->session->flashdata('message_session'); 
     if(!empty($msg)){?> $.blockUI({message: '<span><?=$msg?></span>'}); <?php } ?>
     setTimeout(function() { $.unblockUI(); }, 8000);
            
            
 setTimeout(function() {
        $('#div_msg').fadeOut('slow');
    }, 10000);
    
    for (var j = 1; j <= 6; j++)
    {
        if (j == 1)
        {
            $('#requesting_' + j).show();
            $('#requesting_' + j).find(':input[type=text]').prop('disabled', false);
            $('#requesting_' + j).find('textarea').prop('disabled', false);
            $('#requesting_' + j).find('input[type=number]').prop('disabled', false);
        }
        else
        {
            $('#requesting_' + j).hide();
            $('#requesting_' + j).find(':input[type=text]').prop('disabled', true);
            $('#requesting_' + j).find('textarea').prop('disabled', true);
            $('#requesting_' + j).find('input[type=number]').prop('disabled', true);
        }
    }

   $('#donations').parsley();
   $('select.selectric').selectric();
});

$(function()
{
   // $('select .selectric').selectric();

    $('#your_event_date').datetimepicker({
        locale: 'ru',
        minDate: 0,
        timepicker: false,
        format: '<?= COMMAN_DATE_FORMATE_JS ?>',
    });
});

$("#requesting").change(function()
{
    var requesting_id = $(this).val();

    for (var i = 1; i <= 6; i++)
    {
        if (requesting_id == i)
        {
            $('#requesting_' + i).show();
            $('#requesting_' + i).find(':input[type=text]').prop('disabled', false);
            $('#requesting_' + i).find('textarea').prop('disabled', false);
            $('#requesting_' + i).find('input[type=checkbox]').prop('disabled', false);
            $('#requesting_' + i).find('input[type=number]').prop('disabled', false); 
        }
        else
        {
            $('#requesting_' + i).hide();
            $('#requesting_' + i).find(':input[type=text]').prop('disabled', true);
            $('#requesting_' + i).find('textarea').prop('disabled', true);
            $('#requesting_' + i).find('input[type=checkbox]').prop('disabled', true);
            $('#requesting_' + i).find('input[type=number]').prop('disabled', true);

        }
    }
    $('#occasion_textbox_div').find('#occasion_count').prop('disabled', true); // special case 
    $('#wish_item_receive_div').find('#wish_item_receive_value').prop('disabled', true); // special case 
    
    $("#donations").parsley().destroy();
    $("#donations").parsley();
});

$("#applicant_type").change(function()
{
    var applicant_type = $(this).val();
    if (applicant_type == 5)
    {
        $('#applicant_title_div').show();
        $('#applicant_title_div').find('#applicant_title').prop('disabled', false);
    }
    else
    {
        $('#applicant_title_div').hide();
        $('#applicant_title_div').find('#applicant_title').prop('disabled', true);
    }
      $("#donations").parsley().destroy();
    $("#donations").parsley();
});

$("#event_datepiker").click(function() 
{
    $("#your_event_date").datetimepicker("show");
});

function setdefaultdata()
{
    $('#donations').parsley('validate');
    if ($('#donations').parsley().isValid()) {
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

$("#other_receive").click(function()
{
   if(this.checked) 
   {
        $('#wish_item_receive_div').show();
        $('#wish_item_receive_div').find('#wish_item_receive_value').prop('disabled', false);
    }
    else
    {
        $('#wish_item_receive_div').hide();
        $('#wish_item_receive_div').find('#wish_item_receive_value').prop('disabled', true);
    }
      $("#donations").parsley().destroy();
    $("#donations").parsley();
    
});
$("#occasion").change(function()
{
     var occasion_type = $(this).val();
    if (occasion_type == 'Other')
    {
        $('#occasion_textbox_div').show();
        $('#occasion_textbox_div').find('#occasion_count').prop('disabled', false);
    }
    else
    {
        $('#occasion_textbox_div').hide();
        $('#occasion_textbox_div').find('#occasion_count').prop('disabled', true);
    }
      $("#donations").parsley().destroy();
    $("#donations").parsley();
});
$("#saints_applicable").click(function()
{
   if(this.checked) 
   {
        
        $('#lable_saints_member_no').text('Saints member number');
        $('#saints_member_no').prop('disabled', true);
         $('#saints_member_no').val('');
    }
    else
    {
        
        $('#lable_saints_member_no').html('Saints member number <span style="color:#F00">*</span>');
        $('#saints_member_no').prop('disabled',false);
    }
    $("#donations").parsley().destroy();
    $("#donations").parsley();
    
});
$("#organisation_applicable").click(function()
{
   if(this.checked) 
   {
        
        $('#label_organization_name').text('Organisation name');
        $('#organization_name').prop('disabled', true);
        $('#organization_name').val('');
    }
    else
    {
        
        $('#label_organization_name').html('Organisation name <span style="color:#F00">*</span>');
        $('#organization_name').prop('disabled',false);
    }
    $("#donations").parsley().destroy();
    $("#donations").parsley();
    
});
$("#event_calander").click(function()
{
   if(this.checked) 
   {
        
        $('#label_your_event_date').text('If your application relates to an event, please tell us the date of your event');
        $('#your_event_date').prop('disabled', true);
        $('#your_event_date').val('');
    }
    else
    {
        
        $('#label_your_event_date').html('If your application relates to an event, please tell us the date of your event<span style="color:#F00">*</span>  <br><span>(Note: we ask for minimum six week notice period)');
        $('#your_event_date').prop('disabled',false);
    }
    $("#donations").parsley().destroy();
    $("#donations").parsley();
    
});
//function limit(element,max_chars)
//{
//   // var max_chars = 2;
//
//    if(element.value.length > max_chars) {
//        //element.value = element.value.substr(0, max_chars);
//        alert(element.value);
//        return false;
//        
//    }
//}

$("#certificate_applicable").click(function()
{
   if(this.checked) 
   {
        
        $('#label_certificate_applicable').text('Who would you like the letter or certificate signed by ? ');
        $('#card_signed_by').prop('disabled', true).selectric('refresh');
        $('#card_signed_by').val('');
    }
    else
    {
        
        $('#label_certificate_applicable').html('Who would you like the letter or certificate signed by ? <span style="color:#F00">*</span>');
        $('#card_signed_by').prop('disabled',false).selectric('refresh');
    }

    $("#donations").parsley().destroy();
    $("#donations").parsley();
    
});
</script>