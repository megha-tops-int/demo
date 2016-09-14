<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<!--<title>Welcome To <?php //echo $this->config->item('sitename');?></title>-->
<?php if(!empty($seo_title_meta)){ ?>
<title><?php echo !empty($seo_title_meta[0]['meta_title']) ? $seo_title_meta[0]['meta_title'] : 'Welcome To '.$this->config->item('sitename'); ?></title>
<meta name="keywords" content="<?php echo !empty($seo_title_meta[0]['meta_keyword'])?$seo_title_meta[0]['meta_keyword']:''?>">
<meta name="description" content="<?php echo !empty($seo_title_meta[0]['meta_description'])?$seo_title_meta[0]['meta_description']:''?>">
<?php }else{ ?>
<title>Welcome To <?php echo $this->config->item('sitename');?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<?php } ?>

<!-- Favicon Icon -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/icon">

<!-- CSS -->
<link href="<?=$this->config->item('css_path')?>front/main.css" rel="stylesheet">
<link href="<?=$this->config->item('css_path')?>front/depmain.css" rel="stylesheet">
<link href="<?=$this->config->item('css_path')?>front/font-awesome.css" rel="stylesheet">
<script src="<?= $this->config->item('js_path') ?>front/jquery-1.7.2.min.js"></script> 
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!--Telstra script code start-->
<script src="<?=$this->config->item('bphf_path')?>res/js/modernizr.custom.64012.js" async></script>
<script>var tmxh={path:'<?=$this->config->item('bphf_path')?>/res/js/tmhf.src.2.0.min.js',load:function(func){'use strict';var t={};t.wload=window.onload;if(typeof window.onload!=='function'){window.onload=func}else{window.onload=function(){if(t.wload){t.wload()}func()}}},tmx:function(){'use strict';var t={};if(typeof tmx==='undefined'){t.body=document.getElementsByTagName('body')[0];t.script=document.createElement('script');t.script.setAttribute('src',tmxh.path);t.body.appendChild(t.script)}},init:function(){'use strict';this.load(this.tmx)}};try{tmxh.init()}catch(ignore){}</script>
<script src="//assets.adobedtm.com/b115bc50b73a685b73a5ec23570f976910498851/satelliteLib-e77072e2e4da7eea0556fdc8c500cab830c90752.js"></script>
<link rel="stylesheet" href="<?=$this->config->item('bphf_path')?>/res/css/tmhf.src.2.0.min.css"/>
<!--[if lte IE 8]><link rel="stylesheet" href="/bphf/res/css/tmhf.src.ie.min.css"/><![endif]--><!--[if IE]><![endif]-->
<!--Telstra script code end-->

</head>
<body>

<!--Telstra header code start-->

