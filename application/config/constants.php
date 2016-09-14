<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
/* End of file constants.php */
/* Location: ./application/config/constants.php */

define('COMMAN_DATE_FORMATE', 'd/m/yy');  //'m-d-yy'
define('COMMAN_DATE_FORMATE_JS', 'd/m/Y');  //'m-d-yy'
define('COMMAN_DATE_FORMATE_VIEW', 'd M Y, h:i A'); //'m-d-Y'
define('COMMAN_ONLY_DATE_FORMATE_VIEW', 'd M Y'); //'m-d-Y'
define('DATE_FORMATE_JS_DATEPICKER', 'd/m/Y h:i:s');  //'d/m/Y'

define('COMMAN_TIME_FORMATE_VIEW', 'h:i A'); //'m-d-Y'

define('COMMAN_DATE_FORMATE_JS_VIEW', 'd-m-Y');  //'m-d-yy'

define('CONTACT_MAX',11);
define('CONTACT_MIN',10);

define('DEFAULT_PER_PAGE_APPEND',3);
define('DEFAULT_PER_PAGE_FRONT',9);

define('TERMS_CONDITIONS',1);
define('PRIVACY_POLICY',2);

define('ABOUT_US_DIVERSITY',1);
define('ABOUT_US_LEADERSHIP',2);
define('ABOUT_US_CREATIVITY',3);
define('ABOUT_US_WELLBEING',4);
define('ABOUT_US_MASTER',5);
// Site Logo Size Fix
define('LOGO_WIDGH',188);
define('LOGO_HEIGHT',71);

define('TEXTAREAT_MAX_LENGTH',250);
define('TEXTAREAT_MAX_LENGTH_CASE',500);

define('AGE_DIGIT',3);
