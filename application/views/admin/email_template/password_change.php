<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$this->config->item('sitename');?></title>
</head>

<body>
<div style="width:90%; height:auto; float:left; border:1px solid #EE2F2E;">

<div style="width:100%; height:auto; float:left; background:#EE2F2E; ">
<div style="width:100%; height:auto; float:left;margin:10px; color:#fff; font-weight:bold;">
<img src="<?=!empty($this->site_info[0]['site_logo']) && file_exists($this->config->item('image_site_logo').$this->site_info[0]['site_logo'])?$this->config->item('image_site_logo_url').$this->site_info[0]['site_logo']:$this->config->item('base_url').'images/logo.png'?>" title="<?=$this->config->item('sitename');?> to Attention" alt="<?=$this->config->item('sitename');?>" width="158" height="50" />
</div ><!--close logo-->
</div ><!--top head-->



<div style="width:100%; height:auto; float:left; ;">
<div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#333; line-height:25px; text-align:justify; margin:10px;">
                  <p>Hello <?=!empty($actdata['name'])?$actdata['name']:''?>,</p>
                  <p> Your password have been changed Successfully....!!!</p>
                  <p><b>Email</b>       :  <?=!empty($actdata['email'])?$actdata['email']:''?>
                  <p><b>New Password</b> : <?=!empty($actdata['password'])?$actdata['password']:''?>
                  <p><a href="<?=$actdata['loginLink'];?>">Click here</a> for login.</p>
                      			
</div><!--close peregraph content-->

</div><!--close left side-->


<div style="width:100%; height:auto; float:left; background:#EE2F2E; ">
<div style="font-family:Verdana, Geneva, sans-serif; font-size:10.5px; color:#fff; font-weight:bold; width:100%; height:auto; line-height:20px;margin:10px;">
Thank you,<br />
<?=$this->config->item('sitename');?><br />

</div><!--close title-->
</div ><!--top title-->


</div><!--close main div-->
</body>
</html>
