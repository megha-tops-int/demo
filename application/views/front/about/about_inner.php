<?php 
$slug_str = $this->uri->segment(2);
$class_name ='back_about';
if(!empty($slug_str) && $slug_str == 'creativity')
{
    $class_name = 'creativity_back';
}else if(!empty($slug_str) && $slug_str == 'wellbeing')
{
    $class_name = 'wellbeing_back';
}else if(!empty($slug_str) && $slug_str == 'leadership')
{
    $class_name = 'leadership_back';
}else if(!empty($slug_str) && $slug_str == 'diversity')
{
    $class_name = 'diversity_back';
}
?>
<div class="<?=$class_name?>">
<!--start: slider-->
<section class="hero-area">
  <div class="container-solid">
    <div class="page_tital">
<!--        <h1 class="title"><?php echo !empty($about_inner[0]['pillar_name'])?strtoupper($about_inner[0]['pillar_name']):''; ?></h1>-->
    </div>
  </div>
</section>
<!--end: slider--> 

<!--start: main-->
<section class="container-water product_detail about">
  <div class="container-solid" >
    <div class="main-area shadow-clone about_inner_box_width">
<!--       <div class="page_nav">
        <ul>
          <li><a href="<?php echo base_url(); ?>">Home </a><span>/</span></li>
          <li><?=!empty($this->about_data[(ABOUT_US_MASTER-1)]['pillar_name'])?$this->about_data[(ABOUT_US_MASTER-1)]['pillar_name']:'About'?></li>
        </ul>
      </div>-->
    <div class="about_boxOuter">
        
            <?php 
            if(!empty($slug_str) && $slug_str == 'creativity')
            { ?>
                <div class="about_pic"><img src="<?=  base_url()?>images/creativityg-pic.png" alt=""></div>
                <div class="about_inner_tital"><img src="<?=  base_url()?>images/creativity_text.png" alt=""></div>
            <?php 
            }else if(!empty($slug_str) && $slug_str == 'wellbeing')
            { ?>
                <div class="about_pic"><img src="<?=  base_url()?>images/wellbeing-pic.png" alt=""></div>
                <div class="about_inner_tital"><img src="<?=  base_url()?>images/wellbeing_text.png" alt=""></div>
            <?php 
            }else if(!empty($slug_str) && $slug_str == 'leadership')
            { ?>
                <div class="about_pic"><img src="<?=  base_url()?>images/leadership-pic.png" alt=""></div>
                <div class="about_inner_tital"><img src="<?=  base_url()?>images/leadership_text.png" alt=""></div>
            <?php 
            
            }else if(!empty($slug_str) && $slug_str == 'diversity')
            { ?>
                <div class="about_pic"><img src="<?=  base_url()?>images/diversity-pic.png" alt=""></div>
                <div class="about_inner_tital"><img src="<?=  base_url()?>images/diversity_text.png" alt=""></div>
            <?php 
            }
            ?>
    </div>
    
    
   
      <div class="pro_detail">
        <div class="left_about"> 
            
             <a title="<?=!empty($this->about_data[(ABOUT_US_CREATIVITY-1)]['pillar_name'])?$this->about_data[(ABOUT_US_CREATIVITY-1)]['pillar_name']:'Creativity'?>" href="<?php echo base_url('about/creativity'); ?>" class="<?php if(!empty($about_inner[0]['slug']) && $about_inner[0]['slug'] == 'creativity') { echo "active"; } ?>"><img src="<?php echo $this->config->item('image_path');?>/small_icon2.png" alt=""><span><?=!empty($this->about_data[(ABOUT_US_CREATIVITY-1)]['pillar_name'])?$this->about_data[(ABOUT_US_CREATIVITY-1)]['pillar_name']:'Creativity'?></span> <i class="fa fa-caret-right"></i></a> 
              <a title="<?=!empty($this->about_data[(ABOUT_US_WELLBEING-1)]['pillar_name'])?$this->about_data[(ABOUT_US_WELLBEING-1)]['pillar_name']:'Wellbeing'?>" href="<?php echo base_url('about/wellbeing'); ?>" class="<?php if(!empty($about_inner[0]['slug']) && $about_inner[0]['slug'] == 'wellbeing') { echo "active"; } ?>"><img src="<?php echo $this->config->item('image_path');?>/small_icon3.png" alt=""><span><?=!empty($this->about_data[(ABOUT_US_WELLBEING-1)]['pillar_name'])?$this->about_data[(ABOUT_US_WELLBEING-1)]['pillar_name']:'Wellbeing'?></span> <i class="fa fa-caret-right"></i></a> 
          
            <a title="<?=!empty($this->about_data[(ABOUT_US_LEADERSHIP-1)]['pillar_name'])?$this->about_data[(ABOUT_US_LEADERSHIP-1)]['pillar_name']:'Leadership'?>" href="<?php echo base_url('about/leadership'); ?>" class="<?php if(!empty($about_inner[0]['slug']) && $about_inner[0]['slug'] == 'leadership') { echo "active"; } ?>"><img src="<?php echo $this->config->item('image_path');?>/small_icon4.png" alt=""><span><?=!empty($this->about_data[(ABOUT_US_LEADERSHIP-1)]['pillar_name'])?$this->about_data[(ABOUT_US_LEADERSHIP-1)]['pillar_name']:'Leadership'?></span> <i class="fa fa-caret-right"></i></a> 
              <a title="<?=!empty($this->about_data[(ABOUT_US_DIVERSITY-1)]['pillar_name'])?$this->about_data[(ABOUT_US_DIVERSITY-1)]['pillar_name']:'Diversity'?>" href="<?php echo base_url('about/diversity'); ?>" class="<?php if(!empty($about_inner[0]['slug']) && $about_inner[0]['slug'] == 'diversity') { echo "active"; } ?>"><img src="<?php echo $this->config->item('image_path');?>/small_icon1.png" alt=""><span><?=!empty($this->about_data[(ABOUT_US_DIVERSITY-1)]['pillar_name'])?$this->about_data[(ABOUT_US_DIVERSITY-1)]['pillar_name']:'Diversity'?></span> <i class="fa fa-caret-right"></i></a>
           
        </div>
        <div class="right_about">
