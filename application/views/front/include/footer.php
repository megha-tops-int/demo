<!--start: footer-->
<footer class="container-water main_footer">
  <div class="container-solid">
    <div class="footer_section">
        
        <div class="col1">
        <div class="col_inn">
          <div class="maintital">
            <h5>General</h5>
          </div>
          <ul class="general_list">
            <li><a href="<?php echo base_url().'about'; ?>" title="<?=!empty($this->about_data[(ABOUT_US_MASTER-1)]['pillar_name'])? 'Our story' :'Our story'?>"><i class="fa fa-plus"></i><?=!empty($this->about_data[(ABOUT_US_MASTER-1)]['pillar_name'])?'Our story':'Our story'?></a></li>
            <li><a href="<?php echo base_url().'projects'; ?>" title="What we do"><i class="fa fa-plus
"></i>What we do</a></li>
            <li><a href="<?php echo base_url().'partners'; ?>"  title="Our partners"><i class="fa fa-plus
"></i>Our partners</a></li>
            <li><a href="<?php echo base_url().'donations'; ?>" title="How can we help?"><i class="fa fa-plus
"></i>How can we help?</a></li>
<!--            <li><a href="<?php echo base_url().'events'; ?>" title="What's on"><i class="fa fa-plus
"></i>What's on</a></li>-->
            <li><a href="<?php echo base_url().'contact_us'; ?>" title="Get in touch"><i class="fa fa-plus
"></i>Get in touch</a></li>
          </ul>
        </div>
      </div>
        
      <div class="col1">
        <div class="col_inn">
          <div class="maintital">
            <h5>GET IN TOUCH</h5>
          </div>
         <!-- <img src="<?=!empty($this->site_info[0]['site_logo']) && file_exists($this->config->item('image_site_logo').$this->site_info[0]['site_logo'])?$this->config->item('image_site_logo_url').$this->site_info[0]['site_logo']:$this->config->item('base_url').'images/logo.png'?>" alt="">-->
          <div class="finfo"><span><?=!empty($this->site_info[0]['address_line_1'])?$this->site_info[0]['address_line_1']:$this->config->item('address1')?><br/>
            <?=!empty($this->site_info[0]['address_line_2'])?$this->site_info[0]['address_line_2']:$this->config->item('address2')?></span></div>
          <div class="fphone"><span><?=!empty($this->site_info[0]['contact_no'])?$this->site_info[0]['contact_no']:$this->config->item('contact_number')?></span></div>
          <div class="femail"><span><a href="mailto:<?=!empty($this->site_info[0]['email'])?$this->site_info[0]['email']:$this->config->item('contact_email')?>" title="Email"><?=!empty($this->site_info[0]['email'])?$this->site_info[0]['email']:$this->config->item('contact_email')?></a></span></div>
        </div>
      </div>
        
        <div class="col1">
        <div class="col_inn">
          <div class="maintital">
            <h5>follow us</h5>
          </div>
            <ul class="social">
                
                <li><a href="<?=!empty($this->site_info[0]['instagram_link'])?$this->site_info[0]['instagram_link']:$this->config->item('instagram_profile')?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="<?=!empty($this->site_info[0]['twitter_link'])?$this->site_info[0]['twitter_link']:$this->config->item('twitter_profile')?>" title="Twitter" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            </ul>
        </div>
      </div>
        
      <div class="col1">
        <div class="col_inn">
          <div class="maintital">
            <h5>the fineprint</h5>
          </div>
          <ul>
            <li>
                <a href="<?php echo base_url().'terms-and-conditions'; ?>" title="<?=!empty($this->contant[(TERMS_CONDITIONS-1)]['page_name'])?ucfirst(strtolower($this->contant[(TERMS_CONDITIONS-1)]['page_name'])):'Terms & conditions'?>"><i class="fa fa-plus
"></i><?=!empty($this->contant[(TERMS_CONDITIONS-1)]['page_name'])?$this->contant[(TERMS_CONDITIONS-1)]['page_name']:'Terms & conditions'?>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url().'privacy-policies'; ?>" title="<?=!empty($this->contant[(PRIVACY_POLICY-1)]['page_name'])?$this->contant[(PRIVACY_POLICY-1)]['page_name']:'Privacy & policies'?>"><i class="fa fa-plus
"></i><?=!empty($this->contant[(PRIVACY_POLICY-1)]['page_name'])?ucfirst(strtolower($this->contant[(PRIVACY_POLICY-1)]['page_name'])):'Privacy & policies'?>
               </a>
            </li>
          </ul>
        </div>
      </div>
      
    </div>
  </div>
  <div class="copyright">Copyright <?php echo date('Y'); ?> <?php echo $this->config->item('sitename');?>. All rights reserved.</div>
