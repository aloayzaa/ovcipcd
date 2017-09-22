<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------
  | DATABASE CONNECTIVITY SETTINGS
  | -------------------------------------------------------------------
  | This file will contain the settings needed to access your database.
  |
  | For complete instructions please consult the 'Database Connection'
  | page of the User Guide.
  |
  | -------------------------------------------------------------------
  | EXPLANATION OF VARIABLES
  | -------------------------------------------------------------------
  |
  |	['hostname'] The hostname of your database server.
  |	['username'] The username used to connect to the database
  |	['password'] The password used to connect to the database
  |	['database'] The name of the database you want to connect to
  |	['dbdriver'] The database type. ie: mysql.  Currently supported:
  mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
  |	['dbprefix'] You can add an optional prefix, which will be added
  |				 to the table name when using the  Active Record class
  |	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
  |	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
  |	['cache_on'] TRUE/FALSE - Enables/disables query caching
  |	['cachedir'] The path to the folder where cache files should be stored
  |	['char_set'] The character set used in communicating with the database
  |	['dbcollat'] The character collation used in communicating with the database
  |				 NOTE: For MySQL and MySQLi databases, this setting is only used
  | 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
  |				 (and in table creation queries made with DB Forge).
  | 				 There is an incompatibility in PHP with mysql_real_escape_string() which
  | 				 can make your site vulnerable to SQL injection if you are using a
  | 				 multi-byte character set and are running versions lower than these.
  | 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
  |	['swap_pre'] A default table prefix that should be swapped with the dbprefix
  |	['autoinit'] Whether or not to automatically initialize the database.
  |	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
  |							- good for ensuring strict SQL while developing
  |
  | The $active_group variable lets you choose which connection group to
  | make active.  By default there is only one group (the 'default' group).
  |
  | The $active_record variables lets you determine whether or not to load
  | the active record class
 */

$active_group = 'default';
$active_record = TRUE;


//BD INTEGRADA 1
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = 'root2017';
$db['default']['database'] = 'cipbdintegrada2';
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = FALSE; // ERA TRUE, EL PROGRAMADOR CONTROLA LOS ERRORES
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


$db['colegiado']['hostname'] = 'localhost';
$db['colegiado']['username'] = 'root';
$db['colegiado']['password'] = 'root2017';
$db['colegiado']['database'] = 'bdcolegio';
$db['colegiado']['dbdriver'] = 'mysqli';
$db['colegiado']['dbprefix'] = '';
$db['colegiado']['pconnect'] = FALSE;
$db['colegiado']['db_debug'] = FALSE; // ERA TRUE, EL PROGRAMADOR CONTROLA LOS ERRORES
$db['colegiado']['cache_on'] = FALSE;
$db['colegiado']['cachedir'] = '';
$db['colegiado']['char_set'] = 'utf8';
$db['colegiado']['dbcollat'] = 'utf8_general_ci';
$db['colegiado']['swap_pre'] = '';
$db['colegiado']['autoinit'] = TRUE;
$db['colegiado']['stricton'] = FALSE;

//---------------- NUEVA BDCOLEGIO - TIEMPO REAL ---------------------------
$db['db_colegiado']['hostname'] = 'localhost';
$db['db_colegiado']['username'] = 'root';
$db['db_colegiado']['password'] = 'root2017';
$db['db_colegiado']['database'] = 'bdcolegio';
$db['db_colegiado']['dbdriver'] = 'mysqli';
$db['db_colegiado']['dbprefix'] = '';
$db['db_colegiado']['pconnect'] = FALSE;
$db['db_colegiado']['db_debug'] = FALSE; // ERA TRUE, EL PROGRAMADOR CONTROLA LOS ERRORES
$db['db_colegiado']['cache_on'] = FALSE;
$db['db_colegiado']['cachedir'] = '';
$db['db_colegiado']['char_set'] = 'utf8';
$db['db_colegiado']['dbcollat'] = 'utf8_general_ci';
$db['db_colegiado']['swap_pre'] = '';
$db['db_colegiado']['autoinit'] = TRUE;
$db['db_colegiado']['stricton'] = FALSE;