<!--          <div class="subtital">
            <h4><?php echo !empty($about_inner[0]['pillar_name'])?$about_inner[0]['pillar_name']:''; ?></h4>
          </div>          -->
            <p><?php echo !empty($about_inner[0]['description'])?$about_inner[0]['description']:''; ?></p>
        </div>
          
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

<!--start: main-->
<div class="container-water project-list">
    <div class="container-solid">
        <div class="page-main">
            <div class="project-box">

                <?php
                $projects ='';
                
                if (!empty($projects)) {
                    foreach ($projects as $row) {
                        ?>
                <div ontouchstart="this.classList.toggle('hover');" class="flip-container">
                <div class="flipper">
                    <div class="box-con">
                        <div class="box_list">
                            
                           <div class="front">
                                <img src="<?= !empty($row['image']) ? file_exists($this->config->item('project_img_big_path') . $row['image']) ? $this->config->item('project_big_img_url') . $row['image'] : base_url('images/no_image.jpg') : base_url('images/no_image.jpg') ?>" alt="">
                            </div>
                            <div class="back">
                                <div class="box_info">
                                    <div class="tital"> <?php
                                                    if (!empty($row['project_title'])) {
                                                        if (strlen($row['project_title']) > 34) {
                                                            echo substr(strip_tags(trim($row['project_title'])), 0, 34) . "...";
                                                        } else {
                                                            echo strip_tags(trim($row['project_title']));
                                                        }
                                                    }
                                                    else
                                                        echo 'N/A';
                                                    ?></div>
                                    <span><i class="fa fa-map-marker"></i><?= $row['location'] ?></span>
                                    <a href="<?php echo base_url() . 'projects/details/' . $row['id']; ?>" class="read-more">Read more</a> 
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
<!--end: main--> 
</div>