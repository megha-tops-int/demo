<div class="back_projects_detail">
<!--start: slider-->
<section class="hero-area">
    <div class="container-solid">
        <div class="page_tital">
            <h1 class="title"><?php echo!empty($partners_details[0]['partner_name']) ? $partners_details[0]['partner_name'] : ''; ?></h1>
        </div>
    </div>
</section>
<!--end: slider-->

<!--start: main-->
<section class="container-water product_detail">
    <div class="container-solid">
        <div class="main-area shadow-clone">
<!--            <div class="page_nav">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home </a><span>/</span></li>
                    <li><a href="">Projects </a><span>/</span></li>
                    <li></li>
                </ul>
            </div>-->

            <div class="pro_detail">
         
      <!--      new code-->
            
            
            
  <!--              <div class="subtital">
                    <h4><?php echo!empty($partners_details[0]['project_title']) ? $partners_details[0]['project_title'] : ''; ?></h4>
                </div>-->
<!--                <p> 
                    <img src="<?= !empty($partners_details[0]['logo']) ? file_exists($this->config->item('partners_img_big_path') . $partners_details[0]['logo']) ? $this->config->item('partners_big_img_url') . $partners_details[0]['logo'] : base_url('images/no_image.jpg') : base_url('images/no_image.jpg') ?>" alt="" class="right_img"> 
                </p>-->
                <p><?php echo!empty($partners_details[0]['description']) ? $partners_details[0]['description'] : ''; ?></p>
                
                <p style="clear:both;">
                <?php   if(!empty($fields_data))
                        {
                            for($i=0; $i < count($fields_data); $i++)
                            { 
                                if($fields_data[$i]['field_type'] == '1')
                                { 
                ?>
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
                        <?php   }
                                else if($fields_data[$i]['field_type'] == '2')
                                { 
                        ?>
                                    <div class="">
                                        <p><?php echo !empty($fields_data[$i]['field_value'])?$fields_data[$i]['field_value']:''; ?></p>
                                    </div>
                        <?php   }
                                else if($fields_data[$i]['field_type'] == '3')
                                { 
                        ?>
                          <div class="">
                                <?php   if(!empty($fields_data[$i]['field_value']) && file_exists($this->config->item('project_fields_img_big_path').$fields_data[$i]['field_value'])) 
                                        {
                                ?>
                                <img width="100%" src="<?php echo $this->config->item('project_fields_big_img_url').$fields_data[$i]['field_value']?>"/>
                                <?php   }
                                        else
                                        {
                                ?>
                                            <img  width="100%" title="News Image" src="<?php echo $this->config->item('image_path')."/no_image.jpg" ?>"/>
                                <?php                                       
                                        } 
                                ?>
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
<?php /* ?><div class="container-water project-list">
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
                                            <img src="<?= !empty($row['image']) ? file_exists($this->config->item('project_img_big_path') . $row['image']) ? $this->config->item('project_big_img_url') . $row['image'] : base_url('images/no_image.jpg') : base_url('images/no_image.jpg') ?>" alt="">
                                        </div>
                                        <div class="back">
                                            <div class="box_info">
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
</div><?php */ ?>
<!--end: main--> 
</div>