<!--googleoff:index-->
<div id="bphf-top"><svg style="display:none;"><symbol viewBox="77 287.6 765 218.4" id="tmx-svg-tmedia"> <title>tmedia</title> <g> <g> <path class="tmedia-text" d="M435.5,441.8c-4.1,0-8.1-2.6-8.1-7.6V332.8l-27.4,63c-1.5,4.1-5,5.5-8.7,5.5c-4.1,0-7-2-9.1-5.5l-27.9-63v101.5c0,5-4.1,7.6-8.1,7.6s-8.1-2.6-8.1-7.6v-129c0-5.5,2-9.1,9.1-9.1h0.6c5.5,0,8.1,3,9.1,6.1l33.5,74.5l33-74.5c2-3,4.5-6.1,10.2-6.1h0.6c7,0,9.1,3.5,9.1,9.1v129C443.5,439.3,439.5,441.8,435.5,441.8z"/> <path class="tmedia-text" d="M547.1,440.8h-65c-4.1,0-8.1-3.5-8.1-8.1V305.3c0-4.1,3.5-8.1,8.1-8.1h65c5.5,0,8.1,4.1,8.1,8.1c0,4.1-2.6,8.1-8.1,8.1h-57.3v45.7h39.5c5,0,8.1,4.1,8.1,8.1c0,4.1-2.6,8.1-8.1,8.1h-39.5v50.3h57.3c5.5,0,8.1,4.1,8.1,8.1C554.8,437.3,552.6,440.8,547.1,440.8z"/> <path class="tmedia-text" d="M622.1,440.8h-33.5c-4.1,0-8.1-3.5-8.1-8.1V305.3c0-4.1,3.5-8.1,8.1-8.1h33.5c21.8,0,39,17.7,39,39v65C661.3,423.6,644,440.8,622.1,440.8z M646.1,336.8c0-13.2-10.2-23.8-23.3-23.8h-25.9V425h25.9c13.2,0,23.8-10.7,23.8-23.8v-64.4L646.1,336.8L646.1,336.8z"/> <path class="tmedia-text" d="M699,441.8c-4.1,0-8.1-2.6-8.1-7.6v-130c0-5,4.1-8.1,8.1-8.1s8.1,2.6,8.1,8.1v130.4C706.3,439.3,702.5,441.8,699,441.8z"/> <path class="tmedia-text" d="M822.5,441.8c-3,0-6.1-1.5-7.6-5.5l-9.1-30h-51.2l-9.1,30c-0.9,4.1-4.1,5.5-7,5.5c-4.5,0-8.1-3.5-8.1-7.6c0-0.6,0-1.5,0.6-2.6l40.5-130c0.9-4.1,5-5.5,9.1-5.5c4.5,0,8.1,2,9.7,5.5l40.5,129.9c0,0.9,0.6,2,0.6,2.6C830.8,438.8,827.1,441.8,822.5,441.8z M780,324.6l-20.8,66.5h41.1L780,324.6z"/> </g> <path class="tmedia-circle" fill="currentColor" d="M205.1,385.4l-7.6,45.7c-1.5,8.1-7,10.7-11.7,10.7h-36l15.2-83.7c-15.2-7-30.5-11.7-43.1-11.7c-11.7,0-21.3,3-27.4,10.7c-5,5.5-7,12.2-7,19.8c0,23.8,18.7,56.8,50.7,83.7c28.4,23.8,59.9,37,83.3,37c11.7,0,20.8-3.5,26.9-10.7c4.5-5.5,6.6-12.2,6.6-20.3C254.3,444.3,235.7,411.8,205.1,385.4z"/> <g> <path class="tmedia-t" d="M140.7,296.6c-6.1,0-10.7,3.5-12.2,9.7l-5,27.4h45.1l-19.2,107.5h36c4.5,0,10.2-2,11.7-10.7l16.7-96.9h32.5c5.5,0,10.7-4.1,11.7-9.7l5-28L140.7,296.6L140.7,296.6z"/></g></g></symbol></svg><div id="tmx-skip"><a href="#tmx-content">Skip to main content</a></div><div id="tmx-header"><div id="tmx-global"><div class="tmx-wrap"><ul class="tmx-menu tmx-left" role="menu"><li class="tmx-item section" role="menuitem"><a class="tmx-telstracom" href="https://www.telstra.com.au/?ref=TM-Header-TELSTRA">Telstra.com</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-personal" href="https://www.telstra.com.au/personal?ref=TM-Header-TPERSONAL">Personal</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-smallbusiness" href="https://www.telstra.com.au/small-business?ref=TM-Header-TSBUSINESS">Small Business</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-businessenterprise" href="https://www.telstra.com.au/business-enterprise?ref=TM-Header-TBUSINESS">Business &amp; Enterprise</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-health" href="https://www.telstra.com.au/telstra-health?ref=TM-Header-THEALTH">Health</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-aboutus" href="https://www.telstra.com.au/aboutus?ref=TM-Header-ABOUTUS">About Us</a></li>
</ul><ul class="tmx-menu tmx-right" role="menu"><li class="tmx-item section" role="menuitem"><a class="tmx-contactus" href="https://www.telstra.com.au/contact-us">Contact Us</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-account" href="https://signon.bigpond.com/login?goto=https://my.bigpond.com/mybigpond/default.do&ref=Net-Header2-MyBigPond"><svg role="img"><title>My Account</title><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$this->config->item('bphf_path')?>/res/svg/sprite.svg#tm-svg-account"></use></svg></a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-webmail" href="https://signon.bigpond.com/login?site=chw&goto=http://messaging.bigpond.com/&ref=Net-Header2-Webmail"><svg role="img"><title>Webmail</title><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$this->config->item('bphf_path')?>/res/svg/sprite.svg#tm-svg-webmail"></use></svg></a></li>
</ul></div></div><div id="tmx-network"><div class="tmx-wrap"><div class="tmx-tmedia"><div class="tmx-tmedia section"><a href="http://media.telstra.com.au/home.html?ref=Net-Header2-medialogo"><svg role="img" class="tmediasvg"><title>Telstra Media</title><use class="tmediasvg" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#tmx-svg-tmedia"></use></svg></a></div>
</div><div id="tmx-narrow" role="region"><ul class="tmx-menu-mobile" role="menu"><li class="tmx-item section" role="menuitem"><a class="tmx-search"><svg role="img"><title>Search</title><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$this->config->item('bphf_path')?>/res/svg/sprite.svg#tm-svg-search"></use></svg></a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-webtab" href="http://media.telstra.com.au/web.html"><svg role="img"><title>Web</title><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$this->config->item('bphf_path')?>/res/svg/sprite.svg#tm-svg-webtab"></use></svg></a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-account" href="http://m.bigpond.com/mpm/"><svg role="img"><title>My Account</title><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$this->config->item('bphf_path')?>/res/svg/sprite.svg#tm-svg-account"></use></svg></a></li>
</ul></div><div id="tmx-wide" role="region"><ul class="tmx-menu" role="menu"><li class="tmx-item section" role="menuitem"><a class="tmx-skynews" href="http://www.skynews.com.au/news.html?ref=Net-Header2-skynews">Sky News</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-afl" href="http://www.afl.com.au/?ref=Net-Header2-AFL">AFL</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-nrl" href="http://www.nrl.com/?ref=Net-Header2-NRL">NRL</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-sportsfan" href="http://www.sportsfan.com.au/Default.aspx?ref=Net-Header2-Sportsfan">SportsFan</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-applemusic" href="https://www.telstra.com.au/applemusic?ref=Net-Header2-APPLEMUSIC">Apple Music</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-lifestyle" href="http://www.lifestyle.com.au/?ref=Net-Header2-LifeStyle">Lifestyle</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-foxtel" href="https://www.telstra.com.au/tv-movies-music/products/foxtel-from-telstra?ref=Net-Header2-foxtel">Foxtel</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-movies" href="http://bigpondmovies.com/?ref=Net-Header2-movies">Movies</a></li>
</ul><div id="tmx-menu-aside" class="tmx-menu-aside"><ul class="tmx-menu-list tmx-right" role="menu"><li class="tmx-item section" role="menuitem"><a class="tmx-bigpondhaschanged" href="http://media.telstra.com.au/new_bigpond.html?ref=Net-Footer-BigPondhaschanged">BigPond Has Changed</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-mobilefoxtel" href="https://www.telstra.com.au/tv-movies-music/products/entertainment-on-the-move?ref=Net-Header2-mobilefoxtel">Mobile Foxtel</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-smarterbusinessideas" href="https://smarter.telstra.com.au/?ref=Net-Header-SmarterBusiness">Smarter Business Ideas</a></li>
</ul></div></div><div id="tmx-menu-aside-mobile" class="tmx-menu-aside"><ul class="tmx-menu-list" role="menu"><li class="tmx-item section" role="menuitem"><a class="tmx-skynews" href="http://www.skynews.com.au/news.html?ref=Net-Header2-skynews">Sky News</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-afl" href="http://www.afl.com.au/?ref=Net-Header2-AFL">AFL</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-nrl" href="http://www.nrl.com/?ref=Net-Header2-NRL">NRL</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-sportsfan" href="http://www.sportsfan.com.au/Default.aspx?ref=Net-Header2-Sportsfan">SportsFan</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-applemusic" href="https://www.telstra.com.au/applemusic?ref=Net-Header2-APPLEMUSIC">Apple Music</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-lifestyle" href="http://www.lifestyle.com.au/?ref=Net-Header2-LifeStyle">Lifestyle</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-foxtel" href="https://www.telstra.com.au/tv-movies-music/products/foxtel-from-telstra?ref=Net-Header2-foxtel">Foxtel</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-movies" href="http://bigpondmovies.com/?ref=Net-Header2-movies">Movies</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-bigpondhaschanged" href="http://media.telstra.com.au/new_bigpond.html?ref=Net-Footer-BigPondhaschanged">BigPond Has Changed</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-mobilefoxtel" href="https://www.telstra.com.au/tv-movies-music/products/entertainment-on-the-move?ref=Net-Header2-mobilefoxtel">Mobile Foxtel</a></li>
<li class="tmx-item section" role="menuitem"><a class="tmx-smarterbusinessideas" href="https://smarter.telstra.com.au/?ref=Net-Header-SmarterBusiness">Smarter Business Ideas</a></li>
<!--/**/--></ul></div><div id="tmx-search-h" class="tmx-search"><form id="tmx-search-form-h" class="tmx-form" action="//search.media.telstra.com.au" method="get" title="Web search by Google"><fieldset class="tmx-fieldset"><input name="location" type="hidden" value=""><input name="searchIndex" type="hidden" value="australia"><input name="partnerid" type="hidden" value="bigpond"><input id="tmx-search-input-h" class="tmx-input" name="find" type="text" value="" data-alert="Please enter a valid search query"><span class="tmx-default"><svg class="tmx-i-search"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$this->config->item('bphf_path')?>/res/svg/sprite.svg#tm-svg-search"></use></svg><svg class="tmx-i-google"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$this->config->item('bphf_path')?>/res/svg/sprite.svg#tm-svg-google"></use></svg></span>
</fieldset></form></div><div id="tmx-searchbut" class="tmx-search-ptab"><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$this->config->item('bphf_path')?>res/svg/sprite.svg#tm-svg-search"></use></svg></div><div id="tmx-trigger" class="tmx-trigger tmx-icon"><span></span><span></span><span></span></div></div></div></div><div id="tmx-slist"><div class="tmx-slists section">
<span class="tmx-slist-data" data-afl="afl.com.au,afc.com.au,lions.com.au,carltonfc.com.au,collingwoodfc.com.au,deezone.com.au,essendonfc.com.au,fremantlefc.com.au,geelongcats.com.au,goldcoastfc.com.au,gwsgiants.com.au,hawthornfc.com.au,melbournefc.com.au,nmfc.com.au,portadelaidefc.com.au,richmondfc.com.au,saints.com.au,sydneyswans.com.au,westcoasteagles.com.au,westernbulldogs.com.au,dreamteam.afl.com.au,tipping.afl.com.au,smartreplay.afl.com.au,best22.afl.com.au,aflmembership.com.au,saintsafl.co.nz,fremantlemembers.pub.black.sumodojo.com,draftmachine.afl.com.au,drafttracker.afl.com.au,19thman.com.au,membership.lions.com.au,membership.carltonfc.com.au,membership.collingwoodfc.com.au,membership.essendonfc.com.au,membership.fremantlefc.com.au,membership.geelongcats.com.au,goldcoastfcmembership.com.au,membership.gwsgiants.com.au,membership.hawthornfc.com.au,membership.melbournefc.com.au,membership.kangaroos.com.au,weareportadelaide.com.au,membership.richmondfc.com.au,saintsmembership.com.au,membership.sydneyswans.com.au,wcemembership.com.au,membership.westernbulldogs.com.au,sydneyswanshospitality.com.au,markoftheyear.afl.com.au,goaloftheyear.afl.com.au,rewards.lions.com.au,rewards.essendonfc.com.au,test.com.au,mod.afl.com.au,mod.afc.com.au,mod.lions.com.au,mod.carltonfc.com.au,mod.collingwoodfc.com.au,mod.essendonfc.com.au,mod.fremantlefc.com.au,mod.geelongcats.com.au,mod.goldcoastfc.com.au,mod.hawthornfc.com.au,mod.melbournefc.com.au,mod.nmfc.com.au,mod.portadelaidefc.com.au,mod.richmondfc.com.au,mod.saints.com.au,mod.sydneyswans.com.au,mod.westcoasteagles.com.au,mod.westernbulldogs.com.au,mod.m.afl.com.au,fantasy.afl.com.au,membership.nmfc.com.au,mod.gwsgiants.com.au,eyeonthechamps.hawthornfc.com.au" data-nrl="nrl.com,broncos.com.au,bulldogs.com.au,raiders.com.au,cowboys.com.au,titans.com.au,seaeagles.com.au,melbournestorm.com.au,newcastleknights.com.au,parraeels.com.au,penrithpanthers.com.au,sharks.com.au,rabbitohs.com.au,dragons.com.au,roosters.com.au,warriors.kiwi,weststigers.com.au,qrl.com.au,nswrl.com.au,rloc.com.au,tipping.nrl.com,dreamteam.nrl.com,dreamteamfinals.nrl.com,nrl.trunk.cfour.com.au,stage.nrl.com,membership.stage.nrl.com,newtest.com.au,qa.skynews.com.au,qa.melbournestorm.com.au,qa.parraeels.com.au"></span></div>
</div></div><a id="tmx-content" name="tmx-content">Main content</a><!--googleon:index-->

