<?php
if(!isset($_SESSION)){
    session_start();
}
//website domain name with http
defined("SITE_URL") || defined("SITE_URL","http://".$_SERVER['SERVER_NAME']);
//directory separator 
defined("DS") || defined("DS",DIRECTORY_SEPARATOR);
//root path
defined("ROOT_PATH") || defined("ROOT_PATH",  realpath(dirname(__FILE__).DS."..".DS));
//classes folder
defined("CLASSES_DIR") || defined("CLASSES_DIR","classes");
//pages folder
defined("PAGES_DIR") || defined("PAGES_DIR","pages");
//modules folder
defined("MOD_DIR") || defined("MOD_DIR","mod");
//includes folder
defined("INC_DIR") || defined("INC_DIR","inc");
//tempates folder
defined("TEMPLATE_DIR") || defined("TEMPLATE_DIR","template");
//emails path
defined("EMAILS_PATH") || defined("EMAILS_PATH",ROOT_PATH.DS."emails");
//catalog images path
defined("CATALOG_PATH") || defined("CATALOG_PATH",ROOT_PATH.DS."media".DS."catalog");

//add all above directories to the include path
set_include_path(implode(PATH_SEPARATOR, array(realpath(ROOT_PATH.DS.CLASSES_DIR),realpath(ROOT_PATH.DS.PAGES_DIR),realpath(ROOT_PATH.DS.MOD_DIR),realpath(ROOT_PATH.DS.INC_DIR),realpath(ROOT_PATH.DS.TEMPLATE_DIR),  get_include_path())));
