<?php
// for global config details like DB etc
include_once('../config.php');
// contains API credentials
include_once('apiconfig.php');

filter_var($str, FILTER_SANITIZE_STRING);

$sMethod = filter_var($_REQUEST['method'], FILTER_SANITIZE_STRING);

$sMethod = !empty($_REQUEST['method']) ? $_REQUEST['method']: '';









?>