<!--Telstra header code end-->
    
<!--start: header-->
<header class="container-water main-header">
    <div class="container-solid">         
    <!-- res-navigtion start-->
    <div class="res_box"><span><img src="<?php echo base_url().'images/nav_icon.png'; ?>" alt="Nav icon"></span></div>
    <div class="res-logo"><a href="<?php echo base_url(); ?>"><img src="<?=!empty($this->site_info[0]['site_logo']) && file_exists($this->config->item('image_site_logo').$this->site_info[0]['site_logo'])?$this->config->item('image_site_logo_url').$this->site_info[0]['site_logo']:$this->config->item('base_url').'images/logo.png'?>" alt="<?php echo $this->config->item('sitename');?>"></a></div>
    
    <!-- res-navigtion end-->
    <nav class="main-navigation">
            <div title="Junction Studio" class="logo"><a href="<?php echo base_url(); ?>"><img src="<?=!empty($this->site_info[0]['site_logo']) && file_exists($this->config->item('image_site_logo').$this->site_info[0]['site_logo'])?$this->config->item('image_site_logo_url').$this->site_info[0]['site_logo']:$this->config->item('base_url').'images/logo.png'?>" alt="<?php echo $this->config->item('sitename');?>"></a></div>
      <ul class="man_ul">

<!--        <li title="<?=!empty($this->about_data[(ABOUT_US_MASTER-1)]['pillar_name'])?$this->about_data[(ABOUT_US_MASTER-1)]['pillar_name']:'About'?>" <?php if($this->uri->segment(1)=='about'){?> class="active" <?php } ?>><a href="<?php echo base_url().'about'; ?>"><?=$this->about_data[(ABOUT_US_MASTER-1)]['pillar_name']?></a></li>-->
        <li title="<?=!empty($this->about_data[(ABOUT_US_MASTER-1)]['pillar_name'])? 'Our story' :'Our story'?>" <?php if($this->uri->segment(1)=='about'){?> class="active" <?php } ?>><a href="<?php echo base_url().'about'; ?>">Our story</a></li>
        <li title="What we do" <?php if($this->uri->segment(1)=='projects'){?> class="active" <?php } ?>><a href="<?php echo base_url().'projects'; ?>">What we do</a></li>
        <li title="Our partners" <?php if($this->uri->segment(1)=='partners'){?> class="active" <?php } ?>><a href="<?php echo base_url().'partners'; ?>">Our partners</a></li>
        
      
        
        <li title="How can we help?" <?php if($this->uri->segment(1)=='donations'){?> class="active" <?php } ?>><a href="<?php echo base_url().'donations'; ?>">How can we help?</a></li>
        <!--<li title="What's On" <?php if($this->uri->segment(1)=='events'){?> class="active" <?php } ?>><a href="<?php echo base_url().'events'; ?>">What's On</a></li>-->
        <li  title="Get in touch" <?php if($this->uri->segment(1)=='contact_us'){?> class="active" <?php } ?>><a href="<?php echo base_url().'contact_us'; ?>">Get in touch</a></li>
      </ul>
    </nav>
  </div>
</header>
<!--end: header--> 