
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
                                                                     if (strlen($row['event_name']) > 60)
                                                                     {
                                                                      echo substr(strip_tags(trim($row['event_name'])),0,60)."...";
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
                                                   <img alt="" src="<?= !empty($row['logo'])?file_exists($this->config->item('event_logo_img_big_path').$row['logo'])?$this->config->item('event_logo_big_img_url').$row['logo']:base_url('images/no_image.jpg'):base_url('images/no_image.jpg')?>">
                                               </span> 
                                               <span class="address"> 
                                                   <img alt="" src="<?=base_url('images/icon-event-location.png')?>"><br>
                                                    <?php echo !empty($row['location'])?substr(trim($row['location']),0,100)."...":'';?>
                                                   
                                               </span> 
                                               
                                           </div>
                                             </div>
                                            <div class="back">
                                                    <div class="box_info">
                                                        <div class="event-description">
                                                           <p>
                                                               <?php 
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
                                                            <?php echo  (!empty($row['event_date']) && $row['event_date'] != '0000-00-00')?date(COMMAN_ONLY_DATE_FORMATE_VIEW,strtotime($row['event_date'])) : ''; ?>
                                                              (
                                                            <?php echo (!empty($row['from_time']) && $row['from_time'] != '00:00:00')?date(COMMAN_TIME_FORMATE_VIEW,strtotime($row['from_time'])) : ''; ?> TO
                                                            <?php echo  (!empty($row['to_time']) && $row['to_time'] != '00:00:00')?date(COMMAN_TIME_FORMATE_VIEW,strtotime($row['to_time'])) : ''; ?>
                                                            )
                                                         </p>
                                                       </div>
                                                       <hr>
                                                       <div class="event-call-to-action">
                                                       <span>Sounds interesting?</span><a class="read-more" href="<?=base_url().'events/details/'.$row['id']?>">Find Out more</a>
                                                     </div>
                                                  </div>
                                            </div>
                                        </div>
                                 </div>
                            </div>
                         </div>       
                        <?php
                    } ?>
                     <input type='hidden' class='nextpage' value="<?=!empty($perpage)?($perpage):'0'?>">
                    <input type='hidden' class='isload' value='true'>
                <?php }
                else
                {
                    
                    ?>
                    <input type='hidden' class='isload' value='false'>
                    <?php if(!empty($lazy_flag) && $lazy_flag == 1) { ?>
                    <div class="event-box" style="text-align: center; color: #fff;">No events found.</div>
                    <?php } ?>
                    <?php
                }
                ?>
        
<!--end: main--> 