//---------------- CAMPUS VIRTUAL ---------------------------
$db['bdcampusvirtual']['hostname'] = 'localhost';
$db['bdcampusvirtual']['username'] = 'root';
$db['bdcampusvirtual']['password'] = 'root2017';
$db['bdcampusvirtual']['database'] = 'cipbdintegrada2';
$db['bdcampusvirtual']['dbdriver'] = 'mysqli';
$db['bdcampusvirtual']['dbprefix'] = '';
$db['bdcampusvirtual']['pconnect'] = FALSE;
$db['bdcampusvirtual']['db_debug'] = FALSE; // ERA TRUE, EL PROGRAMADOR CONTROLA LOS ERRORES
$db['bdcampusvirtual']['cache_on'] = FALSE;
$db['bdcampusvirtual']['cachedir'] = '';
$db['bdcampusvirtual']['char_set'] = 'utf8';
$db['bdcampusvirtual']['dbcollat'] = 'utf8_general_ci';
$db['bdcampusvirtual']['swap_pre'] = '';
$db['bdcampusvirtual']['autoinit'] = FALSE;
$db['bdcampusvirtual']['stricton'] = FALSE;
// ---------------------------------------------------------

//---------------- BIBLIOTECA ---------------------------
//$db['bdbiblioteca']['hostname'] = 'localhost';
//$db['bdbiblioteca']['username'] = 'root';
//$db['bdbiblioteca']['password'] = 'root2017';
//$db['bdbiblioteca']['database'] = 'bdbiblioteca2';
//$db['bdbiblioteca']['dbdriver'] = 'mysqli';
//$db['bdbiblioteca']['dbprefix'] = '';
//$db['bdbiblioteca']['pconnect'] = FALSE;
//$db['bdbiblioteca']['db_debug'] = FALSE; // ERA TRUE, EL PROGRAMADOR CONTROLA LOS ERRORES
//$db['bdbiblioteca']['cache_on'] = FALSE;
//$db['bdbiblioteca']['cachedir'] = '';
//$db['bdbiblioteca']['char_set'] = 'utf8';
//$db['bdbiblioteca']['dbcollat'] = 'utf8_general_ci';
//$db['bdbiblioteca']['swap_pre'] = '';
//$db['bdbiblioteca']['autoinit'] = FALSE;
//$db['bdbiblioteca']['stricton'] = FALSE;
// ---------------------------------------------------------


//---------------- HELPDESK ---------------------------
//$db['helpdesk']['hostname'] = 'localhost';
//$db['helpdesk']['username'] = 'root';
//$db['helpdesk']['password'] = 'root';
//$db['helpdesk']['database'] = 'helpdesk';
//$db['helpdesk']['dbdriver'] = 'mysqli';
//$db['helpdesk']['dbprefix'] = '';
//$db['helpdesk']['pconnect'] = FALSE;
//$db['helpdesk']['db_debug'] = FALSE; // ERA TRUE, EL PROGRAMADOR CONTROLA LOS ERRORES
//$db['helpdesk']['cache_on'] = FALSE;
//$db['helpdesk']['cachedir'] = '';
//$db['helpdesk']['char_set'] = 'utf8';
//$db['helpdesk']['dbcollat'] = 'utf8_general_ci';
//$db['helpdesk']['swap_pre'] = '';
//$db['helpdesk']['autoinit'] = FALSE;
//$db['helpdesk']['stricton'] = FALSE;

//---------------- Libro Reclamaciones ---------------------------
//$db['bdlib_reclamaciones']['hostname'] = 'localhost';
//$db['bdlib_reclamaciones']['username'] = 'root';
//$db['bdlib_reclamaciones']['password'] = 'root';
//$db['bdlib_reclamaciones']['database'] = 'bdlib_reclamaciones';
//$db['bdlib_reclamaciones']['dbdriver'] = 'mysqli';
//$db['bdlib_reclamaciones']['dbprefix'] = '';
//$db['bdlib_reclamaciones']['pconnect'] = FALSE;
//$db['bdlib_reclamaciones']['db_debug'] = FALSE; // ERA TRUE, EL PROGRAMADOR CONTROLA LOS ERRORES
//$db['bdlib_reclamaciones']['cache_on'] = FALSE;
//$db['bdlib_reclamaciones']['cachedir'] = '';
//$db['bdlib_reclamaciones']['char_set'] = 'utf8';
//$db['bdlib_reclamaciones']['dbcollat'] = 'utf8_general_ci';
//$db['bdlib_reclamaciones']['swap_pre'] = '';
//$db['bdlib_reclamaciones']['autoinit'] = FALSE;
//$db['bdlib_reclamaciones']['stricton'] = FALSE;
// ---------------------------------------------------------

/* End of file database.php */
/* Location: ./application/config/database.php */
