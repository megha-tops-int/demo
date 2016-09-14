<!--start: slider--><div class="back_terms_policies">
<section class="hero-area">
    <div class="container-solid">
        <div class="page_tital">
            <h1 class="title"><?php echo !empty($page_data[0]['page_name']) ? $page_data[0]['page_name'] : 'N/A Title'; ?></h1>
        </div>
    </div>
</section>
<!--end: slider--> 


<section class="container-water product_detail policy">
    <div class="container-solid">
        <div class="main-area shadow-clone">
<!--            <div class="page_nav">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home </a><span>/</span></li>
                    <li><?php echo !empty($page_data[0]['page_name']) ? $page_data[0]['page_name'] : 'N/A Title'; ?></li>
                </ul>
            </div>-->
            <div class="pro_detail">
<!--                <div class="subtital">
                    <h4><?php echo !empty($page_data[0]['page_name']) ? $page_data[0]['page_name'] : 'N/A Title'; ?></h4>
                </div>                -->
                <p>                  
                <?php if(!empty($page_data[0]['description']))
                         echo $page_data[0]['description'];
                       else
                         echo 'N/A';
                ?>
                </p>
            </div>
        </div>
    </div>
</section>
</div>