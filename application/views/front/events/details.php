<div class="back_event_detail">
<!--start: slider-->

<section class="hero-area">
  <div class="container-solid">
    <div class="page_tital">
      <h1 class="title"><?=!empty($event_details[0]['event_name'])?$event_details[0]['event_name']:'';?></h1>
    </div>
  </div>
</section>
<!--end: slider--> 

<!--start: main-->
<section class="container-water product_detail">
  <div class="container-solid" >
    <div class="main-area shadow-clone">
      <div class="page_nav">
        <ul>
          <li><a href="<?=base_url();?>">Home </a><span>/</span></li>
          <li><a href="<?=base_url().'events';?>">Events </a><span>/</span></li>
          <li><?=!empty($event_details[0]['event_name'])?$event_details[0]['event_name']:'';?></li>
        </ul>
      </div>
      <div class="pro_detail">

<div class="event_detail">
  <div class="event_logo"> <img alt="" src="<?= !empty($event_details[0]['logo'])?file_exists($this->config->item('event_logo_img_big_path').$event_details[0]['logo'])?$this->config->item('event_logo_big_img_url').$event_details[0]['logo']:base_url('images/no_image.jpg'):base_url('images/no_image.jpg')?>"></div>
  <div class="event_location"> <p><span>Location:</span>
                 <?=!empty($event_details[0]['location'])?$event_details[0]['location']:'';?></p></div>
  <div class="event_date"><p><span>Date and Time:</span>
                  <?php echo  (!empty($event_details[0]['event_date']) && $event_details[0]['event_date'] != '0000-00-00 00:00:00')?date(COMMAN_ONLY_DATE_FORMATE_VIEW,strtotime($event_details[0]['event_date'])) : ''; ?>
                 (
        <?php echo (!empty($event_details[0]['from_time']) && $event_details[0]['from_time'] != '00:00:00')?date(COMMAN_TIME_FORMATE_VIEW,strtotime($event_details[0]['from_time'])) : ''; ?> TO
        <?php echo  (!empty($event_details[0]['to_time']) && $event_details[0]['to_time'] != '00:00:00')?date(COMMAN_TIME_FORMATE_VIEW,strtotime($event_details[0]['to_time'])) : ''; ?>
                                                            )   
      </p></div>
</div>




        <div class="subtital">
          <h4><?=!empty($event_details[0]['event_name'])?$event_details[0]['event_name']:'';?></h4>
        </div>
          <p>
              <img alt=""  class="right_img" src="<?= !empty($event_details[0]['image'])?file_exists($this->config->item('event_img_big_path').$event_details[0]['image'])?$this->config->item('event_big_img_url').$event_details[0]['image']:base_url('images/no_image.jpg'):base_url('images/projects1.png')?>">
          <?php if(!empty($event_details[0]['description']))
                   echo $event_details[0]['description'];
                 else
                   echo 'N/A';
                   ?>
          </p>
          
        
        
<!--        <div class="three_box_outer" style="clear:both">
        <div class="three_box"><div class="box_content">&nbsp;</div></div>
        <div class="three_box"><div class="box_content">&nbsp;</div></div>
        <div class="three_box"><div class="box_content">&nbsp;</div></div>


        <div class="two_box"><div class="box_content">&nbsp;</div></div>
        <div class="two_box"><div class="box_content">&nbsp;</div></div>


        <div class="one_box"><div class="box_content">&nbsp;</div></div>


        </div>-->
         <p style="clear:both;">
              <?php if(!empty($fields_data))
                    {
                  for($i=0; $i < count($fields_data); $i++)
                  { 
                      if($fields_data[$i]['field_type'] == '1')
                     { ?>
                        <div class="">
                            <label for="url" class="text-center">
                                <?php 
                                    //$youtube_link_code = explode('v=', $fields_data[$i]['field_value']);  
                                    if(preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $fields_data[$i]['field_value'], $matches))
                                    {
                                        $youtube_link_code = $matches[1];
                                    }
                                    else
                                    {
                                        $youtube_link_code = '';
                                    }
                                ?>
                                        <iframe  width="100%" height="300px" src="https://www.youtube.com/embed/<?php echo $youtube_link_code; ?>?rel=0&fs=1" frameborder="0" allowfullscreen></iframe>
                            </label>
                            
                        </div>
                     <?php }else if($fields_data[$i]['field_type'] == '2')
                     { ?>
                        
                        <div class="">
                            <p><?php echo !empty($fields_data[$i]['field_value'])?$fields_data[$i]['field_value']:''; ?></p>
                            
                        </div>
                    <?php }else if($fields_data[$i]['field_type'] == '3')
                    { ?>
                        <div class="">
                            <?php 
                             if(!empty($fields_data[$i]['field_value']) && file_exists($this->config->item('event_fields_img_big_path').$fields_data[$i]['field_value'])) {
                                          ?>
                            <img width="100%" src="<?php echo $this->config->item('event_fields_big_img_url').$fields_data[$i]['field_value']?>"/>
                                    <?php }else{ ?>
                                    <img  width="100%" title="News Image" src="<?php echo $this->config->item('image_path')."/no_image.jpg" ?>"/>
                                    <?php } ?>
                            
                        </div>
                    <?php }?>
                    
              <?php }} ?>
              
              
      </p>


      </div>
    </div>
  </div>
