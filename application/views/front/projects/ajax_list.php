<?php
      if(!empty($projects))
      {
        ?>
        <div class="project-box">
        <?php 
            foreach ($projects as $row)
            {
                ?>
            
            
            <div ontouchstart="this.classList.toggle('hover');" class="flip-container">
                <div class="flipper">
                    <div class="box-con">
                        <div class="box_list1">
                            
                          <div class="front2">
                                <img src="<?= !empty($row['image'])?file_exists($this->config->item('project_img_big_path').$row['image'])?$this->config->item('project_big_img_url').$row['image']:base_url('images/no_image.jpg'):base_url('images/no_image.jpg')?>" alt="">
                            <div class="back2 overlay" id="<?=$row['id']?>">
                                <div class="box_info">
                                    <div class="tital"><?php 
                                            if(!empty($row['project_title']))
                                            {
                                                if (strlen($row['project_title']) > 34)
                                                {
                                                 echo substr(strip_tags(trim($row['project_title'])),0,34)."...";
                                                }else
                                                {
                                                    echo strip_tags(trim($row['project_title']));
                                                }
                                            }  
                                            else
                                              echo 'N/A';
                                        ?></div>
                                    <span><i class="fa fa-map-marker"></i><?= $row['location']?> </span>
                                    <a href="<?php echo base_url().'projects/details/'.$row['id'];?>" id="redirect_<?=$row['id']?>" class="read-more">Read more</a> 
                                </div>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>    
                            
                            
                            
                            
            
                <?php
            }
        ?>  
        </div>
        <input type='hidden' class='nextpage' value="<?=!empty($perpage)?($perpage):'0'?>">
        <input type='hidden' class='isload' value='true'>
        <?php 
      }
      else
      {
          ?>
            <input type='hidden' class='isload' value='false'>            
            <?php if(!empty($lazy_flag) && $lazy_flag == 1) { ?>            
            <div class="event-box" style="text-align: center; color: #fff;">No projects found.</div>
            <?php } ?>
          <?php
      }
      ?>
	  
           
<!--new flip-->
      
<!--new flip-->