</footer>

<!--end: footer--> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?= $this->config->item('js_path') ?>jquery.blockUI.js"></script> 

<script src="<?= $this->config->item('js_path') ?>front/slick.min.js"></script> 
<script src="<?= $this->config->item('js_path') ?>front/custom.js"></script>
<script src="<?= $this->config->item('js_path') ?>front/Omniture_v0.1.js"></script>
<script>
$(document).ready(function()
{
    BP_SC.afl.reportingBeacon('BP|Sport|AFL|AFL Clubs|St Kilda Saints|Junction Studio|Home'); 
    BP_SC.afl.reportingBeacon('BP|Sport|AFL|AFL Clubs|St Kilda Saints|Junction Studio|Page Name'); 
    BP_SC.afl.reportingBeacon('BP|Sport|AFL|AFL Clubs|St Kilda Saints|Junction Studio|Page Name'); 
    BP_SC.afl.reportingBeacon('BP|Sport|AFL|AFL Clubs|St Kilda Saints|Junction Studio|Page Name');
});
</script>
<!--Telstra footer code start-->

<!--googleoff:index--><div id="bphf-bottom"><div id="tmx-footer" role="region" data-src-nrl="//media.telstra.com.au/global_footer/nrl.html" data-src-afl="//media.telstra.com.au/global_footer/afl.html"><div id="tmx-search-f" class="tmx-search"><form id="tmx-search-form-f" class="tmx-form" action="//search.media.telstra.com.au" method="get" title="Web search by Google"><fieldset class="tmx-fieldset"><input name="location" type="hidden" value=""><input name="searchIndex" type="hidden" value="australia"><input name="partnerid" type="hidden" value="bigpond"><input id="tmx-search-input-f" class="tmx-input" name="find" type="text" value="" data-alert="Please enter a valid search query"><span class="tmx-default"> <svg class="tmx-i-google"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$this->config->item('bphf_path')?>/res/svg/sprite.svg#tm-svg-google"></use></svg></span><button id="tmx-search-go-f" class="tmx-submit" role="button">Search<span class="tmx-arrow"><span class="tmx-arrow-inner"></span></span></button></fieldset></form></div><span class="mcnamf" title="728x90"></span><div class="tmx-wrap"><ul class="tmx-menu tmx-left" role="menu"><li class="tmx-item section" role="menuitem"><a class="tmx-web tmx-visible-xs" href="http://media.telstra.com.au/web.html?ref=Net-Footer-Web">Web</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-my tmx-visible-xs" href="http://m.bigpond.com/mpm/">My</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-contactus" href="https://www.telstra.com.au/contact-us">Get in touch</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-onlinesecurity" href="https://www.telstra.com.au/privacy/online-safety?ref=Net-Footer-Online-Security">Online Security</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-telstramediaprivacy" href="http://www.telstra.com.au/privacy/privacy-statement/?ref=Net-Footer-Corp-Privacy">Telstra Media Privacy</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-termsofuse" href="http://media.telstra.com.au/terms-of-use.html?ref=Net-Footer-Corp-Terms">Terms of Use</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-copyrighttrademark" href="http://www.telstra.com.au/terms-of-use/?ref=Net-Footer-Corp-CopyTM#IntellectualProperty">Copyright &amp; Trademark</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-advertisewithus" href="http://www.mcn.com.au/Channels/?ref=Net-Footer-Corp-Advertise">Advertise with us</a></li>

</ul><ul class="tmx-menu tmx-right" role="menu"><div class="tmx-tmedia section"><a href="http://media.telstra.com.au/?ref=Net-footer-medialogo"><svg role="img" class="tmediasvg"><title>Telstra Media</title><use class="tmediasvg" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#tmx-svg-tmedia"></use></svg></a></div>

</ul></div></div></div><!--googleon:index--><div id="bphf-stat"><script src="<?=$this->config->item('bphf_path')?>/res/js/tmhf.src.2.0.min.js"></script><!-- bphfOVIS --></div>


<!--Telstra footer code end-->
</body>
</html>