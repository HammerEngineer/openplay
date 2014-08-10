<?php
// SITE_ROOT is the full path to project
define('SITE_ROOT', '/var/www/opnply');


/* Application directories
 * 
 */
define('view_DIR', SITE_ROOT . '/view/');
define('model_DIR', SITE_ROOT . '/model/');
define('controller_DIR',SITE_ROOT.'/controller/');

/*
 * configure the Smarty template engine
 */
define('SMARTY_DIR', SITE_ROOT . '/libs/');
define('TEMPLATE_DIR', view_DIR . 'templates/');
define('COMPILE_DIR', view_DIR . 'templates_c');
define('CONFIG_DIR', SITE_ROOT . '/include/configs');


/* Error hadller
 * 
 */

define('IS_WARNING_FATAL', true);
define('DEBUGGING', true);


//report all errors
define('ERROR_TYPES', E_ALL);

//send errors to where
define('SEND_ERROR_MAIL', false);
define('ADMIN_ERROR_MAIL', 'some@some.com');
define('SEND_MAIL_FROM', 'error@some.com');
ini_set('send_mail_from',SEND_MAIL_FROM);

//by default we dont log errors to file :)
define('LOG_ERRORS', false);
define('LOG_ERRORS_FILE','/home/hammersinn/shop/errors.log');

//when debugging is false generic errors will be displayed
define('SITE_GENERIC_ERROR_MESSAGE', '<h1>Shop Error!</h1>');

define('DB_PERSISTENCY', 'true');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'zxcZ');
define('DB_DATABASE', 'shop');
define('PDO_DSN', 'mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE);

define('HTTP_SERVER_PORT', '80');
define('VIRTUAL_LOCATION', '/opnply/');

define('SHORT_PRODUCT_DESCRIPTION_LENGTH', 150);
define('PRODUCTS_PER_PAGE', 4);

?>

