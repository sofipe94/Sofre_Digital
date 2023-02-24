<?php

if(isset($_GET['debug'])) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

/* Functions */

$dir = get_template_directory() . "/inc/functions/";
$functions = scandir($dir);
foreach($functions as $f){
	$_f = explode(".", $f);
	if($_f[count($_f)-1]=="php") {
		include($dir.$f);
	}
}

/* Hooks */

$dir = get_template_directory() . "/inc/hooks/";
$functions = scandir($dir);
foreach($functions as $f){
	$_f = explode(".", $f);
	if($_f[count($_f)-1]=="php") {
		include($dir.$f);
	}
}

/* Modules */

$dir = get_template_directory() . "/templates/modules/";
$functions = scandir($dir);
foreach($functions as $f){
	$_f = explode(".", $f);
	if($_f[count($_f)-1]=="php") {
		include($dir.$f);
	}
}

// Admin Bar
show_admin_bar(false);