</section>
<!--end: main--> 

<!--start: main-->
<div class="container-water project-list">
  <div class="container-solid">
    <div class="page-main">
      <div class="event-box">
          
           <?php
                if(!empty($events))
                {
                    //pr($events);exit;
                    foreach ($events as $row)
                    {
                        ?>
             <div ontouchstart="this.classList.toggle('hover');" class="flip-container">
          <div class="flipper">
            <div class="box-con">
              <div class="box_list">
                <div class="front">
                  <div class="tital"> 
                      <?php 
                      
                        if(!empty($row['event_name']))
                        {
                            if (strlen($row['event_name']) > 50)
                            {
                             echo substr(strip_tags(trim($row['event_name'])),0,50)."...";
                            }else
                            {
                                echo strip_tags(trim($row['event_name']));
                            }
                        }  
                        else
                          echo 'N/A';
                         ?>
                       
                  </div>
                 <img alt="" src="<?= !empty($row['image'])?file_exists($this->config->item('event_img_big_path').$row['image'])?$this->config->item('event_big_img_url').$row['image']:base_url('images/no_image.jpg'):base_url('images/projects1.png')?>">
                  <hr>
                  <div class="event-location"> 
                      <span class="logo">  
                          <img alt="" src="<?= !empty($row['logo'])?file_exists($this->config->item('event_logo_img_big_path').$row['logo'])?$this->config->item('event_logo_big_img_url').$row['logo']:base_url('images/no_image.jpg'):base_url('images/no_image.jpg')?>"></span> 
                      <span class="address"> 
                          <img alt="" src="<?=base_url('images/icon-event-location.png')?>"><br>
                          <?php echo !empty($row['location'])?$row['location']:'';?>
                      </span> 
                  </div>
                </div>
                <div class="back">
                  <div class="box_info">
                    <div class="event-description">
                      <p><?php 
                      
                        if(!empty($row['description']))
                        {
                            if (strlen($row['description']) > 210)
                            {
                             echo substr(strip_tags(trim($row['description'])),0,210)."...";
                            }else
                            {
                                echo strip_tags(trim($row['description']));
                            }
                        }  
                        else
                          echo 'N/A';
                         ?>
                      </p>
                    </div>
                    <hr>
                    <div class="location_detail">
                      <p>
                          <span>Organize by:</span><br>
                          <?php echo !empty($row['organizer'])?$row['organizer']:'';?>
                      </p>
                      <p>
                          <span>Date and Time:</span><br>
                          <?php echo  (!empty($row['event_date']) && $row['event_date'] != '0000-00-00 00:00:00')?date(COMMAN_ONLY_DATE_FORMATE_VIEW,strtotime($row['event_date'])) : ''; ?>
                          (
                    <?php echo (!empty($row['from_time']) && $row['from_time'] != '00:00:00')?date(COMMAN_TIME_FORMATE_VIEW,strtotime($row['from_time'])) : ''; ?> TO
                    <?php echo  (!empty($row['to_time']) && $row['to_time'] != '00:00:00')?date(COMMAN_TIME_FORMATE_VIEW,strtotime($row['to_time'])) : ''; ?>                 )
                      </p>
                    </div>
                    <hr>
                    <div class="event-call-to-action">
                      <p><span>Sounds Intresting?</span><a class="read-more" href="<?=base_url().'events/details/'.$row['id']?>">Find Out more</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
                <?php }} ?>
      </div>
    </div>
  </div>
</div>
<!--end: main--> 
</div>