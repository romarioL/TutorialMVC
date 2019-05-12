<?php 

$pastaInterna = "siteMVC/";

define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");

if(substr($_SERVER['DOCUMENT_ROOT'], -1 ) == '/') {
	define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$pastaInterna}");
}else {
	define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$pastaInterna}");
}

define('DIRIMG', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}public/img/");

define('DIRCSS', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}public/css/");

define('DIRJS', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}public/js/");

define('HOST', "localhost");
define('DB', "MVCTutorial");
define('USER', "root");
define('PASS', "");


