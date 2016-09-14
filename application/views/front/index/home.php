<!--start: slider-->
<div class="home_back">
<div class="hero-area">

    <div class="container-solid">

        <div class="main-slider-area"> 



            <!--Slider 1--> 

            <div class="slider-video"> 
<img src="images/welcome.png" alt="">
                <?php
                if (!empty($youtube_video_list[0]['video_url'])) {

                    //$youtube_link_code = explode('v=', $youtube_video_list[0]['video_url']);
                    
//                    $step1=explode('v=', $youtube_video_list[0]['video_url']);
//                    $step2 =explode('&',$step1[1]);
//                    $youtube_link_code = $step2[0];
                    
                    if(preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $youtube_video_list[0]['video_url'], $matches))
                    {
                        $youtube_link_code = $matches[1];
                    }
                    else
                    {
                        $youtube_link_code = '';
                    }


                    if (!empty($youtube_link_code)) {
                        ?>

        <!--            <source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">

                        <source src="http://techslides.com/demos/sample-videos/small.ogv" type="video/ogg">-->

                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/<?=($youtube_link_code) ?>?rel=0" frameborder="0" allowfullscreen></iframe>

        <?php
    }
}
?>



            </div>
            
          <!--  <div class="logo_welcom"><img src="images/logo_home.png" alt=""></div>-->



        </div>

    </div>

</div>
</div>
<!--end: slider--> 