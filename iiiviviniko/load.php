<?php

include 'config.php';
include 'DbUtil.php';

session_start();

define("OBJECT", "object");
define("OBJECT_K", "object_k");
define("ARRAY_A", "array_a");
define("ARRAY_N", "array_n");

$dbutil = new DbUtil(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$root_path = "/";

?>