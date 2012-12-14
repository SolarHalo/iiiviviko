<?php
/**
 * add this file for repleat include 
 */
define('ROOT_PATH', dirname(__FILE__)); 
$urlroot = $_SERVER['DOCUMENT_ROOT'];
include ROOT_PATH.'/load.php';
include ROOT_PATH.'/CategoryDB.php';
include ROOT_PATH.'/PageDB.php';
include ROOT_PATH.'/StoresDB.php';
?>