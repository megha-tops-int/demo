<div class="back_about">
<!--start: slider-->
<section class="hero-area">
  <div class="container-solid">
    <div class="page_tital">
        <h1 class="title"><?=!empty($this->about_data[(ABOUT_US_MASTER-1)]['pillar_name'])?strtoupper('Our story'):'Our story'?></h1>
    </div>
  </div>
</section>
<!--end: slider-->

<!--start: main-->
<section class="container-water middle product_detail about_main">
  <div class="container-solid">
    <div class="main-area shadow-clone">
      <div class="left_aside">
        <!--<h2 class="sub_title"> <?php echo !empty($about[0]['pillar_name'])?$about[0]['pillar_name']:''; ?></h2>-->
        <p><?php echo !empty($about[0]['description'])?$about[0]['description']:''; ?></p>
        
         
      </div>
      <div class="right_aside">
       <div class="vision-box">
           <div class="box">
              <div class="box-inside" title="<?=!empty($this->about_data[(ABOUT_US_CREATIVITY-1)]['pillar_name'])?$this->about_data[(ABOUT_US_CREATIVITY-1)]['pillar_name']:'Creativity'?>">
              <a href="<?php echo base_url('about/creativity'); ?>"><figure><img src="<?php echo $this->config->item('image_path');?>icon-creativity.png" alt=""></figure>
             <span> <?=!empty($this->about_data[(ABOUT_US_CREATIVITY-1)]['pillar_name'])?$this->about_data[(ABOUT_US_CREATIVITY-1)]['pillar_name']:'Creativity'?> </span> </a></div> 
          </div>
             <div class="box">
              <div class="box-inside" title="<?=!empty($this->about_data[(ABOUT_US_WELLBEING-1)]['pillar_name'])?$this->about_data[(ABOUT_US_WELLBEING-1)]['pillar_name']:'Wellbeing'?>">
              <a href="<?php echo base_url('about/wellbeing'); ?>"><figure><img src="<?php echo $this->config->item('image_path');?>icon-wellbeing.png" alt=""></figure>
             <span> <?=!empty($this->about_data[(ABOUT_US_WELLBEING-1)]['pillar_name'])?$this->about_data[(ABOUT_US_WELLBEING-1)]['pillar_name']:'Wellbeing'?> </span> </a></div> 
          </div>
          <div class="box">
              <div class="box-inside" title="<?=!empty($this->about_data[(ABOUT_US_LEADERSHIP-1)]['pillar_name'])?$this->about_data[(ABOUT_US_LEADERSHIP-1)]['pillar_name']:'Leadership'?>">
              <a href="<?php echo base_url('about/leadership'); ?>"><figure><img src="<?php echo $this->config->item('image_path');?>icon-leadership.png" alt=""></figure>
             <span> <?=!empty($this->about_data[(ABOUT_US_LEADERSHIP-1)]['pillar_name'])?$this->about_data[(ABOUT_US_LEADERSHIP-1)]['pillar_name']:'Leadership'?></span>  </a></div> 
          </div>
          <div class="box">
              <div class="box-inside" title="<?=!empty($this->about_data[(ABOUT_US_DIVERSITY-1)]['pillar_name'])?$this->about_data[(ABOUT_US_DIVERSITY-1)]['pillar_name']:'Diversity'?>">
              <a href="<?php echo base_url('about/diversity'); ?>"><figure><img src="<?php echo $this->config->item('image_path');?>icon-diversity.png" alt=""></figure>
            <span>  <?=!empty($this->about_data[(ABOUT_US_DIVERSITY-1)]['pillar_name'])?$this->about_data[(ABOUT_US_DIVERSITY-1)]['pillar_name']:'Diversity'?></span> </a></div> 
          </div>
          
        
       
        </div>
      </div>
        <div class="pro_detail">
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
                             if(!empty($fields_data[$i]['field_value']) && file_exists($this->config->item('about_fields_img_big_path').$fields_data[$i]['field_value'])) {
                                          ?>
                            <img width="100%" src="<?php echo $this->config->item('about_fields_big_img_url').$fields_data[$i]['field_value']?>"/>
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
</div>