<?php
#enable display errors
ini_set('display_errors', 'On');
#set a high error level
error_reporting(E_ALL | E_STRICT);
#determine the root path
$root = \realpath(\implode(DIRECTORY_SEPARATOR, array(__DIR__, '..', 'src')));
#register a minimal autoloader
\spl_autoload_register(function($class) use ($root){
    if(\strpos(\ltrim($class,'\\'), 'Rcky')===0){
	$relFile	= \str_replace('\\', '/', $class);
	$fullPath	= $root.DIRECTORY_SEPARATOR.$relFile;
	$file		= \sprintf("%s.php",$fullPath);
	require_once $file;
    }
});