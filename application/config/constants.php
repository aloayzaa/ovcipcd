<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
//define('URL_CSS', 'http://www.cip-trujillo.org/ovcipcdll/css/');
//define('URL_CSS_DB', 'http://www.cip-trujillo.org/ovcipcdll/css/dashboard/');
//define('URL_CSS_BOOT', 'http://www.cip-trujillo.org/ovcipcdll/css/bootstrap/');
//define('URL_CSS_LOGIN', 'http://www.cip-trujillo.org/ovcipcdll/css/login/');
//define('URL_PLUG', 'http://www.cip-trujillo.org/ovcipcdll/plugins/');
//define('URL_JS_DB', 'http://www.cip-trujillo.org/ovcipcdll/js/dashboard/');
//define('URL_JS_BOOT', 'http://www.cip-trujillo.org/ovcipcdll/js/bootstrap/');
//define('URL_JS', 'http://www.cip-trujillo.org/ovcipcdll/js/');
//define('URL_IMG', 'http://www.cip-trujillo.org/ovcipcdll/img/');
//define('URL_IMAGES', 'http://www.cip-trujillo.org/ovcipcdll/images/'); 
//define('URL_IMG_DASH', 'http://www.cip-trujillo.org/ovcipcdll/img/dashboard/'); 
//define('URL_MAIN', 'http://www.cip-trujillo.org/ovcipcdll/'); 
//define('URL_TIMELINE', 'http://www.cip-trujillo.org/ovcipcdll/css/timeline/');
//
//define('URL_CSS_LOG', 'http://www.cip-trujillo.org/ovcipcdll/css_login/');
//define('URL_JS_LOG', 'http://www.cip-trujillo.org/ovcipcdll/js/login/');
////agregado para perfil usuario
//define('URL_CSS2', 'http://www.cip-trujillo.org/ovcipcdll/css_login/');
//define('URL_JS2', 'http://www.cip-trujillo.org/ovcipcdll/js/login/');
//define('URL_JS_LI', 'http://www.cip-trujillo.org/ovcipcdll/js/login/library/');
//define('URL_ICON', 'http://www.cip-trujillo.org/ovcipcdll/icon/');
//define('KEY_ENCRIPT', 'sd$:%4sdfsd%:&$_/&(&/$&#[]??'); 
//
//define('URL_INFO_IMG', 'http://www.cip-trujillo.org/portal_infocip/img/upload/cursos/');



define('URL_CSS', 'http://localhost/ovcipcdll/css/');
define('URL_CSS_DB', 'http://localhost/ovcipcdll/css/dashboard/');
define('URL_CSS_BOOT', 'http://localhost/ovcipcdll/css/bootstrap/');
define('URL_CSS_LOGIN', 'http://localhost/ovcipcdll/css/login/');
define('URL_PLUG', 'http://localhost/ovcipcdll/plugins/');
define('URL_JS_DB', 'http://localhost/ovcipcdll/js/dashboard/');
define('URL_JS_BOOT', 'http://localhost/ovcipcdll/js/bootstrap/');
define('URL_JS', 'http://localhost/ovcipcdll/js/');
define('URL_IMG', 'http://localhost/ovcipcdll/img/');
define('URL_IMAGES', 'http://localhost/ovcipcdll/images/'); 
define('URL_IMG_DASH', 'http://localhost/ovcipcdll/img/dashboard/'); 
define('URL_MAIN', 'http://localhost/ovcipcdll/'); 
define('URL_TIMELINE', 'http://localhost/ovcipcdll/css/timeline/');

define('URL_CSS_LOG', 'http://localhost/ovcipcdll/css_login/');
define('URL_JS_LOG', 'http://localhost/ovcipcdll/js/login/');
//agregado para perfil usuario
define('URL_CSS2', 'http://localhost/ovcipcdll/css_login/');
define('URL_JS2', 'http://localhost/ovcipcdll/js/login/');
define('URL_JS_LI', 'http://localhost/ovcipcdll/js/login/library/');
define('URL_ICON', 'http://localhost/ovcipcdll/icon/');
define('KEY_ENCRIPT', 'sd$:%4sdfsd%:&$_/&(&/$&#[]??'); 

define('URL_INFO_IMG', 'http://localhost/portal_infocip/img/upload/cursos/');

// path imagenes (todas las imagenes debe estar en este path).


/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */