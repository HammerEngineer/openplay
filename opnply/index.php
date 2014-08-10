<?php
session_start();

require_once 'include/config.php'; //application page template
require_once view_DIR. 'application.php';//Smarty template file load
require_once view_DIR . 'link.php';
require_once model_DIR.'error_handler.php';
require_once controller_DIR.'database_handler.php';
require_once controller_DIR.'catalog.php';

ErrorHandler::setHandler();

$application = new Application();// Display the page
$application->display('store_front.tpl');
$application->display('departments_list.tpl');

DatabaseHandler::Close();
?>