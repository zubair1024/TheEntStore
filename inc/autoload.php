<?php
function __auto_load($class_name){
	$class = eplode("_",$class_name);
	$path = implode("/", $class).".php";
	require_once($path);
}
