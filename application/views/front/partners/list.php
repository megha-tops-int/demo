<!--start: slider-->
<div class="back_partner">
<section class="hero-area">
    <div class="container-solid">
        <div class="page_tital">
            <h1 class="title">OUR PARTNERS</h1>
        </div>
    </div>
</section>
<!--end: slider--> 

<!--start: main-->
<section class="container-water product_detail">
    <div class="container-solid" >
        <div class="main-area shadow-clone">
<!--            <div class="page_nav">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home </a><span>/</span></li>
                    <li>Partners</li>
                </ul>
            </div>-->
           
            <div class="pro_detail">
             <div class="subtital">
                        <!--<h4>THANK YOU</h4>-->
                    </div>
                    <p>We'd like to extend a huge thank you to our partners for joining us on our journey to create thriving communities.</p>
                <?php
                if (!empty($partners)) {
                    ?>
                    <div class="partners_box">
                        <?php
                        foreach ($partners as $row) 
                        {
                            ?>
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front front-none">
                                        <div class="part_box">
                                            <div class="box_content">
                                                    <a href="<?php echo base_url('partners/details').'/'.$row['id']; ?>" title="<?php echo $row['website']; ?>"><img title="<?php echo $row['partner_name']; ?>" src="<?= !empty($row['logo']) ? file_exists($this->config->item('partners_img_big_path') . $row['logo']) ? $this->config->item('partners_big_img_url') . $row['logo'] : base_url('images/no_image.jpg') : base_url('images/no_image.jpg') ?>" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="back">
                                        <p title="<?php echo !empty($row['partner_name'])?$row['partner_name']:'N/A'; ?>"><?php echo !empty($row['partner_name'])?$row['partner_name']:'N/A'; ?></p>
                                        <?php if(!empty($row['website']) && $row['website']!=''){ ?>
                                        
                                        <?php } ?>                                        
                                    </div>-->
                                </div>
                            </div>
                            <?php
                        }
                        ?> 
                    </div>
                        <?php
                    } else {
                        ?>
                    <div class="no_found">No partners found</div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</section>
<!--end: main--> </div>