<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Junction Studio</title>
        <style>

            body{margin:0px; padding:0px; background:url(<?= base_url() . 'images/mailer_image/splash-image.png' ?>) no-repeat fixed center top / cover ; }
            h1 { margin: 0; padding: 0; font-family:Arial, Helvetica, sans-serif; font-size:20px; line-height:25px; color:#575757; }
            .information{font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px; color:#575757; text-align:left;  border: 1px solid #ccc; 
                         padding:5px;}

            @media only screen and (min-width:481px) and (max-width:599px) {
                table[class="em_main_table"] { width: 100% !important; text-align: center !important; }
                table[class="em_wrapper"] { width: 100% !important; }
                td[class="em_spacer"] { width: 10px !important; }
                td[class="em_title"] { font-size: 24px !important; line-height: 36px !important; }
                td[class="em_hide"], table[class="em_hide"], span[class="em_hide"], br[class="em_hide"] { display: none !important; width: 0px; max-height: 0px; overflow: hidden; }
                img[class="em_full_img"] { width: 100% !important; height: auto !important; }
                img[class="em_full_img1"] { width: 45% !important; height: auto !important; }
                img[class="em_full_img1"] { width: 37% !important; height: auto !important; text-align:center }
                td[class="em_txt_center"] { text-align: center !important; }
            }

            /*Stylesheed for the devices width between 0px to 480px*/
            @media only screen and (max-width:480px) {
                table[class="em_main_table"] { width: 100% !important; background-image: none !important; }
                table[class="em_wrapper"] { width: 100% !important; }
                td[class="em_spacer"] { width: 10px !important; }
                td[class="em_hide"], table[class="em_hide"], span[class="em_hide"], br[class="em_hide"] { display: none !important; width: 0px; max-height: 0px; overflow: hidden; }

                img[class="em_full_img1"] { width: 45% !important; height: auto !important; }
                img[class="em_full_img1"] { width: 37% !important; height: auto !important; text-align:center !important; }
                td[class="em_title"] { font-size: 20px !important; line-height: 36px !important; }
                td[class="em_height"] { height: 30px !important; }
                td[class="em_txt_center"] { text-align: center !important; }
            }
        </style>

    </head>
    <?php
    $address = !empty($this->site_info[0]['address_line_1']) ? $this->site_info[0]['address_line_1'] : $this->config->item('address1');
    $address .= ' ' . !empty($this->site_info[0]['address_line_2']) ? ', ' . $this->site_info[0]['address_line_2'] : ',' . $this->config->item('address2');
    $contact_no = !empty($this->site_info[0]['contact_no']) ? $this->site_info[0]['contact_no'] : $this->config->item('contact_number');
    $email = !empty($this->site_info[0]['email']) ? $this->site_info[0]['email'] : $this->config->item('contact_email');
    $site_name = $this->config->item('sitename');

    $instagram_link = !empty($this->site_info[0]['instagram_link']) ? $this->site_info[0]['instagram_link'] : $this->config->item('instagram_profile');
    $twitter_link = !empty($this->site_info[0]['twitter_link']) ? $this->site_info[0]['twitter_link'] : $this->config->item('twitter_profile');
    ?>
    <body >
        <table align="center"  border="0" cellpadding="0" cellspacing="0" width="100%" style="background:#6B6B6B !important;">
            <!--first row-->
            <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table class="em_main_table" style="border-top: 5px solid #f9b81f; margin:auto;background-color:#ffffff;" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                            <!--first row-->
                            <tbody>
                                <tr>
                                    <td align="left" bgcolor="#1F2533" valign="top">
                                        <table class="em_main_table" align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="600">
                                            <tbody>

                                                <tr>
                                                    <td style="background:#F1F1F1;" align="center" bgcolor="#F1F1F1" valign="top">
                                                        <table class="em_main_table" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                                            <tbody><tr>

                                                                    <td align="center" valign="top">
                                                                        <table class="em_wrapper" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                                                            <tbody><tr>
                                                                                    <td align="left" valign="top">
                                                                                        <table class="em_wrapper" align="left" border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#f1f1f1">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td style="line-height:0px; font-size:0px;" height="15">&nbsp;</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="center" valign="top"><a target="_blank" href="<?= base_url() ?>"><img src="<?= !empty($this->site_info[0]['site_logo']) && file_exists($this->config->item('image_site_logo') . $this->site_info[0]['site_logo']) ? $this->config->item('image_site_logo_url') . $this->site_info[0]['site_logo'] : $this->config->item('base_url') . 'images/logo.png' ?>" class="em_full_img" /></a></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="line-height:0px; font-size:0px;" height="15">&nbsp;</td>
                                                                                                </tr>
                                                                                            </tbody></table> 
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody></table>
                                                                    </td> 
                                                                </tr>
                                                            </tbody></table>  
                                                    </td>
                                                </tr> 
                                                <!---->               
                                                <tr>
                                                    <td style="background:#ffffff;" align="left" bgcolor="#ffffff" valign="top">
                                                        <table class="em_main_table" align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border:1px solid #f1f1f1;">
                                                            <tbody>


                                                                <tr>
                                                                    <td style="background:#ffffff;" align="center" bgcolor="#ffffff" valign="top">
                                                                        <table class="em_main_table" align="center" border="0" cellpadding="0" cellspacing="0" width="598">
                                                                            <tbody><tr>

                                                                                    <td style="line-height:0px; font-size:0px; width:10px;" align="left" valign="top" width="10"></td>
                                                                                    <td align="center" valign="top">
                                                                                        <table class="em_wrapper" align="center" border="0" cellpadding="0" cellspacing="0" width="540">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td style="line-height:0px; font-size:0px;" height="20">&nbsp;</td>
                                                                                                </tr>

                                                                                                <table width="98%" border="0" align="left" cellpadding="8" cellspacing="2">
                                                                                                    <tbody class="information" bgcolor="#f5f5f5 ">

                                                                                                        <tr>
                                                                                                            <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#575757; background: #fff !important;" valign="top">
                                                                                                                Hello <?= !empty($actdata['name']) ? $actdata['name'] . ',' : '' ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#575757; background: #fff !important; " valign="top"><?= !empty($actdata['user_message']) ? $actdata['user_message'] : '' ?></td>
                                                                                                        </tr>
                                                                                                        <?php if (!empty($actdata['alternative_option']) && $actdata['alternative_option'] != '') { ?>
                                                                                                            <tr>
                                                                                                                <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#575757; background: #fff !important; ">
                                                                                                                    <ul type="circle">
                                                                                                                        <li>Aligns with one or more of our quarters &#8208; creativity, wellbeing leadership and diversity.</li>
                                                                                                                        <li>Generates positive social outcomes in one or more of our communities, from Port Melbourne to Portsea.</li>
                                                                                                                        <li>Requested by a St Kilda Football Club member or long-time supporter.</li>
                                                                                                                    </ul> 
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#575757; background: #fff !important;">Though we can not support your donation request, we would be delighted to offer something else to help you out.</td>
                                                                                                            </tr>
                                                                                                            <tr>    
                                                                                                                <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#575757; background: #fff !important;" valign="top">
                                                                                                                    <?= !empty($actdata['alternative_option']) ? $actdata['alternative_option'] : '' ?>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        <?php } ?>

                                                                                                        <?php if (!empty($actdata['mail_type']) && $actdata['mail_type'] == 'disapprove') { ?>
                                                                                                            <tr>
                                                                                                                <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#575757; background: #fff !important; ">
                                                                                                                    <ul type="circle">
                                                                                                                        <li>Aligns with one or more of our quarters &#8208; creativity, wellbeing leadership and diversity.</li>
                                                                                                                        <li>Generates positive social outcomes in one or more of our communities, from Port Melbourne to Portsea.</li>
                                                                                                                        <li>Requested by a St Kilda Football Club member or long-time supporter.</li>
                                                                                                                    </ul>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#575757; background: #fff !important;">Unfortunately on this occasion we cannot support your request. If you would like more specific feedback please feel free to write to us at connect@junctionstudio.com.au.</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#575757; background: #fff !important;">All the best,<br/>Junction Studio Team</td>
                                                                                                            </tr>
                                                                                                        <?php } ?>
                                                                                                    </tbody>
                                                                                                </table>

                                                                                                </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td> 

                                                                                </tr>

                                                                            </tbody></table>  
                                                                    </td>
                                                                </tr>
                                                            </tbody></table>
                                                    </td>
                                                </tr>

                                                <tr>

                                                </tr>

                                                <tr>
                                                    <td align="center" valign="top">
                                                        <table class="em_main_table" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                                            <tbody><tr>
                                                                    <td style="line-height:0px; font-size:0px; width:15px;" align="left" valign="top" width="15"></td>
                                                                    <td align="center" valign="top">
                                                                        <table class="em_wrapper" align="center" border="0" cellpadding="0" cellspacing="0" width="570">
                                                                            <tbody><tr>
                                                                                    <td align="left" valign="top">
                                                                                        <table class="em_wrapper" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody><tr>
                                                                                                    <td align="left" valign="top">
                                                                                                        <table class="em_wrapper" align="center" border="0" cellpadding="0" cellspacing="0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td style="line-height:0px; font-size:0px;" height="15">&nbsp;</td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="em_txt_center" style="font-size:16px; color:#323232; text-align:center;" align="center" valign="top">Follow</td>                                
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td style="line-height:0px; font-size:0px;" height="5">&nbsp;</td>
                                                                                                                </tr>
                                                                                                                <tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" ><tbody>
                                                                                                                                <tr>
                                                                                                                                    <td align="center" valign="top"><a href="<?= !empty($twitter_link) ? $twitter_link : '' ?>"><img src="<?= base_url() ?>images/mailer_image/twitter.png" alt="twitter" style="display:block; max-width:27px; max-height:27px; " height="27" width="27"/></a></td>
                                                                                                                                    <td align="center" valign="top" width="5"></td>
                                                                                                                                    <td align="center" valign="top"><a href="<?= !empty($instagram_link) ? $instagram_link : '' ?>"><img src="<?= base_url() ?>images/mailer_image/Instagram.jpg" alt="in" style="display:block; max-width:27px; max-height:27px; " height="27" width="27"/></a></td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td style="line-height:0px; font-size:0px;" height="25">&nbsp;</td>
                                                                                                                                </tr>
                                                                                                                            </tbody></table></td></tr>
                                                                                                            </tbody>



                                                                                                        </table>

                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody></table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody></table>

                                                                        </tbody></table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="line-height:0px; font-size:0px; background:#f1f1f1;" height="1" bgcolor="f1f1f1"></td>
                                                                </tr>


                                                                <tr>
                                                                    <td style="line-height:0px; font-size:0px;" height="10">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="em_txt_center" style="font-size:15px; font-family:Arial, Helvetica, sans-serif; line-height:25px; color:#323232; text-align:center;" align="center" valign="top">Address: <?= !empty($address) ? $address : '' ?></td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="em_txt_center" style="font-size:15px; font-family:Arial, Helvetica, sans-serif; line-height:25px; color:#323232; text-align:center;">Phone Number: <?= !empty($contact_no) ? $contact_no : '' ?></td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="em_txt_center" style="font-size:15px; font-family:Arial, Helvetica, sans-serif; line-height:25px; padding-bottom:15px; color:#323232; text-align:center;" align="center" valign="top">Email: <a style="color:#c7226b;" target="_blank" href="mailto:connect@junctionstudio.com.au"><?= !empty($email) ? $email : '' ?> </a></td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="em_txt_center" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#323232; text-align:center;" align="center" valign="top">Copyright <?= date('Y'); ?> <?= !empty($site_name) ? $site_name : '' ?>. All rights reserved.</td>                              
                                                                </tr>
                                                                <tr>
                                                                    <td style="line-height:0px; font-size:0px;" height="20">&nbsp;</td>
                                                                </tr>

                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </body>
                        </html>
